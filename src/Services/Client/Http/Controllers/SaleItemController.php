<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddSaleItemFeature;
use Lucid\Foundation\Http\Controller;

class SaleItemController extends Controller
{
	public function addSaleItem()
	{
		return $this->serve(AddSaleItemFeature::class);
	}
}
