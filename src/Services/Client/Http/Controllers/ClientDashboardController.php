<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowCompanySalesFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ClientDashboardController extends Controller
{
    public function showSalesPage($slug)
    {
		return $this->serve(ShowCompanySalesFeature::class, ['slug' => $slug]);
    }
}
