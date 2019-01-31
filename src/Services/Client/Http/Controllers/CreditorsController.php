<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowCreditorsPageFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class CreditorsController extends Controller
{
	public function showCreditorsPage()
	{
		return $this->serve(ShowCreditorsPageFeature::class);
	}
}