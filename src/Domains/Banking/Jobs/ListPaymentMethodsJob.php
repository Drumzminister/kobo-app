<?php

namespace App\Domains\Banking\Jobs;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use Illuminate\Support\Collection;
use Lucid\Foundation\Job;

class ListPaymentMethodsJob extends Job
{
    private $companyId;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return Collection
     * @throws \Exception
     */
    public function handle()
    {
        $modes = [
            [
                'mode'      => 'Cash',
                'account_name'  =>  '',
                'balance'    =>  (new GetCashJob($this->companyId))->handle()->amount
            ]
        ];
        $banks = (new GetBankAccountsJob($this->companyId))->handle();

        foreach ($banks as $bank) {
            $mode = [
                'mode'          =>  $bank->bank_name,
                'account_name'  =>  $bank->account_name,
                'balance'       =>  floatval($bank->account_balance),
            ];
            array_push($modes, $mode);
        }

        return collect($modes);
    }
}
