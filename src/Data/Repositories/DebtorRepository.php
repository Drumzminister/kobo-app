<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Debtor;

class DebtorRepository extends Repository
{
    public function __construct(Debtor $model)
    {
        parent::__construct($model);
    }

    public function getPublishedSalesOrderedByDate($companyId)
    {
        return $this->model->where([
            ['company_id', '=', $companyId],
        ])->orderBy('created_at', 'desc')->paginate();
    }
}
