<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\AddSaleJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSaleFeature extends Feature
{
    public function handle(Request $request)
    {
		$isAdded = $this->run(AddSaleJob::class, ['data' => $request->all(), 'user' => auth()->user()]);

		if ($isAdded) {
			return ['status' => 'success', 'data' => $isAdded];
		}
    }
}
