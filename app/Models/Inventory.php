<?php

namespace Koboaccountant\Models;

use App\Data\InventoryItem;
use App\Data\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    public $incrementing = false;

    use SoftDeletes;

    protected $fillable = [
        'id',
        'company_id',
        'vendor_id',
        'user_id',
        'invoice_number',
        'delivered_date',
        'attachment',
        'delivery_cost',
        'tax_id',
        'tax_amount',
        'amount_paid',
        'balance',
        'total_sales_price',
        'total_cost_price',
        'total_quantity'
    ];

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
