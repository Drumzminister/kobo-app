<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('rent');
    }

    public function index()
    {
        return view('view-rent');
    }

    public function store(Request $request)
    {
        // TODO store the rent form the rent repository
    }

    public function addPaymentMethod($id, Request $request)
    {
        // TODO update rent details on the transactions table ie bank transaction or cash transaction
    }
}
