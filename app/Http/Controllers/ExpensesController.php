<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        return view('expenses');
    }
}
