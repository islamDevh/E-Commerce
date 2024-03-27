<?php

namespace App\Providers;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if(!app()->runningInConsole()){
            $setting = Setting::firstOr(function () {
            return Setting::create([
            'name' => 'ecommerce',
            'description' => 'ecommerce Description',
            'email' => 'Email.com',
            'phone' => '0123456789',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp' => 'https://web.whatsapp.com/',
            'twitter' => 'https://twitter.com/',
            'instagram' => 'https://www.instagram.com/',
            'youtube' => 'https://www.youtube.com/',
            'facebook' => 'https://facebook.com/',
        ]);
    });
        view()->share('setting', $setting);
        }
    }
}