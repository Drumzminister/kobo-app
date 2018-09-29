<?php

namespace Koboaccountant\Http\Controllers;

use Koboaccountant\Requests\CustomerRegistrationRequest;
use Koboaccountant\Repositories\Customer\CustomerRepository;
class CustomerController extends Controller
{
    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    public function store() 
    {

    }
}
