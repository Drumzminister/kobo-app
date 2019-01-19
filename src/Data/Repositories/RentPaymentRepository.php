<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/14/2019
 * Time: 2:00 PM
 */

namespace App\Data\Repositories;


use App\Data\RentPayment;

class RentPaymentRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new RentPayment());
    }
}
