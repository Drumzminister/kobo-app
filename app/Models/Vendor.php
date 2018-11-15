<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function inventory()
    {
        return $this->hasMany('Koboaccountant\Models\Inventory');
    }
}
