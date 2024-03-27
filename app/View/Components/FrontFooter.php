<?php

namespace App\View\Components;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\View\Component;

class FrontFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $settings = Setting::all();
        $pages = Page::all();
        return view('front.components.footer',compact('settings','pages'));
    }
}
