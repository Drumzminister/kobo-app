<?php

namespace App\Data\Repositories;


use App\Data\LoanSource;

class LoanSourceRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new LoanSource());
    }
}
