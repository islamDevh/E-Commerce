<?php

namespace App\Http\Requests\massage;

use Illuminate\Foundation\Http\FormRequest;

class StoreMassageRequest extends FormRequest
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
            'name'         => ['required'],
            'email'        => ['required','email'],
            'subject'      => ['required'],
            'message'      => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'    => ' name is required',
            'email.required'   => ' email is required',
            'subject.required' => ' subject is required',
            'message.required' => ' message is required',
        ];
    }
}
