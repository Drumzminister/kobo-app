<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\SaleChannel;

class SaleChannelRepository extends Repository
{
	public function __construct(SaleChannel $model)
	{
		parent::__construct($model);
	}
}