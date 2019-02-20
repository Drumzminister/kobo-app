<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    protected $casts = ['isActive' => 'boolean'];
    protected $fillable = ['id', 'company_id', 'user_id', 'name', 'image', 'address', 'phone', 'email', 'website', 'isActive'];

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
