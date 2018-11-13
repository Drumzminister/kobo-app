<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;

class CreditorController extends Controller
{
    public function index()
    {
        return view('opening-creditors');
    }
}
