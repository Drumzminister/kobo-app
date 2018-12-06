<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Customer;
use Koboaccountant\Repositories\Sales\SalesRepository;

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
        $customers = $this->salesRepo->customer();

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

        if ($request->has('q')) {
            $search = $request->q;
            $data = Customer::where('last_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->get();
        }

        return response()->json($data);
    }
}
