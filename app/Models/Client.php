<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $incrementing = false;

    public function user()
    {
    	return $this->belongsTo('Koboaccountant\Models\User');
    }

    public function reviews()
    {
    	return $this->hasMany('Koboaccountant\Models\Review');
    }
}
