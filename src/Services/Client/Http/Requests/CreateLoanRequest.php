<?php

namespace App\Services\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoanRequest extends FormRequest
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
            'description'   =>  'required',
            'loan_source_id'    =>  'required|exists:loan_sources,id',
            'amount'    =>  'required',
            'interest'  =>  'required|numeric|max:100',
            'period'    =>  'required|in:week,month,year',
            'term'      =>  'required|integer',
            'payment_interval'  =>  'required|in:',
            'start_date'    =>  'required|date'
        ];
    }
}
