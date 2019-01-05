<?php

namespace App\Services\Accountant\Features;

use App\Domains\Budget\Jobs\GetBudgetJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ViewBudgetFeature extends Feature
{
	/**
	 * @var string
	 */
	private $budgetId;

	/**
	 * ViewBudgetFeature constructor.
	 *
	 * @param string $budgetId
	 */
	public function __construct(string $budgetId)
	{
		$this->budgetId = $budgetId;
	}

	public function handle(Request $request)
    {
		$data['budget'] = $this->run(GetBudgetJob::class, ['budgetId' => $this->budgetId]);

		return $this->run(new RespondWithViewJob('accountant::dashboard.view-budget', $data));
    }
}
