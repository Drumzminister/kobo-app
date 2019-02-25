<?php

namespace App\Services\Client\Features;

use App\Domains\Debtor\Jobs\GetDebtorsPageDataJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAllDebtorsPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetDebtorsPageDataJob::class, ['user' => auth()->user()]);
        return $this->run(new RespondWithViewJob('client::debtors.view-debtors', $data));
    }
}
