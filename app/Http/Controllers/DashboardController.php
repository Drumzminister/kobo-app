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
        return view('dashboard');
    }
}
