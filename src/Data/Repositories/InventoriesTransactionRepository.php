<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/28/2019
 * Time: 2:49 PM
 */

namespace App\Data\Repositories;


class InventoriesTransactionRepository extends TransactionRepository
{

    /**
     * @param array $data
     * @param $inventory
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function saveTransaction(array $data, $inventory)
    {
        $data['inventory_id'] = $inventory->id;
        $data['kobo_id'] = explode('-', $this->generateUuid())[0];
        return $this->fillAndSave($data);
    }
}
