<?php

namespace App\Models;

use App\Models\ColorProduct;
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


}

