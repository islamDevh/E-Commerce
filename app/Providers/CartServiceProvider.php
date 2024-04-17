<?php

namespace App\Providers;

use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(CartRepository::class, CartModelRepository::class); //bind( interface, class implementing it)
    }


    public function boot()
    {
        //
    }
}
