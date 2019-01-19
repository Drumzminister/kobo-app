<?php

namespace Koboaccountant\Models;

use App\Data\Transaction;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id', 'user_id', 'company_id', 'date', 'details', 'amount', 'classification'
    ];

	public function transaction()
	{
		return $this->hasOne(Transaction::class);
	}
}
