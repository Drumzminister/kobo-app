<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\SearchExpensesFeature;
use App\Services\Client\Features\ShowAddExpensesPageFeature;
use App\Services\Client\Features\ShowExpensePageFeature;
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

    function showAddExpensePage()
    {
        return $this->serve(ShowAddExpensesPageFeature::class);
    }

    function searchExpenses($param)
    {
        return $this->serve(SearchExpensesFeature::class, ['param' => $param]);
    }
}
