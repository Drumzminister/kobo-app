<?php

namespace App\Data\VObject;


use Koboaccountant\Models\Sale;

class SaleTransaction
{
	/**
	 * @var Sale
	 */
	private $sale;

	public function __construct($sale)
	{
		$this->sale = $sale;
	}

	public function getSaleTransactionData()
	{
		return [
			'sale_id' => $this->sale->id,
			'description' => '',
			'amount' => $this->sale->amount,
		];
	}
}