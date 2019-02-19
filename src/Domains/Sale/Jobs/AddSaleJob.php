<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\CustomerRepository;
use App\Data\Repositories\SaleItemRepository;
use App\Data\Repositories\SaleRepository;
use App\Data\Repositories\UserRepository;
use App\Domains\Banks\Jobs\CreditBanksJob;
use App\Domains\Debtor\Jobs\CreateDebtorJob;
use App\Domains\Inventory\Jobs\DecrementItemInInventoryJob;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;
use SalesTransactionRepository;

class AddSaleJob extends Job
{
	use HelpsResponse;

	const UPDATE_REVERSAL = 'reversal';

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

    	if ($sale->type === "published" && !isset($this->data['updateType'])) {
		    return $this->createJobResponse('error', 'Sale has already been published and cannot be updated', $sale);
	    }

	    $this->data['company_id'] = $this->user->company->id;
	    $this->data['staff_id'] = $this->user->staff->id;
	    $this->data['type'] = 'published';

	    $paymentMethods = $this->data['paymentMethods'];

	    if (!isset($this->data['updateType'])) {
		    return $this->performNonReversalUpdate($paymentMethods, $sale);
	    } elseif ($this->data['updateType'] === self::UPDATE_REVERSAL) {
	    	return $this->performReversalUpdate($paymentMethods, $sale);
	    }
    }

    protected function creditPaymentMethodsForSale($paymentMethods, $sale)
    {
    	return (new CreditBanksJob($paymentMethods, $sale, $this->user->company->id))->handle();
    }

    protected function performNonReversalUpdate($paymentMethods, $sale)
    {
	    $response = $this->creditPaymentMethodsForSale($paymentMethods, $sale);

	    $balance = $this->data['total_amount'] - $response->data['totalPaid'];
	    $this->data['balance'] = $balance;

	    if ($balance > 0) {
	        $this->createDebtorFromCustomer($this->data['customer_id'], $balance);
        }

	    if ($response->status === "success") {
		    $updated = $sale->fill($this->data)->save();

			// Decrease Inventory Items based on Sales Items bought
		    $this->removeItemsBoughtFromInventory($sale);

		    return $updated ? $this->createJobResponse('success', 'Sale Completed', $sale)
			    : $this->createJobResponse('error', 'Sale could not be completed', $sale);
	    }

	    return $this->createJobResponse('error', $response->message, $sale);
    }

    protected function createDebtorFromCustomer(string $customerId, $balance)
    {
        return (new CreateDebtorJob($customerId, $balance))->handle();
    }

    protected function performReversalUpdate($paymentMethods, $sale)
    {
    	$paidAmount = $this->retrieveAmountPaid($paymentMethods);

    	$balance = $this->data['total_amount'] - $paidAmount;
    	$this->data['balance'] = $balance;
		if ($sale->balance !== $balance) {
			$updated = $sale->fill($this->data)->save();
		} else {
			$updated = true;
		}

		// ToDO: Update Inventory - Add Items reversed back to the inventory

	    if ($balance < 0) {
		    // Todo: I think we'll add A creditor here if balance is -ve i.e company owe customer;
	    } else {
		    // Todo: I think we'll add A debtor here if balance is +ve i.e customer owe company;
	    }

	    return $updated ? $this->createJobResponse('success', 'Sale Completed', $sale)
		    : $this->createJobResponse('error', 'Sale could not be completed', $sale);

    }

    protected function retrieveAmountPaid($paymentMethods)
    {
    	return array_sum(collect($paymentMethods)->pluck('amount')->toArray());
    }

    protected function removeItemsBoughtFromInventory($sale)
    {
    	return (new DecrementItemInInventoryJob($sale))->handle();
    }
}
