<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleItemRepository;
use App\Data\Repositories\SaleRepository;
use App\Data\Repositories\UserRepository;
use Lucid\Foundation\Job;

class AddSaleJob extends Job
{

	/**
	 * @var \Illuminate\Foundation\Application|UserRepository
	 */
	private $userRepository;

	/**
	 * @var \Illuminate\Foundation\Application|SaleItemRepository
	 */
	private $items;
	private $data;

	/**
	 * @var
	 */
	private $user;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param $data
	 * @param $user
	 */
    public function __construct($data, $user)
    {
        $this->user = $user;
	    $this->data           = $data;
	    $this->userRepository = app(UserRepository::class);
	    $this->items          = app(SaleItemRepository::class);
	    $this->sale           = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $this->data['company_id'] = $this->userRepository->comapany->id;
        $this->data['staff_id'] = $this->userRepository->staff->id;
    }
}
