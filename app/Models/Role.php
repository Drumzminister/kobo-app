<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $incrementing = false;
    
    protected $fillable = ['role'];
}
