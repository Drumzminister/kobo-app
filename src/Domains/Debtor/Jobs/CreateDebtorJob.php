<?php

namespace App\Domains\Debtor\Jobs;

use App\Data\Repositories\CustomerRepository;
use App\Data\Repositories\DebtorRepository;
use Lucid\Foundation\Job;

class CreateDebtorJob extends Job
{
    /**
     * @var string
     */
    private $customerId;
    private $balance;

    /**
     * @var \Illuminate\Foundation\Application|DebtorRepository
     */
    private $debtor;

    /**
     * @var \Illuminate\Foundation\Application|CustomerRepository
     */
    private $customer;
    private $sale;

    /**
     * Create a new job instance.
     *
     * @param string $customerId
     * @param $balance
     */
    public function __construct(string $customerId, $balance, $sale)
    {
        $this->customerId = $customerId;
        $this->balance = $balance;
        $this->debtor = app(DebtorRepository::class);
        $this->customer = app(CustomerRepository::class);
        $this->sale = $sale;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $customer = $this->customer->find($this->customerId);

        $data = [
            'company_id' => $customer->company->id,
            'customer_id' => $this->customerId,
            'amount' => $this->balance,
            'sale_id' => $this->sale->id,
            'source' => 'sale'
        ];

        return $this->debtor->fillAndSave($data);
    }
}
