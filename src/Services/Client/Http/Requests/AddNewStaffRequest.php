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
            'phone' => 'required|size:11',
            'email' => 'required',
            'years_of_experience' => 'required|min:1,max:50',
            'avatar'        => 'file|max:10000|image',
//            'avatar'        => 'file|max:1000|image|dimensions:min_width=100,max_with=200',
        ];
    }
}
