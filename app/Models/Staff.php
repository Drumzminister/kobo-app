<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
	use SoftDeletes;

    public $incrementing = false;

	protected $fillable = [
		'id', 'user_id', 'company_id', 'first_name', 'last_name',
        'role', 'phone', 'email', 'years_of_experience', 'employed_date',
        'salary', 'isActive', 'avatar','comment'
	];

    protected $dates = ['deleted_at'];

    public function company()
    {
        return $this->belongsTo('Koboaccountant\Models\Company');
    }

    public function sales()
    {
        return $this->hasMany( 'Koboaccountant\Models\Sale' );
    }
}
