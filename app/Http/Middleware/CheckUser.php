<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->type == 'admin') {
            return $next($request);
        }
        return redirect('/');
    }
}
