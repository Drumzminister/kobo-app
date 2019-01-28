<?php

namespace App\Services\Client\Features;

use App\Domains\Sale\Jobs\SendSaleInvoiceJob;
use App\Services\Client\Http\Requests\SendSaleInvoiceRequest;
use Lucid\Foundation\Feature;

class SendInvoiceToCustomerFeature extends Feature
{
    public function handle(SendSaleInvoiceRequest $request)
    {
    	$response = $this->run(SendSaleInvoiceJob::class, $request->all());

    	if ($response->status === 'success') {
    		return $response;
	    }
    }
}
