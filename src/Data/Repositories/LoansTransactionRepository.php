<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/28/2019
 * Time: 3:12 PM
 */

namespace App\Data\Repositories;


class LoansTransactionRepository extends TransactionRepository
{
    /**
     * @param array $data
     * @param $loan
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function saveTransaction(array $data, $loan)
    {
        $data['loan_id'] = $loan->id;
        $data['kobo_id'] = explode('-', $this->generateUuid())[0];

        return $this->fillAndSave($data);
    }
}
