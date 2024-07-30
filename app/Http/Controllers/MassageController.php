<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\massage\StoreMassageRequest;
use App\Mail\MailMassage;

class MassageController extends Controller
{
   
    public function index()
    {
        return view('admin.messages.index');
    }



    public function store(StoreMassageRequest $request)
    {
        // $data = [];
        $data = Message::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'subject'  => $request->subject,
            'message'  => $request->message,
        ]);
        Mail::to($request->email)->send(new MailMassage($data));
        session()->flash('Add','Massage has been send secsefuly');
        return redirect()->route('massage.index');
    }
}


