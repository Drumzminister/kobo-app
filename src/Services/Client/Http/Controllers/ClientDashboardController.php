<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowAddSalesPageFeature;
use App\Services\Client\Features\ShowCompanySalesFeature;
use App\Services\Client\Features\ShowDashboardPageFeature;
use App\Services\Client\Features\ShowSaleCreationPageFeature;
use App\Services\Client\Features\TestFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ClientDashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'client']);
	}

    public function showSalesPage($slug)
    {
		return $this->serve(ShowCompanySalesFeature::class, ['slug' => $slug]);
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
}
