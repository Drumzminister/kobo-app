<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Review;

class ReviewRepository extends Repository
{
	public function __construct(Review $model)
	{
		parent::__construct($model);
	}
}