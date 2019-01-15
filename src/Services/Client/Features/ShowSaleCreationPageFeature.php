<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\GetCompanyBankAccountsJob;
use App\Domains\Customer\Jobs\GetCompanyCustomersJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Inventory\Jobs\GetCompanyInventoriesJob;
use App\Domains\Sales\Jobs\CreateSaleDraftJob;
use App\Domains\Sales\Jobs\GetCompanySaleChannelsJob;
use App\Domains\Sales\Jobs\GetSaleJob;
use App\Domains\Vat\Jobs\GetVatsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowSaleCreationPageFeature extends Feature
{
	/**
	 * @var string
	 */
	private $saleId;

	public function __construct(string $saleId)
	{
		$this->saleId = $saleId;
	}

	public function handle(Request $request)
	{
		$data['customers'] = $this->run(GetCompanyCustomersJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
		$data['banks'] = $this->run(GetCompanyBankAccountsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
		$data['taxes'] = $this->run(GetVatsJob::class);
		$data['inventories'] = $this->run(GetCompanyInventoriesJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
		$data['channels'] = $this->run(GetCompanySaleChannelsJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
		$data['sale'] = $this->run(GetSaleJob::class, ['saleId' => $this->saleId]);

		return $this->run(new RespondWithViewJob('addSales', $data));
	}
}
