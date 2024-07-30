<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CartModelRepository;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index() //note : must be there in service provider
    {
        return view('Front.cart.index', ['cart' => $this->cart]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['nullable', 'int', 'min:1'],
        ]);
        $product = Product::find($request->product_id);
        $this->cart->add($product, $request->post('quantity'));
        return redirect()->route('cart.index')->with('success', 'Product Added To Cart');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['nullable', 'int', 'min:1'],
        ]);
        $product = Product::find($request->product_id);
        $this->cart->update($product, $request->post('quantity'));
    }

    public function destroy(CartModelRepository $cart, $id)
    {
        $cart->delete($id);
    }


}
