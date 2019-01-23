<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/13/2019
 * Time: 11:04 PM
 */

namespace App\Data\Repositories;


use App\Data\Transaction;

class LoanTransaction extends TransactionRepository
{

    public function __construct()
    {
        parent::__construct(new Transaction());
    }

    /**
     * @param array $data
     * @return bool
     */
    public function saveTransaction(array $data)
    {
        try {
            $data['kobo_id'] = $this->generateUuid();
            $this->fillAndSave($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
