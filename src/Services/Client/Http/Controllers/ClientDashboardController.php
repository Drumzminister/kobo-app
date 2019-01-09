<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowCompanySalesFeature;
use App\Services\Client\Features\ShowDashboardPageFeature;
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
}
