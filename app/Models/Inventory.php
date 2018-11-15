<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inventory extends Model
{
    use SoftDeletes;

    public function vendor()
    {
        return $this->belongsTo('Koboaccountant\Models\Vendor');
    }
}
