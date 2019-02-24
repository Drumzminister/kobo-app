<?php

namespace App\Services\Client\Features;

use App\Domains\Debtor\Jobs\GetCompanyDebtorsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Sales\Jobs\GetDebtorsPageDataJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowDebtorsPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['debtors'] = $this->run(GetCompanyDebtorsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
        $data = $this->run(GetDebtorsPageDataJob::class, ['companyId' => auth()->user()]);
        return $this->run(new RespondWithViewJob('client::debtors.debtors', $data));
    }
}
