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
    	'id',
        'sales_date',
        'name',
        'quantity',
        'amount',
	    'delivery_cost',
	    'invoice_number',
	    'staff_id',
	    'company_id',
	    'total_amount',
	    'customer_id',
	    'sale_channel_id',
	    'tex_id',
	    'discount',
	    'type',
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
}
