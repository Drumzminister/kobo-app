<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Creditor;

class CreditorRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct(new Creditor());
    }
}
