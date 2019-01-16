<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddSaleFeature;
use App\Services\Client\Features\AddSaleItemFeature;
use App\Services\Client\Features\DeleteSaleFeature;
use App\Services\Client\Features\ListSalesFeature;
use App\Services\Client\Features\UpdateSaleFeature;
use Lucid\Foundation\Http\Controller;

class SaleController extends Controller
{
	public function addSale()
	{
		return $this->serve(AddSaleFeature::class);
	}

	public function listSales()
	{
		return $this->serve(ListSalesFeature::class);
	}

	public function updateSale()
	{
		return $this->serve(UpdateSaleFeature::class);
	}

	public function deleteSale()
	{
		return $this->serve(DeleteSaleFeature::class);
	}

	public function addSaleItem($saleId)
	{
		return $this->serve(AddSaleItemFeature::class, ['saleId' => $saleId]);
	}
}
