<?php

namespace App\Data\Repositories;

use App\Data\Budget;

class BudgetRepository extends Repository
{
	public function __construct(Budget $model)
	{
		parent::__construct($model);
	}
}