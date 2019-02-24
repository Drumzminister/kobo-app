<?php

namespace App\Domains\Debtor\Jobs;

use App\Data\Repositories\CompanyRepository;
use App\Data\Repositories\DebtorRepository;
use App\Data\Repositories\InventoryRepository;
use Koboaccountant\Http\Resources\DebtorCollection;
use Lucid\Foundation\Job;

class GetDebtorsPageDataJob extends Job
{
	/**
	 * @var
	 */
	private $user;

	/**
	 * @var \Illuminate\Foundation\Application|DebtorRepository
	 */
	private $debtor;

	/**
	 * Create a new job instance.
	 *
	 * @param string $user
	 */
    public function __construct($user)
    {
	    $this->user = $user;
	    $this->debtor = app(DebtorRepository::class);
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

    	$debtors = $this->debtor->getDebtorsOrderedByDate($company->id);

    	$firstDebtor = $debtors->first();

	    $dayDebtors   = $this->createDebtorCollectionsFromDebtors($debtors->whereBetween('created_at', [now()->subDay(), now()]));
	    $weekDebtors  = $this->createDebtorCollectionsFromDebtors($debtors->whereBetween('created_at', [now()->subWeek(), now()]));
	    $monthDebtors = $this->createDebtorCollectionsFromDebtors($debtors->whereBetween('created_at', [now()->subMonth(), now()]));
	    $yearDebtors  = $this->createDebtorCollectionsFromDebtors($debtors->whereBetween('created_at', [now()->subYear(), now()]));


    	$debtors = $this->createDebtorCollectionsFromDebtors($debtors);


	    return [
	        'totalInvoice'      => $debtors->map(function ($debtor) { return $debtor->sale->total_amount; })->sum(),
	        'totalPaid'         => $debtors->map(function ($debtor) { return $debtor->sale->transactions->pluck('amount')->sum(); })->sum(),
	        'debtTotal'         => $debtors->pluck('amount')->sum(),
	        'debtors'           => $debtors,
	    	'monthDebtors'      => $monthDebtors,
	    	'dayDebtors'        => $dayDebtors,
	    	'weekDebtors'       => $weekDebtors,
	    	'yearDebtors'       => $yearDebtors,
		    'startDate'         => $firstDebtor ? $firstDebtor->created_at : now()->toDateString(),
	    ];
    }

    protected function createDebtorCollectionsFromDebtors($debtors)
    {
	    return $debtors->map(function ($debtor)  {
		    return new DebtorCollection($debtor);
	    });

    }
}
