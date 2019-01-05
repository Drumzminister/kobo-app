<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'name', 
        'sales_price', 
        'purchase_price', 
        'quantity', 
        'description',
        'delivered_data',
        'attachment'
    ];

    use SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo('Koboaccountant\Models\Vendor');
    }
}
