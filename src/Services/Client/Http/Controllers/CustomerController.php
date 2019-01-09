<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddCustomerFeature;
use App\Services\Client\Features\CustomerFeature;
use App\Services\Client\Features\AddSingleCustomerFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(CustomerFeature::class);
    }

    public function showCustomer()
    {
        return $this->serve(AddCustomerFeature::class);
    }
    public function addCustomer()
    {
        return $this->serve(AddSingleCustomerFeature::class);
    }
}
