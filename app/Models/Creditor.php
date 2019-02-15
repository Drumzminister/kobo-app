<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'company_id', 'user_id', 'vendor_id', 'invoice_number', 'date', 'amount'];
}
