<?php

namespace App\Models;

// use Illuminate\Support\Str;
use Illuminate\Support\Str;
use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public $incrementing = false; //because it is uuid
    protected $fillable = [
        'cookie_id', 'user_id', 'product_id', 'quantity', 'options'
    ];

    //Events (observers) => Events run before or after create the model
    //creating() || run before any Event for the model
    // protected static function boot() //boot method is called when the model is created
    // {
    //     parent::boot(); //call the parent boot method
    //     static::creating(function (Cart $cart) {
    //         $cart->id = Str::uuid();
    //     $cart->cookie_id = $cart->getCookieId(); // Call the method on the $cart instance
    //     });
    // }
    //if you want to make many Events for the model you can make observer by command php artisan make:observer CartObserver --model=Cart
    protected  static function booted()
    {
        parent::boot();
        Cart::observe(CartObserver::class);

        static::addGlobalScope('cookie_id',function(Builder $query){
            $query->where('cookie_id',Cart::getCookieId()); //where cookie_id in DB = cookie_id in browser
        });
    }

    public static function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id'); // get value of cookie cart_id
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 30 * 24 * 60); //(name, value, days)
        }
        return $cookie_id;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'anonymous']); //means if user not found return anonymous
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
