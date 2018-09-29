<?php

namespace Koboaccountant\Repositories\Accountant;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Account;

/**
 * 
 */
class AccountRepository extends BaseRepository
{
	
	function __construct()
	{
		# code...
	}

	public function create($data)
	{	
		$account = new Account();
		$account->id = $this->slugIt($data['name']);
		$account->name = $data['name'];
		$account->number = $data['number'];
		$account->opening_balance = $data['opening_balance'];
		$account->bank_name = isset($data['bank_name'])? $data['bank_name'] : null;
		$account->bank_phone = isset($data['bank_phone'])? $data['bank_phone'] : null;
		$account->bank_address = isset($data['bank_address'])? $data['bank_address'] : null;
		$account->isActive = $data['isActive'];
		$account->company_id = $data['company'];

		$account->save();
		return true;
	}

	public function update($data)
	{
		$account = Account::where('id', $data['account_id'])->first();
		$account->name = $data['name'];
		$account->number = $data['number'];
		$account->opening_balance = $data['opening_balance'];
		$account->bank_name = isset($data['bank_name'])? $data['bank_name'] : null;
		$account->bank_phone = isset($data['bank_phone'])? $data['bank_phone'] : null;
		$account->bank_address = isset($data['bank_address'])? $data['bank_address'] : null;
		$account->isActive = $data['isActive'];
		$account->company_id = $data['company'];

		$account->save();
		return true; 
	}
}