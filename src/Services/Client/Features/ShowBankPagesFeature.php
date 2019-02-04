<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowBankPagesFeature extends Feature
{
    public function handle(Request $request)
    {
    	$data['banks'] = $this->run(GetBankAccountsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
        return $this->run(new RespondWithViewJob('client::bank.banking-pages', $data));
    }
}
