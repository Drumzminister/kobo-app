<?php

namespace App\Services\Client\Features;

use App\Domains\Banking\Jobs\CreditAccountJob;
use App\Domains\Loan\Jobs\AddLoanJob;
use App\Domains\Loan\Jobs\SaveLoanTransactionJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddLoanFeature extends Feature
{
    public function handle(Request $request)
    {
//        return var_dump(json_decode($request->receivingAccount, true));
        return $loan = $this->run(AddLoanJob::class, ['data' => $request->all(), 'userId' => $request->user()->id, 'companyId' => $request->user()->getUserCompany()->id]);


    }

}
