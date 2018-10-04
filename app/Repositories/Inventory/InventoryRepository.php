<?php 
namespace Koboaccountant\Repositories\Inventory;

use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Account;
use Koboaccountant\Models\Vendor;
use Koboaccountant\Repositories\BaseRepository;

class InventoryRepository extends BaseRepository 
{
    public function __construct(
        PaymentMethod $paymentMethod,
        Accountant $account,
        Vendor $vendor) 
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
        $inventory->name = isset($data['name']) ? $data['name'] : null;
        $inventory->purchase_price = isset($data['purchase_price']) ? $data['purchase_price'] : null;
        $inventory->sales_price = isset($data['sales_price']) ? $data['sales_price'] : null;
        $inventory->quantity = isset($date['quantity']) ? $date['quantity'] : null;
        $inventory->date = isset($data['date']) ? $data['date'] : null;
        $inventory->description = isset($date['description']) ? $data['description'] : null;
        $inventory->attachment = isset($date['attachment']) ? $data['attachment'] : null;

        $inventory->save();
        return true;
    }

    public function delete($data)
    {
        $inventory = Inventory::where('id', $data['inventory_id'])->first();
        $inventory->delete();
    }
}