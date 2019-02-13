<?php

namespace App\Domains\Banks\Jobs;

use App\Contracts\TransactionInterface;
use App\Data\Repositories\BankDetailRepository;
use App\Domains\Bank\Jobs\CheckIfBanksHaveEnoughBalance;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;
use ReflectionClass;
use ReflectionException;

class DebitBanksJob extends Job
{
	use HelpsResponse;

	const TRANSACTION_NAMESPACE = '\\App\\Data\\Repositories\\';

	const CLASS_SUFFIX = 'TransactionRepository';

	const TRANSACTION_TYPE = 'debit';
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

	private $companyId;

    /**
     * Create a new job instance.
     *
     * @param array $paymentModes
     * @param       $model
     * @param string $companyId
     */
	public function __construct(array $paymentModes, $model, string $companyId)
	{
		$this->paymentModes = $paymentModes;
		$this->model = $model;
		$this->companyId = $companyId;
		$this->bank = app(BankDetailRepository::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		if (!class_exists($this->getTransactionClass())) {
			return $this->createJobResponse('error', 'Transaction data cannot be created for ' . ucfirst(get_class($this->model)), $this->model);
		}

		$response = $this->checkIfBanksHaveEnoughBalance();

		if ($response->status !== "success") {
			return $this->createJobResponse('error', $response->message, $this->model);
		}

		foreach ($this->paymentModes as $paymentMode) {
			$this->updateBankAccount($paymentMode);
			$this->updateTransactionHistory($paymentMode);
		}

		return $this->createJobResponse('success', 'Banks Debited Successfully.', $this->model);
	}

	protected function updateBankAccount($paymentMode)
	{
		$bank = $this->bank->findOnly('id', $paymentMode['id']);
		$newBalance = $bank->account_balance - $paymentMode['amount'];
		$data['account_balance'] = $newBalance;

		$bank->fill($data)->save();
	}

	protected function updateTransactionHistory($paymentMode)
	{
		/**
		 * @var $transactionObj TransactionInterface
		 */
		$transactionObj = app($this->getTransactionClass());
		$transactionData =  [
			'bank_detail_id' => $paymentMode['id'],
			'amount'        => 0,
            'type'          => self::TRANSACTION_TYPE,
            'company_id'    => $this->companyId
		];

        $transactionObj->saveTransaction($transactionData, $this->model);
    }

	protected function getTransactionClass()
	{
		return $class = self::TRANSACTION_NAMESPACE . ucfirst(str_plural($this->getModelClassName())) . self::CLASS_SUFFIX;
	}

	protected function checkIfBanksHaveEnoughBalance()
	{
		return (new CheckIfBanksHaveEnoughBalance($this->paymentModes))->handle();
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
