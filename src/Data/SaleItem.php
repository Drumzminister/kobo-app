<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Sale;

class SaleItem extends Model
{
	protected $fillable = ['sale_id', 'inventory_id', 'sale_channel_id', 'quantity', 'sales_price', 'total_price', 'description', 'type', 'reversed_item_id'];

	protected $with = [
//		'reversedItem'
	];

	public function sale()
	{
		return $this->belongsTo(Sale::class);
	}

	public function inventory()
	{
		return $this->belongsTo(Inventory::class);
	}

	public function setTotalPriceAttribute($value)
	{
		$this->attributes['total_price'] = $this->attributes['quantity'] * $this->attributes['sales_price'];
	}

	public function saleChannel()
	{
		return $this->belongsTo(SaleChannel::class);
	}

	public function reversedItem()
	{
		return $this->hasOne(SaleItem::class, 'reversed_item_id');
	}
}
