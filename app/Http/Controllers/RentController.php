<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Helpers\RentHelper as Helper;

class RentController extends Controller
{
    protected $rent_repo;
    public function __construct()
    {
        $this->middleware('auth');
        $this->rent_repo = Helper::getRentRepo();
    }

    public function show()
    {
        $data['total'] = $this->rent_repo->getAll()->sum('amount');
        $data['total_used_rent'] = Helper::getTotalUsedRent();

        return view('rent', $data);
    }

    public function index()
    {
        return view('view-rent');
    }

    public function getRents()
    {
        return response()->json([
            'rents' =>  array_values($this->rent_repo->getAll()->all())
        ]);
    }

    public function store(Request $request)
    {
        $rent = $this->rent_repo->create($request->all());
        return response()->json([
            'rent'  =>  $this->rent_repo->findBy('id', $rent)
        ]);

    }

    public function addPaymentMethod($id, Request $request)
    {
        // TODO update rent details on the transactions table ie bank transaction or cash transaction
    }
}
