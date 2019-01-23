<?php

namespace App\Domains\Banking\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\CashRepository;
use Lucid\Foundation\Job;

class DebitAccountJob extends Job
{
    private $bank, $cash;
    /**
     * Create a new job instance.
     *
     * @param array $paymentMode
     */
    public function __construct(array $paymentMode, $companyId)
    {
        $this->companyId = $companyId;
        $this->bank = app(BankDetailRepository::class);
        $this->cash = new CashRepository();
        $this->mode = $paymentMode;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        if (strtolower($this->mode['name']) !== 'cash' ) {
            $bank = $this->bank->find($this->mode['id']);
            if ($bank->account_balance < $this->mode['amount']) {
                throw new \Exception("Insufficient fund in $bank->bank_name ($bank->account_name)" );
            } else {
                $bank->account_balance -= floatval($this->mode['amount']);
                $bank->save();
            }
        } else {
            $cash = $this->cash->findBy('company_id', $this->companyId);
            if ($cash->amount < $this->mode['amount']) {
                throw new \Exception("Insufficient fund in Cash" );
            } else {
                $cash->amount -= floatval($this->mode['amount']);
                $cash->save();
            }
        }
    }
}
