<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\DeleteBankDetailJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeleteBankDetailFeature extends Feature
{
	private $detailId;

	public function __construct($detailId)
	{
		$this->detailId = $detailId;
	}

	public function handle(Request $request)
    {
		$isDeleted = $this->run(DeleteBankDetailJob::class, ['detailId' => $this->detailId]);
		
		if ($isDeleted) {
			return [
				'status' => 'success',
				'message' => 'Bank details deleted successfully',
			];
		}

	    return [
		    'status' => 'error',
		    'message' => 'Unable to delete bank details',
	    ];
    }
}
