<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddCustomerFeature;
use App\Services\Client\Features\AllCustomerFeature;
use App\Services\Client\Features\CustomerFeature;
use App\Services\Client\Features\AddSingleCustomerFeature;
use App\Services\Client\Features\DeleteCustomerFeature;
use App\Services\Client\Features\EditCustomerFeature;
use App\Services\Client\Features\HandleCsvUploadFeature;
use App\Services\Client\Features\HandleCustomerImageUploadFeature;
use App\Services\Client\Features\ListAllCustomersFeature;
use App\Services\Client\Features\SearchCustomerFeature;
use App\Services\Client\Features\EditCustomerPageFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
    public function editCustomerPage($customerId)
    {
        return $this->serve(EditCustomerPageFeature::class, ['customerId' => $customerId]);
    }
    public function updateCustomer($customerId)
    {
        return $this->serve(EditCustomerFeature::class, ['customerId' => $customerId]);
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
    public function deleteCustomer($customerId)
    {
        return $this->serve(DeleteCustomerFeature::class, ['customerId' => $customerId]);
    }
    public function handleImageUpload()
    {
        return $this->serve(HandleCustomerImageUploadFeature::class);
    }
}
