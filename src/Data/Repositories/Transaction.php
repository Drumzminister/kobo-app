<?php

namespace App\Data\Repositories;


use App\Data\Transaction as TransactionModel;

class Transaction extends Repository
{
    public function __construct(TransactionModel $model) {
        parent::__construct($model);
    }
}
