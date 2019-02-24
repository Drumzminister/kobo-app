<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\CompanyRepository;
use App\Data\Repositories\InventoryItemRepository;
use App\Data\Repositories\InventoryRepository;
use App\Data\Repositories\SaleRepository;
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
	private $sale;

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
	    $this->sale = app(SaleRepository::class);
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

    	$inventories        = $this->inventory->getByAttributes(['company_id' => $company->id]);
	    $soldInventoryItems = $inventories->pluck('inventoryItem')
	                                  ->flatten()
	                                  ->filter(function ($item) {
	                                  	    return $item->saleItems && $item->saleItems->first() && $item->saleItems->first()->sale && $item->saleItems->first()->sale->type === 'published';
							          });

    	$topSales = $soldInventoryItems->sortByDesc(function ($item) {
    		return !$item->saleItems ? 0 : array_sum($item->saleItems->pluck('quantity')->toArray());
	    })->chunk(5)->first();


    	$sales = $this->sale->getPublishedSalesOrderedByDate($company->id, 'published');

    	$firstSale = $sales->first();

	    $daySales   = $this->createSaleCollectionsFromSales($sales->whereBetween('sale_date', [now()->subDay(), now()]));
	    $weekSales  = $this->createSaleCollectionsFromSales($sales->whereBetween('sale_date', [now()->subWeek(), now()]));
	    $monthSales = $this->createSaleCollectionsFromSales($sales->whereBetween('sale_date', [now()->subMonth(), now()]));
	    $yearSales  = $this->createSaleCollectionsFromSales($sales->whereBetween('sale_date', [now()->subYear(), now()]));


    	$sales = $sales->map(function ($sale)  {
    		return new SaleCollection($sale);
	    });


	    return [
	    	'monthSales'    => $monthSales,
	    	'daySales'      => $daySales,
	    	'weekSales'     => $weekSales,
	    	'yearSales'     => $yearSales,
		    'sales'         => $sales,
		    'topSales'      => $topSales ?? collect([]),
		    'startDate'     => $firstSale ? $firstSale->created_at : now()->toDateString(),
	    ];
    }

    protected function createSaleCollectionsFromSales($sales)
    {
	    return $sales->map(function ($sale)  {
		    return new SaleCollection($sale);
	    });

    }
}
