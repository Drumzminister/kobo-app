<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Sale;

class SaleItem extends Model
{
	protected $fillable = ['sale_id', 'inventory_id'];

	public function sale()
	{
		return $this->belongsTo(Sale::class);
	}

	public function inventory()
	{
		return $this->belongsTo(Inventory::class);
	}
}
