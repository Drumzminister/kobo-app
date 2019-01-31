<?php

namespace Koboaccountant\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	use Cachable;

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
