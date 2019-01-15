<?php

namespace App\Data\Repositories;

use App\Data\SaleItem;

class SaleItemRepository extends Repository
{
	public function __construct(SaleItem $model)
	{
		parent::__construct($model);
	}
}