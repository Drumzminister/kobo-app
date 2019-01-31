<?php

namespace App\Data;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Koboaccountant\Models\Sale;

class Tax extends Model
{
	use Cachable;

	protected $fillable = [
		'name', 'percentage', 'type',
	];

    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }
}
