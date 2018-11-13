<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;

class DebtorController extends Controller
{
    public function index()
    {
        return view('opening-debtors');
    }
}
