<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{


    public function index()
    {
        $user_id = Auth::id();
        $products = Cart::where('user_id', $user_id)->with('product')->get();
        $product_info = Cart::where('user_id', $user_id)->get();
        return view('Front.cart.index', compact('products','product_info'));
    }

    public function store(request $request)
    {
        if (Auth::check()) {
            Cart::create([
                'user_id'    => Auth::user()->id,
                'product_id' => $request->product_id,
                'price'      => $request->price,
                'offer'      => $request->offer,
                'quantity'   => $request['product-quatity'],
            ]);
            session()->flash('success', 'Product added successfully');
            return redirect()->route('ProductDetail.index', ['id' => $request->product_id]);
        } else {
            return view('auth.login');
        }
    }


    public function checkout(Request $request)
    {
        dd($request->all());
        $user_id = Auth::id();
        $product_quantities = $request->input('product_quantity');

        // Process the checkout logic here
        // For demonstration purposes, let's just clear the user's cart
        Cart::where('user_id', $user_id)->delete();

        // Redirect to a thank you page or wherever you want to go after checkout
        return redirect()->route('thankyou')->with('success', 'Thank you for your order!');
    }
}
