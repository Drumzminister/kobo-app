<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Sale;

class SaleRepository extends Repository
{
	public function __construct(Sale $model)
	{
		parent::__construct($model);
	}

	public function getCompanyDaySale($companyId)
	{
		return $this->model->where('company_id', $companyId)->daySale()->orderBy('created_at', 'desc')->get();
	}

	public function getCompanyWeekSale($companyId)
	{
		return $this->model->where('company_id', $companyId)->weekSale()->orderBy('created_at', 'desc')->get();
	}

	public function getCompanyMonthSale($companyId)
	{
		return $this->model->where('company_id', $companyId)->monthSale()->orderBy('created_at', 'desc')->get();
	}

	public function getCompanyYearSale($companyId)
	{
		return $this->model->where('company_id', $companyId)->yearSale()->orderBy('created_at', 'desc')->get();
	}

	public function getFirstSale($companyId)
	{
		return $this->model->where('company_id', $companyId)->orderBy('created_at', 'asc')->first();
	}
}