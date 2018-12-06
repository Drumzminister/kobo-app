<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningInventory extends Model
{
    public $incrementing = false;
    protected $fillable = ['vendor', 'details', 'quantity', 'cost_price', 'selling_price'];
    protected $guarded = ['id', 'user_id', 'date'];
}
