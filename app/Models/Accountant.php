<?php

namespace Koboaccountant\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Accountant extends Authenticatable
{
    public $incrementing = false;
    
    use Notifiable;

    /**
     *
     * @var boolean
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'password', 'first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function verifyUser()
    {
        return $this->hasOne('Koboaccountant\Models\VerifyUser', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('Koboaccountant\Models\Client');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany('Koboaccountant\Models\Review');
    }

    public function rating()
    {
        return $this->reviews->avg('rating');
    }
}
