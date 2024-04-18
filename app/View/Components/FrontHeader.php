<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;
use App\Facades\Cart;

class FrontHeader extends Component
{
    public $count;
    public function __construct()
    {
        $this->count = Cart::get()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $settings = Setting::all();
        return view('front.components.header', compact('settings'));
    }
}
