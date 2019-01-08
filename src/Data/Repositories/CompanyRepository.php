<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Company;

class CompanyRepository extends Repository
{
	public function __construct(Company $model)
	{
		parent::__construct($model);
	}
}