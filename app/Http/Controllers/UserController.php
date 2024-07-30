<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\StoreUserRequest;
use App\Models\Product;

class UserController extends Controller
{
    use imageTrait;
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(pagination_count)]);
    }

   
    public function create()
    {
        return view('admin.users.create');
    }

   
    public function store(StoreUserRequest $user)
    {
        $filename = $this->uploadImage($user->image, User::PATH);
        User::create([
            'name' => $user['name'],
            'password' => Hash::make($user['password']),
            'password_confirmation' =>Hash::make($user['password_confirmation']),
            'type' => $user['type'],
            'email' => $user['email'],
            'image' => $filename,
        ]);
        return back()->with(session()->flash('Add', 'Add Successfully'));
    }

    
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }



    public function update(request $request, User $user)
    {
        $filename = $this->uploadImage($request->image, User::PATH);
        $user->update([
            'name' => $user['name'],
            'password' => Hash::make($user['password']),
            'password_confirmation' =>Hash::make($user['password_confirmation']),
            'type' => $user['type'],
            'email' => $user['email'],
            'image'       => $filename,
        ]);
        session()->flash('edit','user updated succsfuly');
        return redirect()->route('user.index');
    }



    public function destroy(User $user)
    {
        $this->removeImage($user->image);
        $user->delete();
        session()->flash('delete', 'user Deleted Successfully');
        return redirect()->route('user.index');
    }
}
