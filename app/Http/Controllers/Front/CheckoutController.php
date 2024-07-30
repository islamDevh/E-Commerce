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

class CheckoutController extends Controller
{
    public function index(CartRepository $cart)
    {
        return view('front.checkout.index', ['cart' => $cart]);
    }

    public function store(Request $request, CartRepository $cart)
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
}
