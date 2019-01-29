<?php
namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Inventory;

class InventoryItem extends Model
{
    protected $fillable = ['inventory_id', 'name', 'quantity', 'description', 'purchase_price', 'sales_price'];

    public $incrementing = false;

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function saleItems()
    {
    	return $this->hasMany(SaleItem::class);
    }
}
