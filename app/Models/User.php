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

    public function roles()
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

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    public function customer()
    {
        return $this->hasMany('Koboaccountant\Models\Customer');
    }

    public function expenses()
    {
        return $this->hasMany('Koboaccountant\Models\Expense', 'user_id');
    }
}
