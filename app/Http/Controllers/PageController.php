<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\page\StorePageRequest;

class PageController extends Controller
{
  
    public function index()
    {
        return view('admin.pages.index',['pages' => Page::all()]);
    }

   
    public function create()
    {
        return view('admin.pages.create');
    }
    
   

    public function store(StorePageRequest $request)
    {
        Page::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
            session()->flash('success','page Add secsefuly');
            return redirect()->route('page.create');  
    }

    public function edit($id)
    {
        $pages = page::findOrFail($id);
        return view('admin.pages.edit', compact('pages'));
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title'=>'required|',
            'content'=>'required',
        ]);
        $pages = page::findOrFail($id);
        $pages->update([
            'title'       => $request->title,
            'content'      => $request->content,
        ]);
        session()->flash('edit','page Updated Successfully');
        return  redirect()->route('page.index');
    }

    
    public function destroy(page $page)
    {
        $page->delete();
        session()->flash('delete', 'page deleted successfully');
        return redirect()->route('page.index');
    }
}
