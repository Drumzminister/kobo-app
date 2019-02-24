<?php

namespace App\Domains\Transaction\Jobs;

use App\Data\Repositories\DebtorRepository;
use App\Data\Repositories\Transaction;
use App\Data\Repositories\TransactionRepository;
use Koboaccountant\Http\Resources\DebtorCollection;
use Lucid\Foundation\Job;

class GetDashboardTransactionDataJob extends Job
{
    /**
     * @var
     */
    private $user;

    /**
     * @var \Illuminate\Foundation\Application|Transaction
     */
    private $transaction;

    /**
     * Create a new job instance.
     *
     * @param string $user
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->transaction = app(TransactionRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $company = $this->user->getUserCompany();

        if (!$company) {
            abort(404);
        }

        $transactions = $this->transaction->getAndOrderedByDate($company->id);

        $firstDebtor = $transactions->first();

        $dayTransactions   = $this->createDebtorCollectionsFromTransactions($transactions->whereBetween('created_at', [now()->subDay(), now()]));
        $weekTransactions  = $this->createDebtorCollectionsFromTransactions($transactions->whereBetween('created_at', [now()->subWeek(), now()]));
        $monthTransactions = $this->createDebtorCollectionsFromTransactions($transactions->whereBetween('created_at', [now()->subMonth(), now()]));
        $yearTransactions  = $this->createDebtorCollectionsFromTransactions($transactions->whereBetween('created_at', [now()->subYear(), now()]));


        $transactions = $this->createDebtorCollectionsFromTransactions($transactions);


        return [
            'transactions'           => $transactions,
            'monthTransactions'      => $monthTransactions,
            'dayTransactions'        => $dayTransactions,
            'weekTransactions'       => $weekTransactions,
            'yearTransactions'       => $yearTransactions,
            'startDate'              => $firstDebtor ? $firstDebtor->created_at : now()->toDateString(),
        ];
    }

    protected function createDebtorCollectionsFromTransactions($transactions)
    {
        return $transactions;

    }
}
