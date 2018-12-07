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

    public function allUserCustomers(Request $request)
    {
        // return response()->json($this->customer->allUserCustomers());
        
        $data = [];
        if ($request->has('q')) {
            $search = trim($request->q);
            $data = $this->customer->allUserCustomers()->where('last_name', 'LIKE', "%$search%")
            ->get();
        }

        return response()->json($data);
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
