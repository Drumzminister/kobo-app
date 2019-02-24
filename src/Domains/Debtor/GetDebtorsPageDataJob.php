<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\CompanyRepository;
use App\Data\Repositories\InventoryItemRepository;
use App\Data\Repositories\InventoryRepository;
use App\Data\Repositories\SaleRepository;
use App\Domains\Debtor\Jobs\GetCompanyDebtorsJob;
use Illuminate\Support\Collection;
use Koboaccountant\Http\Resources\SaleCollection;
use Koboaccountant\Models\Sale;
use Lucid\Foundation\Job;

class GetDebtorsPageDataJob extends Job
{
	/**
	 * @var string
	 */
	private $slug;
	/**
	 * @var
	 */
	private $user;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $debtor;

	/**
	 * @var \Illuminate\Foundation\Application|CompanyRepository
	 */
	private $company;

	/**
	 * @var \Illuminate\Foundation\Application|InventoryRepository
	 */
	private $inventory;

	/**
	 * Create a new job instance.
	 *
	 * @param string $user
	 */
    public function __construct($user)
    {
	    $this->user = $user;
	    $this->debtor = app(SaleRepository::class);
	    $this->company = app(CompanyRepository::class);
	    $this->inventory = app(InventoryRepository::class);
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

//    	$topSales = $soldInventoryItems->sortByDesc(function ($item) {
//    		return !$item->saleItems ? 0 : array_sum($item->saleItems->pluck('quantity')->toArray());
//	    })->chunk(5)->first();


    	$debtors = $this->debtor->getPublishedSalesOrderedByDate($company->id, 'published');

    	$firstDebtor = $debtors->first();

	    $dayDebtors   = $this->createSaleCollectionsFromSales($debtors->whereBetween('created_at', [now()->subDay(), now()]));
	    $weekDebtors  = $this->createSaleCollectionsFromSales($debtors->whereBetween('created_at', [now()->subWeek(), now()]));
	    $monthDebtors = $this->createSaleCollectionsFromSales($debtors->whereBetween('created_at', [now()->subMonth(), now()]));
	    $yearDebtors  = $this->createSaleCollectionsFromSales($debtors->whereBetween('created_at', [now()->subYear(), now()]));


//    	$debtors = $debtors->map(function ($sale)  {
//    		return new SaleCollection($sale);
//	    });

        $debtors = (new GetCompanyDebtorsJob($company->id))->handle();

	    return [
	        'debtors'       => $debtors,
	    	'monthSales'    => $monthDebtors,
	    	'daySales'      => $dayDebtors,
	    	'weekSales'     => $weekDebtors,
	    	'yearSales'     => $yearDebtors,
//		    'sales'         => $sales,
//		    'topSales'      => $topSales ?? collect([]),
		    'startDate'     => $firstDebtor ? $firstDebtor->created_at : now()->toDateString(),
	    ];
    }

    protected function createSaleCollectionsFromSales($sales)
    {
	    return $sales->map(function ($sale)  {
		    return new SaleCollection($sale);
	    });

    }
}
