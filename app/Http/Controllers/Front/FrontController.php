<?php

namespace App\Http\Controllers\Front;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class FrontController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $settings = Setting::all();
        return view('front.index',compact('pages','settings'));
    }
}
