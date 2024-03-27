<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ColorProduct;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreColorProductRequest;
use App\Http\Requests\Product\UpdateColorProductRequest;

class ProductColorController extends Controller
{
   
    public function index()
    {
        return view('admin.colors.index', ['ColorProducts' => ColorProduct::paginate(pagination_count)]);
    }


    public function create()
    {
        return view('admin.colors.create', ['products' => Product::all()]);
    }


    public function store(StoreColorProductRequest $request)
    {   
        ColorProduct::create([
            'product_id' => $request->product_id,
            'name'       => $request->name,
            'color'      => $request->color,
        ]);
        session()->flash('Add','Product Color Add secsefuly');
        return redirect()->route('color.index');
    }

    
    public function edit($id)
    {
        $ColorProducts = ColorProduct::findOrFail($id);
        return view('admin.colors.edit', compact('ColorProducts'));
    }



    public function update(UpdateColorProductRequest $request, $id)
    {
        $colors = ColorProduct::findOrFail($id);
        $colors->update([
            'name'       => $request->name,
            'color'      => $request->color,
        ]);
        session()->flash('edit','color Updated Successfully');
        return  redirect()->route('color.index');
    }

    

    public function destroy(ColorProduct $color)
    {
        $color->delete();
        session()->flash('delete', 'Product Deleted Successfully');
        return redirect()->route('color.index');
    }
}
