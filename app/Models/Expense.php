<?php

namespace Koboaccountant\Models;

use App\Data\Transaction;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $incrementing = false;

	public function transaction()
	{
		return $this->hasOne(Transaction::class);
	}
}
