<?php

namespace Koboaccountant\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleChannel extends Model
{
    use SoftDeletes, Cachable;
    
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }
}
