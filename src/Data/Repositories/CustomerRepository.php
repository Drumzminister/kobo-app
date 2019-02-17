<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Customer;

class CustomerRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Customer());
    }
    public function latest($companyId)
    {
        return $this->model->where('company_id', $companyId)->latest()->take(10)->get();
    }
    public function update(array $data, $customer) {
        $customer = $this->find($customer);
        $customer->update($data);
        return $customer;
    }
}
