<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'loan_id', 'amount', 'balance'];
}
