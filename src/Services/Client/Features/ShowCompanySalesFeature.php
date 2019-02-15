<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Sale\Jobs\GetSaleItemsJob;
use App\Domains\Sales\Jobs\GetSalesPageDataJob;
use Illuminate\Support\Collection;
use Koboaccountant\Models\Sale;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowCompanySalesFeature extends Feature
{
	/**
	 * @var string
	 */
	private $slug;

	/**
	 * ShowCompanySalesFeature constructor.
	 *
	 * @param string $slug
	 */
	public function __construct(string $slug = null)
	{
		$this->slug = $slug;
	}

	public function handle(Request $request)
    {
    	$sales = $this->run(GetSalesPageDataJob::class, ['user' => auth()->user()]);

    	return $this->run(new RespondWithViewJob('sales', $sales));
    }
}
