<?php

namespace Koboaccountant\Models;

use App\Data\SaleItem;
use App\Data\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sales_date',
        'name',
        'quantity',
        'amount',
	    'delivery_cost',
    ];

    protected $with = [
    	'saleItems', 'customer'
    ];

    protected $dates = ['deleted_at', 'created_at'];

    public $incrementing = false;

    public function company()
    {
        return $this->belongsTo('Koboaccountant\Models\Company');
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function staff()
    {
        return $this->belongsTo('Koboaccountant\Models\Staff');
    }

    public function customer()
    {
        return $this->belongsTo('Koboaccountant\Models\Customer');
    }

    public function transaction()
    {
    	return $this->hasOne(Transaction::class);
    }

    public function saleChannel()
    {
	    return $this->belongsTo(SaleChannel::class);
    }
}
