<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    public $incrementing = false;
    protected $fillable = ['amount', 'company_id', 'opening_amount'];

    public function user ()
    {
        return $this->belongsTo('Koboaccountant\Models\User', 'user_id');
    }
}
