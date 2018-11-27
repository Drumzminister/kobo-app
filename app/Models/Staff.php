<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public function company()
    {
        return $this->belongsTo('Koboaccountant\Models\Company');
    }

    public function sales()
    {
        return $this->hasMany('Koboaccountant\Models\Sales');
    }
}
