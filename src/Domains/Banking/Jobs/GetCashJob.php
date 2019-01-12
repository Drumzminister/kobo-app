<?php

namespace App\Domains\Banking\Jobs;

use App\Data\Repositories\CashRepository;
use Lucid\Foundation\Job;

class GetCashJob extends Job
{
    private $cash, $companyId;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     */
    public function __construct($companyId)
    {
        $this->cash = new CashRepository();
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return float
     * @throws \Exception
     */
    public function handle()
    {
        $cash = $this->cash->findOnly('company_id', $this->companyId );
        if (is_null($cash)) {
            $cash = (new CreateCashAccountJob($this->companyId, 0))->handle();
        }
        return $cash->amount;
    }
}
