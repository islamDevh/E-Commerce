<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\imageTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class ProductController extends Controller
{
    use imageTrait;
    public function index()
    {
        return view('admin.products.index', ['products' => product::paginate(pagination_count)]);
    }

    public function create()
    {
        return view('admin.products.create', ['categories' => Category::all()]);
    }

    
    public function store(StoreProductRequest $request)
    {
        $filename = $this->uploadImage($request->image, Product::PATH);
        Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'offer'       => $request->offer,
            'image'       => $filename,
        ]);
        session()->flash('Add','Product Add secsefuly');
        return redirect()->route('product.index');

    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    
    public function update(UpdateProductRequest $request, Product $product)
    {    
        $filename = $this->uploadImage($request->image, Product::PATH,$product->image);
        $product->update([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'offer'       => $request->offer,
            'image'       => $filename,
        ]);
        session()->flash('edit','Product Updated Successfully');
        return  redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $this->removeImage($product->image);
        $product->delete();
        session()->flash('delete', 'Product Deleted Successfully');
        return redirect()->route('product.index');
    }

}
