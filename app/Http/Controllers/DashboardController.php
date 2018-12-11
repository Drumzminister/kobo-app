<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Company;
use Auth;
class DashboardController extends Controller
{
	public function __construct()
	{
		 $this->middleware(['auth', 'client']);
	}

    public function index()
    {
        return view('dashboard');
    }
}
