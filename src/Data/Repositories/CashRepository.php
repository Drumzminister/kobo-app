<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/10/2019
 * Time: 3:04 PM
 */

namespace App\Data\Repositories;



use App\Data\Cash;

class CashRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Cash());
    }
}
