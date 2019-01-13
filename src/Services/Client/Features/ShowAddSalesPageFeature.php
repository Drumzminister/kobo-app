<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\GetCompanyBankAccountsJob;
use App\Domains\Customer\Jobs\GetCompanyCustomersJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Inventory\Jobs\GetCompanyInventoriesJob;
use App\Domains\Sales\Jobs\GetCompanySaleChannelsJob;
use App\Domains\Vat\Jobs\GetVatsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAddSalesPageFeature extends Feature
{
    public function handle(Request $request)
    {
    	$data['customers'] = $this->run(GetCompanyCustomersJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
    	$data['banks'] = $this->run(GetCompanyBankAccountsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
    	$data['taxes'] = $this->run(GetVatsJob::class);
    	$data['inventories'] = $this->run(GetCompanyInventoriesJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
    	$data['channels'] = $this->run(GetCompanySaleChannelsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);

    	return $this->run(new RespondWithViewJob('addSales', $data));
    }
}
