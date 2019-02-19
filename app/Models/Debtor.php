<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    protected $fillable = [
        'company_id', 'amount', 'customer_id',
    ];

    public $incrementing = false;
}
