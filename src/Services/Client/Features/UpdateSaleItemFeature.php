<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\UpdateSaleItemJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class UpdateSaleItemFeature extends Feature
{
	private $itemId;

	public function __construct($itemId)
	{
		$this->itemId = $itemId;
	}

	public function handle(Request $request)
	{
		return $response = $this->run(UpdateSaleItemJob::class, ['itemId' => $this->itemId, 'data' => $request->all()]);
	}
}
