<?php

namespace App\Domains\Banks\Jobs;

use App\Contracts\TransactionInterface;
use App\Data\Repositories\BankDetailRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;
use ReflectionClass;
use ReflectionException;

class CreditBanksJob extends Job
{
	use HelpsResponse;

	const TRANSACTION_NAMESPACE = 'App\\Data\\Repositories\\';

	const CLASS_SUFFIX = 'TransactionRepository';

    const TRANSACTION_TYPE = 'credit';
	/**
	 * @var array
	 */
	private $paymentModes;

	/**
	 * @var $model
	 */
	private $model;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bank;
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * Create a new job instance.
	 *
	 * @param array  $paymentModes
	 * @param        $model
	 * @param string $companyId
	 */
    public function __construct(array $paymentModes, $model, string $companyId)
    {
	    $this->paymentModes = $paymentModes;
	    $this->model = $model;
	    $this->bank = app(BankDetailRepository::class);
	    $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

	    if (!class_exists($this->getTransactionClass())) {
		    return $this->createJobResponse('error', 'Transaction data cannot be created for ' . ucfirst($this->getModelClassName()), $this->model);
	    }

	    foreach ($this->paymentModes as $paymentMode) {
		    $this->updateBankAccount($paymentMode);
		    $this->updateTransactionHistory($paymentMode);
	    }

	    return $this->createJobResponse('success', 'Banks Credited Successfully.', $this->model);
    }

    protected function updateBankAccount($paymentMode)
    {
	    $bank = $this->bank->findOnly('id', $paymentMode['id']);
	    $newBalance = $bank->account_balance + $paymentMode['amount'];
	    $data['account_balance'] = $newBalance;

	    $bank->fill($data)->save();
    }

    protected function updateTransactionHistory($paymentMode)
    {
	    /**
	     * @var $transactionObj TransactionInterface
	     */
	    $transactionObj = app($this->getTransactionClass());
	    $transactionData = [];

	    $transactionData = array_merge($transactionData, [
		    'bank_detail_id' => $paymentMode['id'],
		    'amount'        => $paymentMode['amount'],
		    'type'          => self::TRANSACTION_TYPE,
		    'company_id'    => $this->companyId,
	    ]);

	    $transactionObj->saveTransaction($transactionData, $this->model);
    }

    protected function getTransactionClass()
    {
	    return $class = self::TRANSACTION_NAMESPACE . ucfirst(str_plural($this->getModelClassName())) . self::CLASS_SUFFIX;
    }

    protected function getModelClassName()
    {
    	try {
		    $obj = new ReflectionClass($this->model);

		    return $obj->getShortName();
	    } catch (ReflectionException $e) {
    		return false;
	    }
    }
}
