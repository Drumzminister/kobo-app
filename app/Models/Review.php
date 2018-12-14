<?php

namespace Koboaccountant\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    
    protected $dates = ['deleted_at'];

    public function client()
    {
    	return $this->hasOne('Koboaccountant\Models\Client');
    }

	public function accountant()
	{
		return $this->hasOne('Koboaccountant\Models\Accountant');
	}
}
