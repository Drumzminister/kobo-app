<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Loan\PaymentRepository;
use Koboaccountant\Repositories\Loan\SourceRepository;
use Koboaccountant\Repositories\LoanRepository;
use Koboaccountant\Traits\Loan;
use Koboaccountant\Traits\LoanPayment;
use Koboaccountant\Traits\LoanSource;

class LoanController extends Controller
{
    use LoanSource, Loan, LoanPayment;


    protected $loan_repo;
    protected $source_repo;
    protected $payment_repo;

    public function __construct()
    {
        $this->loan_repo = new LoanRepository();
        $this->source_repo = new SourceRepository();
        $this->payment_repo = new PaymentRepository();
    }

    public function store(Request $request)
    {
        /*if ($this->loan_repo->loanWithSourceExists($request->source_id)) {
            return response()->json([
                'error' =>  'You are already owing this Loan source so your loan has not been processed. Pay off existing debts before taking a new loan from this source'
            ], 403);
        }*/
        $loan = $this->loan_repo->create($request);
        return response()->json([
            'loan'=> $loan
        ], 200);
    }

    public function getLoans()
    {
        $loans = $this->loan_repo->getAllRunning()->take(5);
        return response()->json([
            'loans' =>  $loans,
        ], 200);
    }

    public function show($id)
    {
        $loan = $this->loan_repo->find($id);
        return response()->json([
            'loan'  =>  $loan
        ], 200);
    }
}
