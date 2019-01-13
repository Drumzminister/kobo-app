<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Customer;

class CustomerRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Customer());
    }
}
