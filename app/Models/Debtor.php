<?php

namespace Koboaccountant\Models;

use Illuminate\Database\Eloquent\Model;

class Debtor extends Model
{
    protected $fillable = [
        'company_id', 'amount', 'customer_id', 'source', 'source_id'
    ];

    /**
     * @var array
     */
    protected $with = ['customer'];

    public $incrementing = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'source_id', 'id');
    }
}
