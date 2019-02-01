<?php

namespace App\Data;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Company;

class BankDetail extends Model
{
	use Cachable;

    public $incrementing = false;

    protected $fillable = [
    	'id', 'account_name', 'account_number', 'bank_name', 'user_id', 'account_balance'
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
