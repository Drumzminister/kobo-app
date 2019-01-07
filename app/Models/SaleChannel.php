<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleChannel extends Model
{
    use SoftDeletes;
    
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }
}
