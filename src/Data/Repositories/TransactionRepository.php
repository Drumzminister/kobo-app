<?php

namespace App\Data\Repositories;


use App\Contracts\TransactionInterface;
use App\Data\Transaction;

abstract class TransactionRepository extends Repository implements TransactionInterface
{
	public function __construct(Transaction $model) {
		parent::__construct($model);
	}
}