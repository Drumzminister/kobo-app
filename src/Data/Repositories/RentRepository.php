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
            $rent->staff_id = $data['staffId'];
            $rent->company_id = $data['companyId'];
            $data['other_costs'] = $data['other_costs'] ?? 0;
            $rent->fill($data);
            $rent->save();

            return $rent->id;
        } catch (\Exception $e) {
            return null;
        }

    }

    public function update(array $data, $rent) {
        $rent = $this->find($rent);
        $rent->update($data);
        return $rent;
    }

    public function getOpening($companyId) {
        return Rent::where('company_id', $companyId)->where('type', 'opening')->get();
    }
}
