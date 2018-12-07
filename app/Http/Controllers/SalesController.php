<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Repositories\Sales\SalesRepository;
use Koboaccountant\Http\Requests\CustomerRegistrationRequest;

class SalesController extends Controller
{
    public function __construct(SalesRepository $sales)
    {
        $this->salesRepo = $sales;
    }

    public function index()
    {
        return view('sales');
    }

    public function sales()
    {
        $customers = $this->salesRepo->customer()->get();
        return view('addSales', compact('customers'));
    }

    public function create(Request $request)
    {
        //Validations
        $this->salesRepo->create($request->all());
    }

    public function getCustomer(Request $request)
    {
        $data = [];

        if ($request->all) {
            $search = $request->q;
            $data = $this->customer->allUserCustomers()->where('last_name', 'LIKE', "%$search%")->get();
        }

        return response()->json($data);
    }
}
