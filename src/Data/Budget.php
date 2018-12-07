<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
	public $incrementing = false;

    protected $fillable = [
    	'id', 'item', 'client_id', 'actual_amount', 'projected_amount', 'assumptions', 'expense_id'
    ];

    public function client()
    {
    	return $this->hasOne('App\Models\Client');
    }

    public function expense()
    {
    	return $this->hasOne('App\Models\Expense');
    }
}
