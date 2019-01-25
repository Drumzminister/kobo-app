<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddCustomerFeature;
use App\Services\Client\Features\AllCustomerFeature;
use App\Services\Client\Features\CustomerFeature;
use App\Services\Client\Features\AddSingleCustomerFeature;
use App\Services\Client\Features\HandleCsvUploadFeature;
use App\Services\Client\Features\ListAllCustomersFeature;
use App\Services\Client\Features\SearchCustomerFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return $this->serve(CustomerFeature::class);
    }

    public function showCustomer()
    {
        return $this->serve(AddCustomerFeature::class);
    }

    public function listAllCustomers()
    {
        return $this->serve(ListAllCustomersFeature::class);
    }
    public function addCustomer()
    {
        return $this->serve(AddSingleCustomerFeature::class);
    }
    
    public function allCustomers()
    {
        return $this->serve(AllCustomerFeature::class);
    }

    public function searchCustomers()
    {
        return $this->serve(SearchCustomerFeature::class);
    }
    public function handleCsvUpload()
    {
        return $this->serve(HandleCsvUploadFeature::class);
    }
}
