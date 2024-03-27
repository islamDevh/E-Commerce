<?php

namespace App\Http\Controllers\Front;
use App\Models\Page;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\FrontReq\user\StoreUserRequest;

class RegisterController extends Controller
{
    use imageTrait;
   //show footer pages
    public function index()
    {

        return view('front.register.index');
    }

    
    public function store(StoreUserRequest $request)
    {
        $filename = $this->uploadImage($request->image, User::PATH);
        User::create([
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'password_confirmation' =>Hash::make($request['password_confirmation']),
            'email' => $request['email'],
            'image' => $filename,
        ]);
        return back()->with(session()->flash('message', 'Add Successfully'));
    }

}
