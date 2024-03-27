<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ColorProduct;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Controller
{

    public function index($id)
    {
        $product       = Product::FindOrFail($id);
        $allProduc     = Product::all();
        $colors        = ColorProduct::where('product_id',$id)->get();
        $imageProducts = ImageProduct::where('product_id',$id)->get();
        return view('front.shop.ProductDetail',compact('product','allProduc','colors','imageProducts'));
    }

    
}
