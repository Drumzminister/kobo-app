<?php

namespace App\Services\Client\Http\Requests;

use App\Data\Repositories\VendorRepository;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class AddVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $vendor;
    public function __construct()
    {
        $this->vendor = app(VendorRepository::class);
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
            'items.*.name' => 'required',
            'items.*.email' => ['required',   'max:255', Closure::fromCallable([$this, 'validateVendorEmailUnique'])],
            'items.*.address' => 'required',
            'items.*.phone' => ['required', Closure::fromCallable([$this, 'validateVendorPhoneUnique'])],
            'items.*.website' => [Closure::fromCallable([$this, 'validateVendorWebsiteUnique'])],
        ];
    }
    
    public function validateVendorEmailUnique($attribute, $value, $fail)
    {
        $vendor = $this->vendor->getByAttributes(['company_id' => auth()->user()->getUserCompany()->id, 'email' => $value])->first();
        if($vendor) $fail('Vendor exist already exist');
    }
    public function validateVendorPhoneUnique($attribute, $value, $fail)
    {
        $vendor = $this->vendor->getByAttributes(['company_id' => auth()->user()->getUserCompany()->id, 'phone' => $value])->first();
        if($vendor) $fail('Vendor phone already exist');
    }
    public function validateVendorWebsiteUnique($attribute, $value, $fail)
    {
        $vendor = $this->vendor->getByAttributes(['company_id' => auth()->user()->getUserCompany()->id, 'website' => $value])->first();
        if($vendor) $fail('Vendor website already exist');
    }
    public function messages()
    {
        return [
            'items.*.name.required' => 'You must provide vendor name',
            'items.*.email.unique'  => 'This vendor email already exist',
            'items.*.email.required'  => 'You have to provide email',
            'items.*.address.required' => 'Vendor must provide address',
            'items.*.phone.required' => 'Vendor phone number is required',
            'items.*.phone.int' => 'Phone number must be number',
            'items.*.phone.unique' => 'This vendor phone number has already been entered',
            'items.*.website.unique' => 'Vendor website already in inserted'
        ];
    }
}
