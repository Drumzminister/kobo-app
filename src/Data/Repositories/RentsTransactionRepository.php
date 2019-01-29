<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/28/2019
 * Time: 2:49 PM
 */

namespace App\Data\Repositories;


class RentsTransactionRepository extends TransactionRepository
{

    /**
     * @param array $data
     * @param $rent
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function saveTransaction(array $data, $rent)
    {
        $data['rent_id'] = $rent->id;
        $data['kobo_id'] = explode('-', $this->generateUuid())[0];
        return $this->fillAndSave($data);
    }
}
