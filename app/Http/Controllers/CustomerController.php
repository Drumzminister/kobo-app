<?php

namespace Koboaccountant\Http\Controllers;

use Koboaccountant\Repositories\Customer\CustomerRepository;
use Koboaccountant\Http\Requests\CustomerRegistrationRequest;
use Illuminate\Http\Request;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Customer;

class CustomerController extends Controller
{
    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        return view('customer');
    }

    public function store(CustomerRegistrationRequest $request)
    {
        if (!$this->customer) {
            return 'Error occured';
        }
        $this->customer->create($request);

        return 'Success';
    }

    public function search()
    {
        return view('search');
    }
}
