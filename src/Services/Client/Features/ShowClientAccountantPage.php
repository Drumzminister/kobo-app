<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Sale\Jobs\GetSaleItemsJob;
use App\Domains\Sales\Jobs\GetSalesPageDataJob;
use Illuminate\Support\Collection;
use Koboaccountant\Models\Sale;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowClientAccountantPage extends Feature
{	

	public function handle(Request $request)
    {

    	return $this->run(new RespondWithViewJob('client::view-accountant'));
    }
}

