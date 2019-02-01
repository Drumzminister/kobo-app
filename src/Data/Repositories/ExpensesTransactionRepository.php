<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/30/2019
 * Time: 5:28 PM
 */

namespace App\Data\Repositories;


class ExpensesTransactionRepository extends TransactionRepository
{

    public function saveTransaction(array $data, $expense)
    {
        $data['expense_id'] = $expense->id;
        $data['kobo_id'] = explode('-', $this->generateUuid())[0];

        return $this->fillAndSave($data);
    }
}
