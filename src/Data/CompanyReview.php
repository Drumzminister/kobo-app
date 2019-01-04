<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class CompanyReview extends Model
{
	public function company()
	{
		return $this->hasOne('Koboaccountant\Models\Company');
	}
}
