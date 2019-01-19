<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\SaleItemRepository;
use App\Data\Repositories\SaleRepository;
use App\Data\Repositories\UserRepository;
use Lucid\Foundation\Job;
use SalesTransactionRepository;

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
	    $this->saleTransaction  = app( SalesTransactionRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$sale = $this->sale->findOnly('id', $this->data['sale_id']);
	    $this->data['company_id'] = $this->user->company->id;
	    $this->data['staff_id'] = $this->user->staff->id;

	    $paymentMethods = $this->data['paymentMethods'];

	    foreach ($paymentMethods as $method) {
	    	$bank = $this->bank->findOnly('id', $method['id']);
	    	$newBalance = $bank->account_balance + $method['amount'];
	    	$data['account_balance'] = $newBalance;

	    	$bank->fill($data)->save();
	    }

	    dd($paymentMethods);

	    // ToDo: Record transaction

	    $updated = $sale->fill($this->data)->save();


    }
}
