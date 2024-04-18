<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }

    public function products(){
        return $this->belongsToMany(OrderProduct::class)
        ->using(OrderProduct::class) // pivot table name
        ->withPivot([
            'product_name','price','quantity','options',
        ]);
    }

    protected  static function booted()
    {
        static::creating(function (Order $order) {
            // 20220001 , 20220002 ...etc
            $order->number = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber()
    {
        //select max(number) from orders
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at',$year)->max('number');
        if($number){
            return $number + 1;
        }
        return $year . '0001';
    }

}
