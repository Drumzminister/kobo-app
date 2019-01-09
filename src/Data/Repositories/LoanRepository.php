<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/9/2019
 * Time: 1:06 PM
 */

namespace App\Data\Repositories;



use App\Data\Loan;

class LoanRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Loan());
    }
}
