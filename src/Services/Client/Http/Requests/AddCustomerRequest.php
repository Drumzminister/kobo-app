<?php

namespace App\Services\Client\Http\Requests;

use App\Data\Repositories\CustomerRepository;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $customer;
    public function __construct()
    {
        $this->customer = new CustomerRepository();
    }
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
            'email' => [Closure::fromCallable([$this, 'validateCustomerEmailUnique'])],
            'phone' => [Closure::fromCallable([$this, 'validateCustomerPhoneUnique'])],

        ];
    }
    public function validateCustomerEmailUnique($attribute, $value, $fail)
    {
        $customer = $this->customer->getByAttributes(['company_id' => auth()->user()->getUserCompany()->id, 'email' => $value])->first();
        if($customer && ! is_null($value)) $fail('Customer email already exist');
    }
    public function validateCustomerPhoneUnique($attribute, $value, $fail)
    {
        $customer = $this->customer->getByAttributes(['company_id' => auth()->user()->getUserCompany()->id, 'phone' => $value])->first();
        if($customer) $fail('Customer phone number already exist');
    }
}
