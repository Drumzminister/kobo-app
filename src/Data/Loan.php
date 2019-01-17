<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'company_id',
        'description',
        'loan_source_id',
        'amount',
        'amount_paid',
        'interest',
        'period',
        'term',
        'payment_interval',
        'start_date'
    ];
    public $incrementing = false;

    public function source()
    {
        return $this->hasOne(LoanSource::class, 'loan_source_id');
    }

    public function payments()
    {
        return $this->hasMany('Koboaccountant\Models\LoanPayment', 'loan_id');
    }
}
