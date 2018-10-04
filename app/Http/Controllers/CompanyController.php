<?php

namespace Koboaccountant\Http\Controllers;

use Koboaccountant\Repositories\Company\CompanyRepository;
use Koboaccountant\Http\Controllers;
use Koboaccountant\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    public function index() {
        return view('company.dashboard');
    }

    public function create(){
        return "View to create company";
    }

    public function store(CompanyRequest $request)
    {
        $company = $this->company->createCompany($request);
        return back();
        // return response()->json(['status' => 'Company created successfully']);
    }

}
