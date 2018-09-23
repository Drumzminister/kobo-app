<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // public $table = ['roles'];

    public $incrementing = false;
    
    protected $fillable = ['role'];
}
