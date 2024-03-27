<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required',],
            'price' => ['required', 'integer'],
            'offer' => ['required', 'integer'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:10000'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Category name is required',
            'category_id.required' => 'Related category is required',
        ];
    }
}
