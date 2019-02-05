<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Bank;

class SupportedBankRepository extends Repository
{
	public function __construct(Bank $model)
	{
		parent::__construct($model);
	}
}