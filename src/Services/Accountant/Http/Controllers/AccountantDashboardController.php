<?php

namespace App\Services\Accountant\Http\Controllers;

use App\Services\Accountant\Features\AddClientReviewFeature;
use App\Services\Accountant\Features\ShowAccountantChatHistoryPageFeature;
use App\Services\Accountant\Features\ShowAccountantClientListFeature;
use App\Services\Accountant\Features\ShowAccountantConversationPageFeature;
use App\Services\Accountant\Features\ShowAccountantDashboardFeature;
use App\Services\Accountant\Features\ShowAccountantProfileFeature;
use App\Services\Accountant\Features\UpdateProfileFeature;
use App\Services\Accountant\Features\ViewBudgetFeature;
use Lucid\Foundation\Http\Controller;

class AccountantDashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'accountant']);
	}

	public function showAccountantDashboardPage()
	{
		return $this->serve(ShowAccountantDashboardFeature::class);
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

    public function updateProfile()
    {
    	return $this->serve(UpdateProfileFeature::class);
    }

	public function showProfile()
	{
		return $this->serve(ShowAccountantProfileFeature::class);
	}

	public function showChatHistoryPage()
	{
		return $this->serve(ShowAccountantChatHistoryPageFeature::class);
	}

	public function showConversationsPage()
	{
		return $this->serve(ShowAccountantConversationPageFeature::class);
	}
}
