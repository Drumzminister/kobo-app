<?php

namespace App\Services\Client\Features;

use App\Domains\Banking\Jobs\ListPaymentMethodsJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAddExpensesPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['paymentMethods'] = $this->run(ListPaymentMethodsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
        return $this->run(new RespondWithViewJob('client::expenses.add', $data));
    }
}
