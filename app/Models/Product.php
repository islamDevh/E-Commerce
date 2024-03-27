<?php

namespace App\Models;

use App\Models\ColorProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    const PATH = 'upload/images/products/';

    public function ImageProduct(){
        return $this->hasMany(ImageProduct::class, 'product_id');
    }
    

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function colorProduct(){
        return $this->hasMany(ColorProduct::class, 'product_id');
    }
    




    
}

