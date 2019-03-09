<?php

namespace App\Services\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewStaffRequest extends FormRequest
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
            'role'      => 'required',
            'employed_date' => 'required',
            'salary' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }
}
