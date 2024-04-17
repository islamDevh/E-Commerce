<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class CartModelRepository implements CartRepository
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }


    public function get(): Collection
    {
        if(!$this->items->count()){ //if cart not empty
            $this->items = Cart::with('product')->get(); //get from DB products related the cookie in browser and put them in collection
        }
        return $this->items; //return items in collection
    }

    public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', '=', $product->id)
            ->first();
        if (!$item) {
            $cart = Cart::create([
                'user_id' => null,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
            $this->items->push($cart); //push items in collection
            return $cart;
        }
        return $item->increment('quantity', $quantity);
    }

    public function update($id, $quantity)
    {
        Cart::where('id', $id)
            ->update([
                'quantity' => $quantity
            ]);
    }

    public function delete($id)
    {
        Cart::where('id', '=', $id)
            ->delete();
    }

    public function empty()
    {
        Cart::query()->delete();
    }

    public function total(): float
    {
        // return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
        //     ->selectRaw('sum(products.price * carts.quantity) as total')
        //     ->value('total'); //will loop all products in DB

        return  $this->get()->sum(function($item){ //will loop all items in collection
            return $item->quantity * $item->product->price ;
        });
    }


}
