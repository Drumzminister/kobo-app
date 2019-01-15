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
     * @return void
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
        if ($this->bank['mode'] === 'Cash') {
            $cash = $this->cash->findBy('company_id', $this->companyId);
            $cash->amount += floatval($this->amount);
            $cash->save();
            return true;
        } else {
            $bank = $this->bankRepo->getByAttributes([
                'company_id' => $this->companyId,
                'bank_name'  => $this->bank['mode'],
                'account_name' => $this->bank['account_name'],
            ])[0];
            $bank->account_balance += $this->amount;
            $bank->save();
            return true;
        }
    }
}
