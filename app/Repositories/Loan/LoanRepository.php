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

    public function search($query)
    {
        return $this->model->where('user_id', $this->getAuthUserId())->where('description', 'like', '%'. $query .'%')->orWhere('status', 'like', '%'. $query .'%')->get();
    }

}