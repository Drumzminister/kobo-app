<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role'];

    public function users()
    {
        return $this->hasMany('Koboaccountant\Models\User');
    }
}
