<?php

namespace Koboaccountant\Repositories\Expense;

use Illuminate\Http\Request;
use Koboaccountant\Models\Expense;
use Koboaccountant\Repositories\BaseRepository;

class ExpenseRepository extends BaseRepository
{
    function __construct()
    {
        parent::__construct(new Expense());
    }

    public function create(Request $request)
    {
       $expense = new Expense();
       $expense->id = $this->generateUuid();
       $expense->user_id = $this->getAuthUserId();
       $expense->date = $request->date;
       $expense->details = $request->details;
       $expense->class_type = $request->class_type;
       $expense->amount = $request->amount;
       $expense->payment_mode = $request->payment_mode;

       $expense->save();
    }
}
