<?php

namespace Koboaccountant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistration extends FormRequest
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
            'email'      => 'required|email|unique:users',
            'password'   => 'confirmed|required|min:6',
            'first_name' => 'required',
            'last_name'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Provide a valid work email address',
            'email.required' => 'Email is required',
            'email.unique' =>'Account already exists for the email provided, Login to add another company instead.',
            'password.required'  => 'Password is required to create your account',
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
        ];
    }
}
