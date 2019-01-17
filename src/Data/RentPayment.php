<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class RentPayment extends Model
{
    protected $fillable = ['id', 'rent_id', 'amount', 'current_period'];
}
