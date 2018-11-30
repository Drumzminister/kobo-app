<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Models\Expense;
use Koboaccountant\Repositories\Expense\ExpenseRepository;

class ExpensesController extends Controller
{
    protected $expenseRepo;

    public function __construct()
    {
        $this->middleware('auth');
        $this->expenseRepo = new ExpenseRepository();
    }

    public function index()
    {
        $data['highExpenses'] = Expense::where('user_id', Auth::id())->orderBy('amount', 'desc')->take(4)->get();
//        dd($data['highExpenses']);
        return view('expenses', $data);
    }

    public function store(Request $request)
    {
        $this->expenseRepo->create($request);

        return response()->json([
            'message' => 'Saved Successfully',
        ])->setStatusCode(200);
    }
}
