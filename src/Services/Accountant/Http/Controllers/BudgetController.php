<?php

namespace App\Services\Accountant\Http\Controllers;

use App\Services\Client\Features\CreateBudgetFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BudgetController extends Controller
{
    public function createBudget()
    {
		return $this->serve(CreateBudgetFeature::class);
    }
}
