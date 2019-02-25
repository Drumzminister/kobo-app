<?php

namespace Koboaccountant\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    use Cachable;

    protected $fillable = [
        'company_id', 'amount', 'customer_id', 'source', 'sale_id',
    ];

    /**
     * @var array
     */
    protected $with = ['customer', 'sale'];

    public $incrementing = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function scopeDayDebt($query)
    {
        return $query->whereBetween('created_at', [now()->subDay(), now()]);
    }

    public function scopeWeekDebt($query)
    {
        return $query->whereBetween('created_at', [now()->subWeek(), now()]);
    }

    public function scopeMonthDebt($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth(), now()]);
    }

    public function scopeYearDebt($query)
    {
        return $query->whereBetween('created_at', [now()->subYear(), now()]);
    }
}
