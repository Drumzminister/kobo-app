<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
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
		return $this->belongsTo(Sale::class);
	}

	public function expense()
	{
	}

	public function purchase()
	{
	}

	public function inventory()
	{
	}
}
