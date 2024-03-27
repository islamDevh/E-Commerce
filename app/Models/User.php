<?php

namespace App\Models;
use App\Models\Order;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{

    const PATH = 'upload/images/users/';
    use HasApiTokens, HasFactory, Notifiable;
    //relation 1:M (user,orders)
    public function order(){ //one user can make more than order
        return $this->hasMany(Order::class,'orders');
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'password_confirmation',
        'image',
        'type',
    ];

    protected $hidden = [
        'password',
        'password_confirmation',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
