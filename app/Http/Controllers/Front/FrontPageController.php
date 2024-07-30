<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontPageController extends Controller
{
   
    public function index()
    {
        return view('front.index',compact('pages','settings'));
    }
    
    public function show($id)
    {
        $page = Page::findOrFail($id);
        $pages = Page::all();
        $settings = Setting::all();
        return view('front.pages.index',['page'=>$page],compact('pages','settings'));
    }
}
