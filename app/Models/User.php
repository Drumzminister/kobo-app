<?php

namespace Koboaccountant\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use Uuids;
    use Notifiable;

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email_token', 'name', 'email', 'password', 'first_name', 'last_name', 'attachment',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = [
    	'company',
    ];

    public function role()
    {
        return $this->hasOne('Koboaccountant\Models\Role');
    }

    public function verifyUser()
    {
        return $this->hasOne('Koboaccountant\Models\VerifyUser');
    }

    public function company()
    {
        return $this->hasOne('Koboaccountant\Models\Company');
    }

    public function getFullNameAttribute ()
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    public function customers()
    {
        return $this->hasMany('Koboaccountant\Models\Customer');
    }

	public function accountant()
	{
		return $this->hasOne('Koboaccountant\Models\Accountant');
	}

	public function client()
	{
		return $this->hasOne('Koboaccountant\Models\Client');
	}

	public function staff()
	{
		return $this->hasOne(Staff::class);
	}

    public function expenses()

    {
        return $this->hasMany('Koboaccountant\Models\Expense', 'user_id');
    }

    public function cash()
    {
        return $this->hasOne('Koboaccountant\Models\Cash', 'user_id');
    }

    public function rent()
    {
        return $this->hasMany('Koboaccountant\Models\Rent', 'user_id');
    }

    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }

    public function getUserCompany()
    {
    	return $this->company;
    }
}
