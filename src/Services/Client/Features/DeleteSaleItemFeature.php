<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\DeleteSaleItemJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeleteSaleItemFeature extends Feature
{

	private $itemId;

	public function __construct($itemId)
	{
		$this->itemId = $itemId;
	}

	public function handle(Request $request)
	{
		return $response = $this->run(DeleteSaleItemJob::class, ['itemId' => $this->itemId]);
	}
}
