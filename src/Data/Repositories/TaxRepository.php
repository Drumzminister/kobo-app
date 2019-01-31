<?php

namespace App\Data\Repositories;

use App\Data\Tax;

class TaxRepository extends Repository
{
	public function __construct()
	{
		parent::__construct(new Tax);
	}
}
