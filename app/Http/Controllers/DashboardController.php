<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Company;
use Auth;
class DashboardController extends Controller
{
	function __construct(){
		// $this->middleware('has_paid');
	}

    public function index()
    {
        Auth::loginUsingId('03f2409e-1fb2-32b3-be51-e5ba45df1b19');
        return view('dashboard');
    }
}
