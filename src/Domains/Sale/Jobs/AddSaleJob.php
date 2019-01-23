<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\SaleItemRepository;
use App\Data\Repositories\SaleRepository;
use App\Data\Repositories\UserRepository;
use App\Domains\Banks\Jobs\CreditBanksJob;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;
use SalesTransactionRepository;

class AddSaleJob extends Job
{
	use HelpsResponse;

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
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bank;

	/**
	 * @var \Illuminate\Foundation\Application|SalesTransactionRepository
	 */
	private $saleTransaction;

	/**
	 * Create a new job instance.
	 *
	 * @param $data
	 * @param $user
	 */
    public function __construct($data, $user)
    {
        $this->user             = $user;
	    $this->data             = $data;
	    $this->userRepository   = app(UserRepository::class);
	    $this->items            = app(SaleItemRepository::class);
	    $this->sale             = app(SaleRepository::class);
	    $this->bank             = app(BankDetailRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$sale = $this->sale->findOnly('id', $this->data['sale_id']);

    	if ($sale->type === "published") {
		    return $this->createJobResponse('error', 'Sale has already been published and cannot be updated', $sale);
	    }

	    $this->data['company_id'] = $this->user->company->id;
	    $this->data['staff_id'] = $this->user->staff->id;
	    $this->data['type'] = 'published';

	    $paymentMethods = $this->data['paymentMethods'];

	    $response = $this->creditPaymentMethodsForSale($paymentMethods, $sale);

	    if ($response->status === "success") {
		    $updated = $sale->fill($this->data)->save();

		    return $updated ? $this->createJobResponse('success', 'Sale Completed', $sale)
			                : $this->createJobResponse('error', 'Sale could not be completed', $sale);
	    }

	    return $this->createJobResponse('error', $response->message, $sale);
    }

    protected function creditPaymentMethodsForSale($paymentMethods, $sale)
    {
    	return (new CreditBanksJob($paymentMethods, $sale, $this->user->company->id))->handle();
    }
}
