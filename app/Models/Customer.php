<?php

namespace Koboaccountant\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes, Cachable;

    protected $fillable = ['id', 'user_id', 'first_name', 'last_name', 'company_id', 'email', 'address', 'phone', 'website', 'isActive', 'image'];
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
