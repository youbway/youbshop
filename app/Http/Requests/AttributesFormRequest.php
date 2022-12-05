<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributesFormRequest extends FormRequest
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
            'sku.*' => "required|unique:attributes,sku",
            'size.*' => 'required|unique:attributes,size',
            'price.*' => 'required|numeric',
            'stock.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sku.*' => "sku must be unique",
            'size.*' => 'size must be unique',
            'price.*' => 'price is required and must be numeric',
            'stock.*' => 'size is required'
        ];
    }
}
