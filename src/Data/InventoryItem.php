<?php
namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Inventory;

class InventoryItem extends Model
{
    protected $fillable = ['inventory_id', 'name', 'quantity', 'description', 'purchase_price', 'sales_price', 'id', 'user_id', 'company_id'];

    public $incrementing = false;

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function saleItems()
    {
    	return $this->hasMany(SaleItem::class);
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
