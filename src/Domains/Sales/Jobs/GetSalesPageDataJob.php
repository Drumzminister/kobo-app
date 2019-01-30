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

class GetSalesPageDataJob extends Job
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

    	$inventories = $this->inventory->getByAttributes(['company_id' => $company->id]);
	    $inventoryItems = $inventories->pluck('inventoryItem')->flatten();

    	$topSales = $inventoryItems->sortByDesc(function ($item) {
    		return !$item->saleItems ? 0 : array_sum($item->saleItems->pluck('quantity')->toArray());
	    })->chunk(5)->first();


    	$sales = $this->sale->getByAttributes(['company_id' => $company->id]);
    	$monthSales = $this->createSaleCollectionsFromSales($this->sale->getCompanyMonthSale($company->id));
    	$daySales = $this->createSaleCollectionsFromSales($this->sale->getCompanyDaySale($company->id));
    	$weekSales = $this->createSaleCollectionsFromSales($this->sale->getCompanyWeekSale($company->id));
    	$yearSales = $this->createSaleCollectionsFromSales($this->sale->getCompanyYearSale($company->id));



    	$sales = $sales->map(function ($sale)  {
    		return new SaleCollection($sale);
	    });


	    return [
	    	'monthSales'    => $monthSales,
	    	'daySales'      => $daySales,
	    	'weekSales'     => $weekSales,
	    	'yearSales'     => $yearSales,
		    'sales'         => $sales,
		    'topSales'      => $topSales ?? collect([])
	    ];
    }

    protected function createSaleCollectionsFromSales($sales)
    {
	    return $sales->map(function ($sale)  {
		    return new SaleCollection($sale);
	    });

    }
}
