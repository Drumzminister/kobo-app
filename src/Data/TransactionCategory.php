<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
