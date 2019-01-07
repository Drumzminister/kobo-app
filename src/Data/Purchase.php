<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	public $incrementing = false;

	public function transaction()
	{
		return $this->hasOne(Transaction::class);
	}
}
