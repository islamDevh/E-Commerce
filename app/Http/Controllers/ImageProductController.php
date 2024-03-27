<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Utils\ImageUpload;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;

class ImageProductController extends Controller
{
    use imageTrait;
    public function index()
    {
        $ImageProducts = ImageProduct::all();
        return view('admin.ImgProducts.index',compact('ImageProducts'));
    }

    public function create()
    {
        return view('admin.ImgProducts.create', ['products' => Product::all()]);
    }

    public function store(Request $request)
    {
        $filename = $this->uploadImage($request->image, Product::PATH);
        ImageProduct::create([
            'product_id'  => $request->product_id,
            'image'       => $filename,
        ]);
        session()->flash('Add','Product Add secsefuly');
        return redirect()->route('ImageProduct.create');
    }

  

    public function edit($id)
    {
        $ImageProducts = ImageProduct::FindOrFail($id);
        $products = Product::all();
        return view('admin.ImgProducts.edit', compact('ImageProducts','products'));
    }

    public function details($id)
    {
        $ImageProducts = ImageProduct::FindOrFail($id);
        $products = Product::all();
        return view('admin.ImgProducts.details', compact('ImageProducts','products'));
    }

    public function update(Request $request,$id)
    {
        $ImageProduct = ImageProduct::find($id);
        $ImageProduct->update($request->all());
        if($request->has('image')){
            $image = ImageUpload::uploadImage($request->image , null , null , 'upload/images/products/');
            $ImageProduct->update(['image' => $image]);
        }
        session()->flash('edit','Edit secsefuly');
        return redirect()->route('ImageProduct.index');
    }

  
    public function destroy(ImageProduct $ImageProduct)
    {
        $this->removeImage($ImageProduct->image);
        $ImageProduct->delete();
        session()->flash('delete', 'Deleted Successfully');
        return redirect()->route('ImageProduct.index');
    }
}
