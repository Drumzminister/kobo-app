<?php

namespace App\Data\Repositories;


use Koboaccountant\Models\Accountant;

class AccountantRepository extends Repository
{
	public function __construct(Accountant $model) {
		parent::__construct($model);
	}
}