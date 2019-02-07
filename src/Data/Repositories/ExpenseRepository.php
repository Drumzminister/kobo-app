<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/13/2019
 * Time: 1:29 PM
 */

namespace App\Data\Repositories;


use Koboaccountant\Models\Expense;

class ExpenseRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Expense());
    }

    public function getLatest($companyId)
    {
        return Expense::where('company_id', $companyId)->latest()->take(5)->get();
    }
}
