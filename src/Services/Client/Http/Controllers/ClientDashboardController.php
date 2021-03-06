<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowAddSalesPageFeature;
use App\Services\Client\Features\ShowCompanySalesFeature;
use App\Services\Client\Features\ShowDashboardPageFeature;
use App\Services\Client\Features\ShowSaleCreationPageFeature;
use App\Services\Client\Features\TestFeature;
use Lucid\Foundation\Http\Controller;

class ClientDashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'client']);
	}

    public function showSalesPage()
    {
		return $this->serve(ShowCompanySalesFeature::class);
    }

	public function index()
	{
		return $this->serve(ShowDashboardPageFeature::class);
	}

	public function showAddSalesPage($slug)
	{
		return $this->serve(ShowAddSalesPageFeature::class);
	}

	public function showSaleCreationPage($saleId)
	{
		return $this->serve(ShowSaleCreationPageFeature::class, ['saleId' => $saleId]);
	}


	public function testFeature($slug)
	{
		return $this->serve(TestFeature::class, ['slug' => $slug]);
	}

	public function viewAccountant()
    {
         return $this->serve(\App\Services\Client\Features\ShowClientAccountantPage::class);
    }
}
