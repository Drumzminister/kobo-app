<?php

namespace App\Services\Client\Features;

use App\Domains\Debtor\Jobs\GetCompanyDebtorsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowDebtorsPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['debtors'] = $this->run(GetCompanyDebtorsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
        return $this->run(new RespondWithViewJob('client::debtors.debtors', $data));
    }
}
