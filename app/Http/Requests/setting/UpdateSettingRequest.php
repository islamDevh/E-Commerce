<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => ['required'],
            'email'       => ['email'],
            'phone'       => ['min:11','numeric'],
            'whatsapp'    => ['required'],
            'facebook'    => ['required'],
            'instagram'   => ['required'],
            'youtube'     => ['required'],
            'twitter'     => ['required'],
            'description' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'        => ' name is required',
            'email.required'       => ' Email is required',
            'phone.required'       => ' phone is required',
            'whatsapp.required'    => ' whatsapp is required',
            'facebook.required'    => ' facebook is required',
            'instagram.required'   => ' instagram is required',
            'youtube.required'     => ' youtube is required',
            'twitter.required'     => ' twitter is required',
            'description.required' => ' description is required',
        ];
    }
}
