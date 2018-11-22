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
        Auth::loginUsingId('44e34d94-943b-3150-93fb-90da43504907');
        return view('dashboard');
    }
}
