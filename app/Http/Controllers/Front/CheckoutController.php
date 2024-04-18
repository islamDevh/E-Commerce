<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;
use Throwable;

class CheckoutController extends Controller
{
    public function index(CartRepository $cart)
    {
        if (!Auth::check() || $cart->get()->count() == 0) {
            return redirect()->route('front.index');
        }
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


            $cart->empty();
            DB::commit();
            return redirect()->route('checkout.index')->with('success', 'Your order has been successfully placed.');
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
