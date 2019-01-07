<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Sales\Jobs\GetSalesPageDataJob;
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
	public function __construct(string $slug)
	{
		$this->slug = $slug;
	}

	public function handle(Request $request)
    {
    	$data['sales'] = $this->run(GetSalesPageDataJob::class, ['slug' => $this->slug, 'userId' => auth()->id]);
	    return $this->run(new RespondWithViewJob('sales', $data));
    }
}
