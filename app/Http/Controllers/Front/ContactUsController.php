<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Message;
use App\Models\Setting;
use App\Mail\MailMassage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\massage\StoreMassageRequest;

class ContactUsController extends Controller
{
   
    public function index()
    {
        return view('front.ContactUs.index');
    }
   
    public function store(StoreMassageRequest $request)
    {
        $data = Message::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'subject'  => $request->subject,
            'message'  => $request->message,
        ]);
        Mail::to($request->email)->send(new MailMassage($data));
        session()->flash('Add','thanks for sending message');
        return redirect()->route('ContactUs.index');
    }

}
