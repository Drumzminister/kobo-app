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
}
