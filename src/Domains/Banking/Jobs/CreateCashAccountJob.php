<?php

namespace App\Domains\Banking\Jobs;

use App\Data\Repositories\CashRepository;
use Lucid\Foundation\Job;

class CreateCashAccountJob extends Job
{
    private $companyId, $cash, $amount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId, $amount)
    {
        $this->companyId = $companyId;
        $this->amount = $amount;
        $this->cash = new CashRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function handle()
    {
        $cash = $this->cash->fillAndSave([
            'amount'            =>  $this->amount,
            'company_id'        => $this->companyId,
            'opening_amount'    =>  $this->amount,
        ]);
        return $cash;
    }
}
