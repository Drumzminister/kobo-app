<?php

namespace App\Services\Accountant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountantRegistrationRequest extends FormRequest
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
            'first_name'                => 'required',
            'last_name'                 => 'required',
            'sex'                       => 'required',
            'phone'                     => 'required',
            'phone_2'                   => '',
            'date_of_birth'             => 'required|date',
            'city'                      => 'required',
            'address'                   => 'required',
            'state'                     => 'required',
            'country'                   => 'required',
            'email'                     => 'required|unique:users',
            'password'                  => 'required|min:8|confirmed',
            'qualification'             => 'required',
            'job_status'                => 'required',
            'experience'                => 'required',
            'chattered'                 => 'required',
            'social_account'            => 'required',
            'terms'                     => 'required',
        ];
    }
}
