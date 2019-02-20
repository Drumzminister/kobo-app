<?php

namespace App\Domains\Debtor\Jobs;

use App\Data\Repositories\DebtorRepository;
use Lucid\Foundation\Job;

class GetCompanyDebtorsJob extends Job
{
    /**
     * @var string
     */
    private $companyId;

    /**
     * @var \Illuminate\Foundation\Application|DebtorRepository
     */
    private $debtors;

    /**
     * Create a new job instance.
     *
     * @param string $companyId
     */
    public function __construct(string $companyId)
    {
        $this->companyId = $companyId;
        $this->debtors = app(DebtorRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $debtors = $this->debtors->getByAttributes(['company_id' => $this->companyId]);

        return $debtors;
    }
}
