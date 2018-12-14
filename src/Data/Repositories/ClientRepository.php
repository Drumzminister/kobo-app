<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Client;

class ClientRepository extends Repository
{
	public function __construct(Client $model)
	{
		parent::__construct($model);
	}
}