<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\TransactionRepository;
use App\Data\Transaction;
use Illuminate\Support\Str;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class UpdateBankDetailJob extends Job
{
	use HelpsResponse;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;

	/**
	 * @var array
	 */
	private $data;

    /**
     * @var \Illuminate\Foundation\Application|Transaction
     */
    private $transaction;

    /**
	 * Create a new job instance.
	 *
	 * @param $data array
	 */
	public function __construct(array $data)
	{
		$this->data = $data;
		$this->bankDetail = app(BankDetailRepository::class);
		$this->transaction = app(Transaction::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
	    $bankDetail = $this->bankDetail->find($this->data['id']);

        $this->updateTransactionsHistory($bankDetail);

        $done      = $bankDetail->fill($this->data)->save();
        if ($done) {
			return $this->createJobResponse('success', 'Bank detail updated successfully.', null);
		}

		return $this->createJobResponse('error', 'Unable to update bank detail.', null);
	}

	protected function updateTransactionsHistory($bankDetail)
    {
        if ($bankDetail->account_balance !== $this->data['account_balance']) {
            $type = $bankDetail->account_balance < $this->data['account_balance'] ? 'credit' : 'debit';
            $amount = abs($bankDetail->account_balance - $this->data['account_balance']);
            $data = [
                'id'                => Str::uuid(),
                'amount'            => $amount,
                'type'              => $type,
                'bank_detail_id'    => $bankDetail->id,
                'company_id'        => $bankDetail->company->id,
                'kobo_id'           => explode('-', Str::uuid())[0],
            ];

            $this->transaction->create($data);
        }
    }
}
