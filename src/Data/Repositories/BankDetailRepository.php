<?php

namespace App\Data\Repositories;

use App\Data\BankDetail;

class BankDetailRepository extends Repository
{
	public function __construct(BankDetail $model)
	{
		parent::__construct($model);
	}
}