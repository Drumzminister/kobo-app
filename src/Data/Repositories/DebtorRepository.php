<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Debtor;

class DebtorRepository extends Repository
{
    public function __construct(Debtor $model)
    {
        parent::__construct($model);
    }
}
