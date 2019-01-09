<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Sale;

class SaleRepository extends Repository
{
	public function __construct(Sale $model)
	{
		parent::__construct($model);
	}
}