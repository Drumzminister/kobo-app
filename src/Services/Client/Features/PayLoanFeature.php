<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\PayLoanJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class PayLoanFeature extends Feature
{
    public function __construct($loanId)
    {
        $this->loanId = $loanId;
    }

    public function handle( Request $request)
    {
//        return $request->all();
        return response()->json([
            'payment' =>    $this->run(PayLoanJob::class, ['loanId' => $this->loanId, 'data' => $request->all(), 'companyId' => auth()->user()->getUserCompany()->id])
        ]);
    }
}
