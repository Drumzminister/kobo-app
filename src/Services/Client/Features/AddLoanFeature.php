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
//        return json_decode(json_encode($request->all()['receivingAccount']));
        $loan = $this->run(AddLoanJob::class, ['data' => $request->all(), 'userId' => auth()->id(), 'companyId' => auth()->user()->getUserCompany()->id]);
        $creditAccount = $this->run(CreditAccountJob::class, ['companyId' => auth()->user()->getUserCompany()->id, 'bank' => $request->receivingAccount, 'amount'=> $request->amount]);
        $saveTransaction = $this->run(SaveLoanTransactionJob::class, ['data' => $request->all(),'loanId' => $loan->id, 'companyId' => auth()->user()->getUserCompany()->id]);
        if (!$saveTransaction && !$creditAccount) {
            return response()->json([
                'message'   =>  'An unknown error occurred while saving the loan. Please try again',
            ]);
        }
        return response()->json([
            'loan' =>   $loan
        ]);
    }

}
