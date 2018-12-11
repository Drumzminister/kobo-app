<?php
namespace Koboaccountant\Repositories;

use Illuminate\Http\Request;
use Koboaccountant\Models\Loan;


class LoanRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Loan());
    }

    public function create(Request $request)
    {
       $loan = $this->model;
       $loan->id = $this->generateUuid();
       $loan->user_id = $this->getAuthUserId();
       $loan->loan_source_id = $request->source_id;
       $loan->fill($request->all());

       $loan->save();
       return $this->find($loan->id);
    }

    public function loanWithSourceExists($source){
        $loan = is_null($this->model->where('user_id', $this->getAuthUserId())->where('loan_source_id', $source)->where('status', 'running')->first());
        return !$loan;
    }

    public function update($id, Request $request)
    {
        $loan = $this->model::find($id);
        $loan->loan_source_id = $request->source_id;
        $loan->update($request->all());

        $loan->save();
        return $loan;
    }

    public function pay(Request $request)
    {

    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function getAll()
    {
        return $this->model->where('user_id', $this->getAuthUserId())->get();
    }

    public function getAllRunning()
    {
        return $this->model->where('user_id', $this->getAuthUserId())->where('status', 'running')->get();
    }

    public function getAllPaid()
    {
        return $this->model->where('user_id', $this->getAuthUserId())->get();
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