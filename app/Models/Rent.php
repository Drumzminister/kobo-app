<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public $incrementing = false;
    protected $fillable = ['amount', 'start', 'end', 'property_details', 'other_costs', 'comment'];
}
