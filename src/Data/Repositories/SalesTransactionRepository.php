<?php

namespace App\Data\Repositories;

class SalesTransactionRepository extends TransactionRepository
{
	public function saveTransaction(array $data, $sale)
	{
		$data['sale_id'] = $sale->id;
		$data['kobo_id'] = explode('-', $this->generateUuid())[0];

		return $this->fillAndSave($data);
	}
}