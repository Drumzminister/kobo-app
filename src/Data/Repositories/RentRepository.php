<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/5/2019
 * Time: 11:03 PM
 */

namespace App\Data\Repositories;


use App\Data\Rent;

class RentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Rent());
    }

    public function create(array $data)
    {
        $rent = $this->model;
        try {
            $rent->id = $this->generateUuid();
            $rent->user_id = $data['userId'];
            $data['other_costs'] = $data['other_costs'] ?? 0;
            $rent->fill($data);
            $rent->save();

            return $rent->id;
        } catch (\Exception $e) {
            return null;
        }

    }
}
