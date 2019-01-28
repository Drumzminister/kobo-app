<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Banking\Jobs\GetCashJob;
use App\Domains\Banking\Jobs\ListPaymentMethodsJob;
use Koboaccountant\Http\Resources\RentResource;
use Lucid\Foundation\Job;
use Koboaccountant\Helpers\RentHelper as Helper;

class GetRentPageDataJob extends Job
{
    private $rent, $companyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
        $this->rent = new RentRepository();
    }

    /**
     * Execute the job.
     *
     * @return array
     * @throws \Exception
     */
    public function handle()
    {
        $data['total'] = $this->rent->all()->sum('amount');
        $data['total_used_rent'] = Helper::getTotalUsedRent();
        $data['rents'] = RentResource::collection($this->rent->getByCompany_id($this->companyId));
        $data['banks'] = $banks = (new GetBankAccountsJob($this->companyId))->handle();

        return $data;
    }
}
