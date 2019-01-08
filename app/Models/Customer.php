<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public function getNameAttribute()
    {
        return ucfirst($this->first_name) .' '. ucfirst($this->last_name);
    }

    public function company()
    {
        return $this->belongsTo('Koboaccountant\Models\Company');
    }

    public function user()
    {
        return $this->belongTo('Koboaccountant\Models\User');
    }

    public function sales()
    {
        return $this->hasMany( 'Koboaccountant\Models\Sale' );
    }
}
