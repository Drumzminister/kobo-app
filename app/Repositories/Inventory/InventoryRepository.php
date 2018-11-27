<?php 

namespace Koboaccountant\Repositories\Inventory;

use Koboaccountant\Models\Vendor;
use Koboaccountant\Models\Accountant;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\PaymentMethod;
use Koboaccountant\Repositories\BaseRepository;


class InventoryRepository extends BaseRepository 
{
    public function __construct(
        PaymentMethod $paymentMethod,
        Accountant $account,
        Vendor $vendor,
        Inventory $inventory) 
    {
        $this->inventoryModel = $inventory;
        $this->accountantModel = $account;
        $this->vendorModel = $vendor;
    }

    public function getInventory()
    {
        return $this->inventoryModel->get();
    }

    public function create($data)
    {
        $inventory= new Inventory;
        $inventory->id = $this->generateUuid();
        $inventory->name = $date['name'];
        $inventory->purchase_price = $data['purchase_price'];
        $inventory->sales_price = $data['sales_price'];
        $inventory->quantity = $data['quantity'];
        $inventory->date = $data['date'];
        $inventory->description = $data['description'];
        $inventory->attachment = $data['attachment'];
        $inventory->account_id = $account->id;
        $inventory->vendor_id = $vendor->id;

        $inventory->save();
        return true;
    }

    public function update($data)
    {
        $inventory = Inventory::where('id', $data['inventory_id'])->first();
        $inventory->name = isset($data['name']) ?: null;
        $inventory->purchase_price = isset($data['purchase_price']) ?: null;
        $inventory->sales_price = isset($data['sales_price']) ?: null;
        $inventory->quantity = isset($date['quantity']) ?: null;
        $inventory->date = isset($data['date']) ?: null;
        $inventory->description = isset($date['description']) ?: null;
        $inventory->attachment = isset($date['attachment']) ?: null;

        $inventory->save();
        return true;
    }

    public function findInventory($id)
    {
        return Inventory::find($id);
    }

    public function checkAvailability($id, $amount)
    {
        $inventory = $this->findInventory($id);
        if (! ($inventory === null)) {
            return false;
        }
        if ($inventory->quantity >= $amount) {
            return true;
        }

        return false;
    }

    public function delete($data)
    {
        $inventory = Inventory::where('id', $data['inventory_id'])->first();
        $inventory->delete();
    }

    public function reduceQuantity($id, Int $quantity)
    {
        $inventory = $this->findInventory($id);
        if ($inventory && $this->checkAvailability($id, $quantity)) {
            $inventory->quantity -= $quantity;
            $inventory->save();
            return true;
        }
        return false;
    }
}