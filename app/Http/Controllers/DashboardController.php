<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Company;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {

        $company = Company::where('user_id', Auth::user()->id)->get();
       
        return view('dashboard', ['company' => $company]);
    }
}
