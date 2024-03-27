<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $Products = Product::all();
        $categories = Category::all();
        return view('front.shop.index',compact('categories','Products'));
    }
}