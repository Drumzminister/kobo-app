<?php

namespace App\Domains\Vat\Jobs;

use App\Data\Repositories\TaxRepository;
use Lucid\Foundation\Job;

class GetVatsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return app(TaxRepository::class)->all();
    }
}
