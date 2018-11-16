<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public function company()
    {
        return $this->belongsTo('Koboaccountant\Models\Company');
    }
}
