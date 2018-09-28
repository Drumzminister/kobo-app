<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Company\AccountRepository;
use Auth;

class AccountController extends Controller
{
	function __construct(AccountRepository $accRepo)
	{
		$this->accRepo = $accRepo;
	}
    public function store($company_id, Request $request)
    {
    	//Validations
    	$data = $request->all();
    	$data['company'] = $company_id;
    	$create = $this->accRepo->create($data);
    	if ($create) {
    		return response($content = 'Successful', $status = 201);
    	}
    }

    public function create($company)
    {
    	$data['company'] = Auth::user()->companies->where('name', $company);
    	return view('company.account.create', $data) ;
    } 
}
