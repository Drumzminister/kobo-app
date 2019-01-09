<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/9/2019
 * Time: 1:06 PM
 */

namespace App\Data\Repositories;


use App\Data\LoanSource;

class LoanSourceRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new LoanSource());
    }
}
