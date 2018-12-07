<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningCreditor extends Model
{
    public $incrementing = false;
    protected $fillable = ['vendor', 'details', 'amount'];
    protected  $guarded = ['id', 'user_id', 'date'];
}
