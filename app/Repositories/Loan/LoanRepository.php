<?php
namespace Koboaccountant\Repositories;

use Koboaccountant\Models\Loan;
use Koboaccountant\Models\LoanHistory;

class LoanRepository {
    public function __construct(Loan $loan)
    {
        $this->loan = $loan;
    }

    public function create($data)
    {
        $loan = new Loan;
        $loan->company_id = $data['company_id'];
        $loan->name = $data['name'];
        $loan->start_date = $data['start_date'];
        $loan->end_date = $data['end_date'];
        $loan->duration = $data['duration'];
        $loan->amount = $data['amount'];
        $loan->purpose = $data['purpose'];
        $loan->isActive = 1;
        $loan->save();

        return true;
    }

    public function update($data)
    {
        $loan = Loan::where('id', $data['loan_id'] && 'isActive')->first();
        if($loan === null){
            return false;
        }
        $loan->name = isset($data['name']) ?: null;
        $loan->start_date = isset($data['start_date']) ?: null;
        $loan->duration = isset($data['duration']) ?: null;
        $loan->amount = isset($data['amount']) ?: null;
        $loan->purpose = isset($data['purpose']) ?: null;
        $loan->save();

        return true;
    }

    public function find($id)
    {
        $loan = Loan::where('id', $data['data_id'])->first();
        return $loan;
    }

    public function transaction($data, $loanTransaction)
    {
        $loanTransaction = find($data['loan_id']);
        if ($loanTransaction === null) {
            //Loan doesn't exist
            return false;
        }
        $loanTransaction = new LoanTransaction;
        $loanTransaction->decrement($loanTransaction['duration']);
        $loanTransaction->amount = $loanTransaction['amount'];
        $loanTransaction->paid_date = $loanTransaction['paid_date'];
        $loanTransaction->payment_method = $loanTransaction['payment_method'];
        $loanTransaction->bank_name = $loanTransaction['bank_account_id'];
        $loanTransaction->save();
        if($loanTransaction->amount < $data['duration'])
        {
            Loan::update(['isActive', 0]);
        }
        return true;
    }

    public function searchLoan($from, $to)
    {
        $current = Loan::where('isActive', 1)
            ->whereBetween('created_at', array($from, $to))->first();

        return $current;
    }

}