<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\AddSaleItemJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSaleItemFeature extends Feature
{
	public function handle(Request $request)
    {
		return $response = $this->run(AddSaleItemJob::class, ['data' => $request->all()]);
    }
}
