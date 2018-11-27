<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PaymentMethod extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $incrementing = false;
}