<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\UpdateLoanJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class PayLoanFeature extends Feature
{
    public function handle($loanId, Request $request)
    {
        $this->run(UpdateLoanJob::class);
    }
}
