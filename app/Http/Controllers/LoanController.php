<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Loan\PaymentRepository;
use Koboaccountant\Repositories\Loan\SourceRepository;
use Koboaccountant\Repositories\LoanRepository;
use Koboaccountant\Repositories\Opening\CashRepository;
use Koboaccountant\Traits\Loan;
use Koboaccountant\Traits\LoanPayment;
use Koboaccountant\Traits\LoanSource;

class LoanController extends Controller
{
    use LoanSource, Loan, LoanPayment;


    protected $loan_repo;
    protected $source_repo;
    protected $payment_repo;
    protected $cash_repo;

    public function __construct()
    {
        $this->loan_repo = new LoanRepository();
        $this->source_repo = new SourceRepository();
        $this->payment_repo = new PaymentRepository();
        $this->cash_repo = new CashRepository();
    }

    public function overview ()
    {
        return view('loans');
    }

    public function index (Request $request)
    {
        return view('view-loans');
    }

    public function store(Request $request)
    {
        /*if ($this->loan_repo->loanWithSourceExists($request->source_id)) {
            return response()->json([
                'error' =>  'You are already owing this Loan source so your loan has not been processed. Pay off existing debts before taking a new loan from this source'
            ], 403);
        }*/

        $loan = $this->loan_repo->create($request);
        try {
            $this->cash_repo->addCash($request->amount);
        }
        catch (\Exception $e) {
            $loan->delete();
            return response()->json([
                'error' =>  $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'loan'=> $loan
        ], 201);
    }

    public function getLoans()
    {
        $loans = $this->loan_repo->page()->take(5);
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
