<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\AddSaleItemJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSaleItemFeature extends Feature
{
	/**
	 * @var string
	 */
	private $saleId;

	public function __construct(string $saleId)
	{
		$this->saleId = $saleId;
	}

	public function handle(Request $request)
    {
		$response = $this->run(AddSaleItemJob::class, ['data' => $request->all(), 'saleId' => $this->saleId]);
    }
}
