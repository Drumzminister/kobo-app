<?php

namespace App\Data\Repositories;


use Koboaccountant\Models\User;

class UserRepository extends Repository
{
	public function __construct(User $model)
	{
		parent::__construct($model);
	}
}