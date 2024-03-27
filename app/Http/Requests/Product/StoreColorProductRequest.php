<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorProductRequest extends FormRequest
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
            'product_id' => ['required'],
            'name'       => ['required'],
            'color'      => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => 'product is required',
            'name.required' => 'product name is required',
            'color.required' => 'color is required',
        ];
    }
}
