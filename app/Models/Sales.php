<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public $incrementing = false;

    public function company()
    {
    	return $this->belongsTo('Koboaccountant\Models\Company');
    }
    public function inventory()
    {
    	return $this->hasOne('Koboaccountant\Models\Inventory');
    }

    public function staff()
    {
        return $this->belongsTo('Koboaccountant\Models\Staff');
    }
}