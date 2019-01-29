<?php
namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Inventory;

class InventoryItem extends Model
{
    protected $fillable = ['inventory_id', 'name', 'quantity', 'description', 'purchase_price', 'sales_price'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    public function sumQuantity()
    {
        return $this->sum('quantity');
    }
    public function totalSalePrice()
    {
        return $this->sum('sales_price');
    }
    public function sumPurchasePrice()
    {
        return $this->sum('purchase_price');
    }
}
