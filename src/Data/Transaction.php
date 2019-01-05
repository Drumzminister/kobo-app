<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Expense;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Sale;

class Transaction extends Model
{
	public $incrementing = false;

	protected $fillable = [
		'id', 'kobo_id', 'sale', 'expense_id', 'purchase_id', 'inventory_id',
		'transaction_category_id', 'note', 'isProcessed'
	];

	public function sale()
	{
		return $this->belongsTo(Sale::class, 'sale_id');
	}

	public function expense()
	{
		return $this->belongsTo(Expense::class, 'expense_id');
	}

	public function purchase()
	{
		return $this->belongsTo(Purchase::class, 'purchase_id');
	}

	public function inventory()
	{
		return $this->belongsTo(Inventory::class, 'inventory_id');
	}
}
