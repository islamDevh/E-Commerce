<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\Component;
use App\Models\Cart;

class FrontHeader extends Component
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
        $cartItemCount = 0;
        if (auth()->check()) {
            $userId = auth()->id();
            $cartItemCount = Cart::where('user_id', $userId)->count();
        }

        $settings = Setting::all();
        return view('front.components.header', compact('settings', 'cartItemCount'));
    }
}
