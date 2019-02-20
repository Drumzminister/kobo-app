<?php

namespace App\Services\Client\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class DebtorsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function showDebtorsPage()
    {
        return $this->serve(\App\Services\Client\Features\ShowDebtorsPageFeature::class);
    }

    public function showSingleDebtorPage()
    {
        return $this->serve(\App\Services\Client\Features\ShowSingleDebtorsPageFeature::class);
    }

    public function showAllDebtorsPage()
    {
        return $this->serve(\App\Services\Client\Features\ShowAllDebtorsPageFeature::class);
    }
}
