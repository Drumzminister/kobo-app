<?php

namespace Koboaccountant\Http\Controllers;

class AccountantController extends Controller
{
    public function index()
    {
        return view('accountant.account-dashboard');
    }
}
