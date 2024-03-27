<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\category\StroeCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories',compact('categories'));
    }

    
    public function store(StroeCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
            session()->flash('Add','category Add secsefuly');
            return redirect()->route('category.index');    
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(UpdateCategoryRequest $request,$id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        session()->flash('edit','category updated succsfuly');
        return redirect()->route('category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('delete', 'category deleted successfully');
        return redirect()->route('category.index');
    }
}
