<?php

namespace Koboaccountant\Models;

use App\Data\InventoryItem;
use App\Data\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name', 
        'sales_price', 
        'purchase_price', 
        'quantity', 
        'description',
        'delivered_data',
        'attachment',
        'vendor_id',
        'user_id'
    ];

    use SoftDeletes;

    public function inventoryItem()
    {
        return $this->hasMany(InventoryItem::class);
    }
    public function vendor()
    {
        return $this->belongsTo('Koboaccountant\Models\Vendor');
    }
    public function quantitySum()
    {
        return $this->inventoryItem()->sum('quantity');
    }
    public function salesPriceSum()
    {
        return $this->inventoryItem()->sum('sales_price');
    }
	public function transaction()
	{
		return $this->hasOne(Transaction::class);
	}

	public function scopeAvailable($query)
	{
		return $query->where('quantity', '>', 0);
	}
}
