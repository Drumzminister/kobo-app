<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\AddSaleJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSaleFeature extends Feature
{
    public function handle(Request $request)
    {
		$response = $this->run(AddSaleJob::class, ['data' => $request->all(), 'user' => auth()->user()]);
		if ($response->status === "success") {
			return ['status' => 'success', 'message' => $response->message, 'data' => $response->data];
		}

	    return ['status' => 'error', 'message' => $response->message, 'data' => $response->data];

    }
}
