<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Sales\SalesRepository;
use Koboaccountant\Models\Customer;

class SalesController extends Controller
{
	// function __construct()
	// {
	// 	$this->salesRepo = new SalesRepository;
	// }
	public function index()
	{
		
		return view('sales');
	}

	public function sales()
	{
		$customers = Customer::all();
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

        if($request->has('q')){
            $search = $request->q;
            $data = Customer::where('first_name', 'LIKE', "%$search%")->get();
        }
        return response()->json($data);	
	}
}
