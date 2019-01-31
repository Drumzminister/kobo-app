<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Sale\Jobs\GetAllTaxJob;
use App\Domains\Vendor\Jobs\ListVendorsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowMultipleInventoryFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['vendors'] = $this->run(ListVendorsJob::class);
        $data['banks'] = $this->run(GetBankAccountsJob::class, ['companyId' => auth()->user()->company->id]);
        $data['taxes'] = $this->run(GetAllTaxJob::class);
        return $this->run(new RespondWithViewJob('client::inventory.multiple-inventory', $data));
    }
}
