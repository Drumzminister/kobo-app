<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddSaleItemFeature;
use App\Services\Client\Features\DeleteSaleItemFeature;
use App\Services\Client\Features\UpdateSaleItemFeature;
use Lucid\Foundation\Http\Controller;

class SaleItemController extends Controller
{
	public function addSaleItem()
	{
		return $this->serve(AddSaleItemFeature::class);
	}

	public function updateSaleItem($itemId)
	{
		return $this->serve(UpdateSaleItemFeature::class, ['itemId' => $itemId]);
	}

	public function deleteSaleItem($itemId)
	{
		return $this->serve(DeleteSaleItemFeature::class, ['itemId' => $itemId]);
	}
}
