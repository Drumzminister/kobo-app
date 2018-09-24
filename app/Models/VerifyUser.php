<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];
 
    public function user()
    {
        return $this->belongsTo('Koboaccountant\Models\User', 'user_id');
    }
}
