<?php

namespace App\Services\Client\Features;

use App\Domains\Sales\Jobs\SearchCompanySalesJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchCompanySalesFeature extends Feature
{
    public function handle(Request $request)
    {
    	$response = $this->run(SearchCompanySalesJob::class, ['company_id' => auth()->user()->getCompany()->id]);

    	return $response;
    }
}
