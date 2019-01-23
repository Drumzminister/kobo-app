<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/14/2019
 * Time: 7:43 AM
 */

namespace App\Data\Repositories;

use Koboaccountant\Models\LoanPayment;
class LoanPaymentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new LoanPayment());
    }
}
