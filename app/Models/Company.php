<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $incrementing = false;
    
    protected $fillable = [ 'id', 'name', 'user_id'];

}
