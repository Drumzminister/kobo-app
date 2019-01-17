<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\SaleRepository;
use Lucid\Foundation\Job;

class CreateSaleDraftJob extends Job
{
	private $user;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param $user
	 */
    public function __construct($user)
    {
	    $this->user = $user;
	    $this->sale = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$data['staff_id'] = $this->user->staff->id;
    	$data['company_id'] = $this->user->company->id;
    	$data['invoice_number'] = explode('-', $this->sale->generateUuid()->toString())[0];

    	return $this->sale->fillAndSave($data);
    }
}
