<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/10/2018
 * Time: 2:57 PM
 */

namespace Koboaccountant\Traits;


trait Loan
{
    public function sumAllRunning()
    {
        $loans = $this->loan_repo->getAllRunning();
        return $loans->sum('amount');
    }

    public function sumAllOwing()
    {
        return $this->sumAllRunning() - $this->sumAllPaid();
    }

    public function sumAllPaid()
    {
        $loans = $this->loan_repo->getAllPaid();
        return $loans->sum('amount_paid');
    }
}