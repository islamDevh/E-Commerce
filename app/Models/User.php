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

    public function order(){ //one user can make more than order
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
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

    public function isAdmin(): bool
    {
        return $this->type == "admin";
    }

    public function isUser(): bool
    {
        return $this->type == "user";
    }
}
