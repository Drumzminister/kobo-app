<?php

namespace Koboaccountant\Models;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $incrementing = false;
    
    public function loanHistory()
    {
        return $this->HasMany('Koboaccountant\Models\LoanTransaction')->orderBy('created_at');
    }

    public function getBalanceAttribute()
    {
        return $this->loanHistory->sum('amount');
    }
}
