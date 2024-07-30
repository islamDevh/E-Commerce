<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\setting\UpdateSettingRequest;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', ['settings' => Setting::all()]);
    }

    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('settings'));
    }


    public function update(UpdateSettingRequest $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'whatsapp'     => $request->whatsapp,
            'facebook'     => $request->facebook,
            'instagram'    => $request->instagram,
            'youtube'      => $request->youtube,
            'twitter'      => $request->twitter,
            'description'  => $request->description,
        ]);
        session()->flash('edit','setting Edit secsefuly');
        return redirect()->route('setting.index');
    }
}
