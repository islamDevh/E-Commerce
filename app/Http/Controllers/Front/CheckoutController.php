<?php

namespace App\Http\Controllers\Front;

use Throwable;
use App\Models\Order;
use App\Events\OrderCreated;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PaypalPayoutsSDK\Core\PayPalHttpClient;
use PaypalPayoutsSDK\Core\SandboxEnvironment;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckoutController extends Controller
{
    public function index(CartRepository $cart)
    {
        return view('front.checkout.index', ['cart' => $cart]);
    }

    public function storeStripe(Request $request, CartRepository $cart)
    {
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $cart->total(),
                'offer' => 0,
                'payment_method' => 'Cod',
            ]);
            foreach ($cart->get() as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }
            $billingAddress = $request->only([
                'first_name',
                'last_name',
                'email',
                'phone_number',
                'street_address',
                'country',
                'postal_code',
                'city'
            ]);
            $order->addresses()->create($billingAddress);

            DB::commit();

            // event('order.created', $order, Auth::user());
            // event(new OrderCreated($order));

            return redirect()->route('orders.payemnts.create', $order->id);
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    public function storePaypal(Request $request)
    {
        $client = $this->getPayPalClient();
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => uniqid(),
                "amount" => [
                    "value" => "100.00",
                    "currency_code" => "USD"
                ],
            ]],
            "application_context" => [
                "cancel_url" => url(route('checkout.paypal.cancel')),
                "return_url" => url(route('checkout.paypal.success')),
            ]
        ];

        try {
            $response = $client->execute($request);
            if ($response->statusCode == 201) {
                session(['paypal_order_id' => $response->result->id]);
                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {
                        return redirect()->away($link->href);
                    }
                }
            } else {
                // Handle other status codes
                return response()->json(['error' => 'Unexpected PayPal response'], 500);
            }
        } catch (HttpException $ex) {
            // Log error message for debugging
            \Log::error('PayPal API Error: ' . $ex->getMessage(), ['statusCode' => $ex->statusCode]);
            return response()->json(['error' => 'PayPal API Error'], 500);
        }
    }

    public function paypalSuccess()
    {
        $orderId = session('paypal_order_id');
        if (!$orderId) {
            return redirect()->route('front.index')->with('error', 'Order ID not found.');
        }

        $request = new OrdersCaptureRequest($orderId);
        $request->prefer('return=representation');

        try {
            $client = $this->getPayPalClient();
            $response = $client->execute($request);
            \Log::info('PayPal Capture Response:', ['response' => $response]);
            session()->forget('paypal_order_id');

            // Handle successful payment
            
        } catch (HttpException $ex) {
            // Log error message for debugging
            \Log::error('PayPal API Error: ' . $ex->getMessage(), ['statusCode' => $ex->statusCode]);
            return redirect()->route('checkout.index')->with('error', 'Payment capture failed.');
        }
    }

    protected function getPayPalClient()
    {
        $config = config('services.paypal');
        $environment = new SandboxEnvironment($config['PAYPAL_client_id'], $config['PAYPAL_CLIENT_SECRET']);
        return new PayPalHttpClient($environment);
    }
    
    public function paypalCancel()
    {
        return route('front.index');
    }
}
