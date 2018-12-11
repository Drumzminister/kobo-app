<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class LoanSource extends Model
{
    public $incrementing = false;
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo('Koboaccountant\Models\User', 'user_id');
    }
}
