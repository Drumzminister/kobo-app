<?php

namespace App\Contracts;


interface TransactionInterface
{
	public function saveTransaction(array $data);
}
