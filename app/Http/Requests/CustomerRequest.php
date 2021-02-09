<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
//            'phone' => ['required', 'regex:/^(?:\+965)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/m'],
            'phone' => 'required|numeric',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => trans('validation.required', ['attribute' => __('cart.first_name')]),
            'last_name.required' => trans('validation.required', ['attribute' => __('cart.last_name')]),
            'phone.required' => trans('validation.required', ['attribute' => __('cart.phone')]),
            'phone.numeric' => trans('validation.regex', ['attribute' => __('cart.phone')]),
            //'phone.regex' => trans('validation.regex', ['attribute' => __('cart.phone')]),
            'address.required' => trans('validation.required', ['attribute' => __('cart.address')]),
        ];
    }
}
