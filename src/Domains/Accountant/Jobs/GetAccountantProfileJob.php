<?php

namespace App\Domains\Accountant\Jobs;

use Lucid\Foundation\Job;
use App\Data\Repositories\AccountantRepository;

class GetAccountantProfileJob extends Job
{
    private $accountantId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($accountantId)
    {
        $this->accountant = app()->make(AccountantRepository::class);
        $this->accountantId = $accountantId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->accountant->find($this->accountantId);
    }
}
