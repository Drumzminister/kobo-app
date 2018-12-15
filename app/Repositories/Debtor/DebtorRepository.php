<?php

namespace Koboaccountant\Repositories\Debtor;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Debtor;


class DebtorRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Debtor());
    }

    public function create(Request $request)
    {
        $debtor = $this->model;
        $debtor->id = $this->generateUuid();
        $debtor->user_id = $request->user()->id;
        $debtor->customer_id = $request->customer_id;
        $debtor->amount = $request->amount;

        $debtor->save();
        return $debtor;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, Request $request)
    {
        $debtor = $this->model::find($id);
        $debtor->customer_id = $request->customer_id;
        $debtor->amount = $request->amount;

        $debtor->save();
        return true;
    }
    // Given a customer that buys 
    // amount is less than total amount
    // add the customer_id to debtors table
    // and save

    public function createDebtorThroughSales($customerId, $amount)
    {
        $debtor = $this->model;
        $debtor->id = $this->generateUuid();
        $debtor->user_id = $request->user()->id;
        $debtor->customer_id = $customerId;
        $debtor->amount = $amount;

        $debtor->save();
        return true;
    }
    
    /**
     * @return mixed
     */
    public function getAll()
    {
        $debtors = $this->model->where('user_id', $this->getAuthUserId())->get();
        return true;
    }
        /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $debtor = $this->model->find($id);
        $debtor->delete();
        return true;
    }
}