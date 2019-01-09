<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\CompanyRepository;
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
	 * @var string
	 */
	private $userId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * @var \Illuminate\Foundation\Application|CompanyRepository
	 */
	private $company;

	/**
	 * Create a new job instance.
	 *
	 * @param string $slug
	 * @param string $userId
	 */
    public function __construct(string $slug, string $userId)
    {
	    $this->slug = $slug;
	    $this->userId = $userId;
	    $this->sale = app(SaleRepository::class);
	    $this->company = app(CompanyRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$company = $this->company->getByAttributes(['slug' => $this->slug])->first();

    	if (!$company) {
    		abort(404);
	    }

    	$sales = $this->sale->getByAttributes(['company_id' => $company->id]);

    	$xb = new Collection();

    	$sales->each(function ($sale) use (&$xb) {
    		$xb->put($sale->id, new SaleCollection($sale));
	    });

    	$tSales = SaleCollection::collection($sales);
//    	return $sales;

	    $items = new Collection();
	    $sales->each(function (Sale $sale) use (&$items) {
		    $sale->saleItems->each(function ($item) use(&$items) {
			    $items->push($item);
		    });
	    });
	    $items = $items->sortByDesc('quantity');
	    $items = $items->chunk(5)->first();


	    return ['sales' => $xb, 'topFiveItems' => $items];
    }
}
