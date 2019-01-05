<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    public $incrementing = false;

    protected $fillable = [
    	'id', 'account_name', 'account_number', 'bank_name', 'user_id', 'account_balance'
    ];

    public function owner()
    {
    	return $this->belongsTo('Koboaccountant\Models\User');
    }
}
