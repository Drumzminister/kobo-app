<?php

namespace Koboaccountant\Models;

use App\Data\SaleItem;
use App\Data\Tax;
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
	    'tax_id',
	    'discount',
	    'type',
	    'balance',
    ];

    protected $with = [
    	'saleItems', 'customer', 'tax', 'transactions'
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

    public function tax()
    {
    	return $this->belongsTo(Tax::class);
    }

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }

    public function scopeDaySale($query)
    {
	    return $query->whereBetween('created_at', [now()->subDay(), now()]);
    }

	public function scopeWeekSale($query)
	{
		return $query->whereBetween('created_at', [now()->subWeek(), now()]);
	}

	public function scopeMonthSale($query)
	{
		return $query->whereBetween('created_at', [now()->subMonth(), now()]);
	}

	public function scopeYearSale($query)
	{
		return $query->whereBetween('created_at', [now()->subYear(), now()]);
	}
}
