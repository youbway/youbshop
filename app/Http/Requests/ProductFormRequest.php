<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string' ,
            'brand_id' => 'exists:brands,id',
            'description' => 'required|string' ,
            'code' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|numeric',

        ];
    }

    public function messages ($id = null) {
        return [
            'category_id.required' => 'The category field is required.',
            'brand_id' => 'The selected brand is invalid.',
        ];
    }
}
