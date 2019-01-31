<?php
namespace App\Data;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Inventory;

class InventoryItem extends Model
{
    use Cachable;
    protected $fillable = ['inventory_id', 'company_id', 'user_id', 'name', 'quantity', 'description', 'cost_price', 'sales_price'];

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
