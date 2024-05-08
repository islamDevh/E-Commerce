<?php

namespace App\Models;

use App\Models\ColorProduct;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    const PATHIMAGE = 'upload/images/products/main-iamge/';
    const PATHIMAGES = 'upload/images/products/all-images/';

    public function ImageProduct(){
        return $this->hasMany(ImageProduct::class, 'product_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colorProduct(){
        return $this->hasMany(ColorProduct::class, 'product_id');
    }

    public function scopeFillter(Builder $bulder, $fillters)
    {
        $options = array_merge(['category_id' => null], $fillters);

        $bulder->when($options['category_id'], function ($builder, $value){
            $builder->where('category_id', $value);
        });
    }

}

