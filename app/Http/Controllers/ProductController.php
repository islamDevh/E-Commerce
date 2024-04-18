<?php

namespace App\Http\Controllers;

use Nette\Utils\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

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


    public function store(request $request)
    {
        try {
            DB::beginTransaction();
            $filename = $this->uploadImage($request->image, Product::PATHIMAGE);
            $product = Product::create([
                'name'        => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price'       => $request->price,
                'quantity'       => $request->quantity,
                'offer'       => $request->offer,
                'image'       => $filename,
            ]);

            $productId = $product->id; // Get the ID of the created product
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = $this->uploadImage($image, Product::PATHIMAGES);
                ImageProduct::create([
                    'product_id' => $productId, // Use the retrieved product ID
                    'image'      => $filename,
                ]);
            }
            DB::commit();

            session()->flash('success', 'Product added successfully');
            return redirect()->route('product.create');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('error', 'Failed to add product. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();

            // If a new image is uploaded, update it
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage($request->image, Product::PATHIMAGE, $product->image);
                $product->image = $filename;
            }

            // Update other product details
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->offer = $request->offer;
            $product->save();

            // Handle other images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = $this->uploadImage($image, Product::PATHIMAGES);
                    ImageProduct::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                    ]);
                }
            }

            DB::commit();
            session()->flash('success', 'Product updated successfully');
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Failed to update product. Please try again.');
            return redirect()->back()->withInput();
        }
    }


    public function destroy(Product $product)
    {
        $this->removeImage($product->image);
        $product->delete();
        session()->flash('success', 'Product Deleted Successfully');
        return redirect()->route('product.index');
    }

}
