<?php

namespace App\Data;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
	use Cachable;

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
