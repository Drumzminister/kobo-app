<?php 

namespace App\Data\Repositories;

use Koboaccountant\Models\Inventory;

class InventoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Inventory);
    }

    /**
     * @param array $data
     * @return mixed|null|\Ramsey\Uuid\UuidInterface
     */
    public function create(array $data)
    {
        $inventory = $this->model;

        try {
            $inventory->id = $this->generateUuid();
            $inventory->vendor_id = $data['vendor_id'];
            $inventory->name = $data['name'];
            $inventory->sales_price = $data['sales_price'];
            $inventory->purchase_price = $data['purchase_price'];
            $inventory->quantity = $data['quantity'];
            $inventory->description = $data['description'];
            $inventory->delivered_date = $data['delivered_date'] ?? Carbon::now();
            $inventory->attachment = $data['attachment'];
            $inventory->fill($data);
            $inventory->save();
            return $inventory->id;
        } catch (\Exception $e) {
            return null;
        }
    }
}
