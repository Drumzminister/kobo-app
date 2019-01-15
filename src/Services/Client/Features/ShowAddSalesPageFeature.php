<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\GetCompanyBankAccountsJob;
use App\Domains\Customer\Jobs\GetCompanyCustomersJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Inventory\Jobs\GetCompanyInventoriesJob;
use App\Domains\Sales\Jobs\CreateSaleDraftJob;
use App\Domains\Sales\Jobs\GetCompanySaleChannelsJob;
use App\Domains\Vat\Jobs\GetVatsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAddSalesPageFeature extends Feature
{
    public function handle(Request $request)
    {
    	$sale = $this->run(CreateSaleDraftJob::class, ['user' => auth()->user()]);
		return redirect()->route('sale.create', $sale->id);
    }
}
