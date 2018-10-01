<?php

namespace Koboaccountant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegistrationRequest extends FormRequest
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
            'name'      => 'required|max:100',
            'email'      => 'required|email|unique:customers',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Maximum name is 100 characters',
            'email.email' => 'Provide a valid email address',
            'email.required' => 'Email is required',
        ];
    }
}
