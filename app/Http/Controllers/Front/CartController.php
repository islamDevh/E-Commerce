<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{


    public function index(){
        $Cart = Cart::all();
        return view('Front.cart.index',compact('Cart'));
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
        }else{
            return view('auth.login');
        }
    }

}

