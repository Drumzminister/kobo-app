<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\ListLoanPaymentsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListLoanPaymentRecordsFeature extends Feature
{
    public function __construct($loanId)
    {
        $this->loanId = $loanId;
    }

    public function handle(Request $request)
    {
        return response()->json([
            'payments'  =>   $this->run(ListLoanPaymentsJob::class, ['loanId' => $this->loanId])
        ]);
    }
}
