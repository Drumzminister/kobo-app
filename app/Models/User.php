<?php

namespace Koboaccountant\Models;

use Koboaccountant\Repositories\BaseRepository;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'id', 'email_token', 'name', 'email', 'password', 'first_name', 'last_name', 'attachment'
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

    //First Time Login action
    public function firstTimeLogin() 
    {
        $first_time_login = false;
        if ($this->first_time_login) {
            $first_time_login = true;
            Auth::user()->first_time_login = 1; // Flip the flag to true
            Auth::user()->save(); // By that you tell it to save the new flag value into the users table
        }
    }
    
}
