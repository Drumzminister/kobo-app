<?php

namespace App\Domains\Banking\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\CashRepository;
use Lucid\Foundation\Job;

class CreditAccountJob extends Job
{
    /*
     * @var \Illuminate\Foundation\Application|BankDetailRepository
     */
    private $bankRepo;

    private $cash;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     * @param $bank
     * @param $amount
     */
    public function __construct($companyId, $bank, $amount)
    {
        $this->companyId = $companyId;
        $this->bank = json_decode($bank, true);
        $this->amount = $amount;
        $this->bankRepo = app(BankDetailRepository::class);
        $this->cash = new CashRepository();
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        if (strtolower($this->bank['account_name']) === 'cash') {
            $cash = $this->cash->find($this->bank['id']);
            $cash->amount += floatval($this->amount);
            $cash->save();
            return true;
        } else {
            $bank = $this->bankRepo->find($this->bank['id']);
            $bank->account_balance += $this->amount;
            $bank->save();
            return true;
        }
    }
}
