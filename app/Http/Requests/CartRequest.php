<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'product_size' => 'required|string',
            'product_color' => 'required|string',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_size.required' => trans('validation.required', ['Product Size']),
            'product_size.string' => trans('validation.required', ['Product Size']),
            'product_color.required' => trans('validation.required', ['Product Color']),
            'product_color.string' => trans('validation.required', ['Product Color']),
            'quantity.required' => trans('validation.required', ['Quantity']),
        ];
    }
}
