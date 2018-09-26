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

    public function store(CompanyRequest $request)
    {
        $company = $this->company->createCompany($request);

        return response()->json(['status' => 'Company created successfully']);
    }
}
