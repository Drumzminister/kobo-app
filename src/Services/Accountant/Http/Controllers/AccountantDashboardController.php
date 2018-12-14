<?php

namespace App\Services\Accountant\Http\Controllers;

use App\Services\Accountant\Features\AddClientReviewFeature;
use App\Services\Accountant\Features\ShowAccountantClientListFeature;
use App\Services\Accountant\Features\ViewBudgetFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class AccountantDashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'accountant']);
	}

	public function showClients()
    {
    	return $this->serve(ShowAccountantClientListFeature::class);
    }

    public function reviewClient()
    {
    	return $this->serve(AddClientReviewFeature::class);
    }

    public function vewBudget($budgetId)
    {
    	return $this->serve(ViewBudgetFeature::class, ['budgetId' => $budgetId]);
    }
}
