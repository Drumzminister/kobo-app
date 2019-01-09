<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Sale;

class Tax extends Model
{
	protected $fillable = [
		'name', 'percentage', 'type',
	];

    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }
}
