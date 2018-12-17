<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'phone', 'email', 'website'];

    protected $dates = ['deleted_at'];

    public $incrementing = false;
    
    public function inventories()
    {
        return $this->hasMany('Koboaccountant\Models\Inventory');
    }

    public function user()
    {
        return $this->belongsTo('Koboaccountant\Models\User');
    }
}
