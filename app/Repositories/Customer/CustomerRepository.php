<?php

namespace Koboaccountant\Repositories\Customer;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Customer;

/**
 * 
 */
class CustomerRepository extends BaseRepository
{
	
	public function __construct(Customer $customer)
	{
		$this->customerModel = $customer;
		$this->accountModel = $account;
	}

	public function create($data)
	{	
		$customer = new Customer();
		$customer->id = $this->generateUuid();
		$customer->name = $data['name'];
		$customer->phone = $data['phone'];
		$customer->email = $data['email'];
		$customer->address = $data['address'];
		$customer->website = $data['website'];
		$customer->isActive = $data['isActive'];
		$customer->account_id = $account->id;

		$customer->save();
		return true;
	}

	public function update($data)
	{
		$customer = Customer::where('id', $data['customer_id'])->first();
        $customer->name = $data['name'];
		$customer->phone = $data['phone'];
		$customer->email = isset($data['email']) ? $data['email'] : null;
		$customer->address = isset($data['address']) ? $data['address'] : null;
		$customer->website = isset($data['website'])? $data['website'] : null;
		$customer->isActive = $data['isActive'];
		$customer->account_id = $account->id;


		$customer->save();
		return true; 
	}
}