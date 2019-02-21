<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddExpenseFeature;
use App\Services\Client\Features\SearchExpensesFeature;
use App\Services\Client\Features\ShowAddExpensesPageFeature;
use App\Services\Client\Features\ShowAllExpensesFeature;
use App\Services\Client\Features\ShowExpensePageFeature;
use App\Services\Web\Features\PayExpenseFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function showExpensePage()
    {
        return $this->serve(ShowExpensePageFeature::class);
    }

    function showAllExpenses()
    {
        return $this->serve(ShowAllExpensesFeature::class);
    }

    function showAddExpensePage()
    {
        return $this->serve(ShowAddExpensesPageFeature::class);
    }

    function addExpense()
    {
        return $this->serve(AddExpenseFeature::class);
    }

    function searchExpenses($param)
    {
        return $this->serve(SearchExpensesFeature::class, ['param' => $param]);
    }

    public function payExpense($expenseId)
    {
        return $this->serve(PayExpenseFeature::class, ['expenseId' => $expenseId]);
    }
}
