<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role'];

    protected $table = 'user_roles';

    public $incrementing = false;
    
    public function users()
    {
        return $this->hasMany('Koboaccountant\Models\User');
    }

	public function user()
	{
		return $this->belongsTo('Koboaccountant\Models\User');
	}
}
