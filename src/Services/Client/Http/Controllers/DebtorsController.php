<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowAllDebtorsPageFeature;
use App\Services\Client\Features\ShowDebtorsPageFeature;
use App\Services\Client\Features\ShowSingleDebtorsPageFeature;
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
        return $this->serve(ShowDebtorsPageFeature::class);
    }

    public function showSingleDebtorPage()
    {
        return $this->serve(ShowSingleDebtorsPageFeature::class);
    }

    public function showAllDebtorsPage()
    {
        return $this->serve(ShowAllDebtorsPageFeature::class);
    }
}
