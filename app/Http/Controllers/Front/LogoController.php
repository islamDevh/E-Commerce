<?php

namespace App\Http\Controllers\Front;
use Image;
use App\Models\Setting;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class LogoController extends Controller
{
    use imageTrait;
    public function index()
    {
        return view('admin.logo.index', ['settings' => Setting::all()]);
    }


    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.logo.edit', compact('settings'));
    }

   
    public function update(request $request, $id)
    {
        $setting = Setting::find($id);
        $setting->update($request->all());
        if($request->has('logo')){
            $logo = ImageUpload::uploadImage($request->logo , null , null , 'upload/images/logo/');
            $setting->update(['logo' => $logo]);
        }
        session()->flash('edit','logo Edit secsefuly');
        return redirect()->route('logo.index');
    }
}
