<?php

namespace App\Services\Client\Http\Controllers;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Services\Client\Features\AddBankAccountFeature;
use App\Services\Client\Features\DeleteBankDetailFeature;
use App\Services\Client\Features\UpdateBankDetailFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankDetailController extends Controller
{
    public function addBankDetail()
    {
    	return $this->serve(AddBankAccountFeature::class);
    }

	public function listBanks($userId)
	{
		return $this->serve(GetBankAccountsJob::class, ['userId' => $userId]);
	}

	public function deleteBankDetail()
	{
		return $this->serve(DeleteBankDetailFeature::class);
	}

	public function updateBankDetail($detailId)
	{
		return $this->serve(UpdateBankDetailFeature::class, ['detailId' => $detailId]);
	}
}
