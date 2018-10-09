<?php

namespace Koboaccountant\Repositories\Sales;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\SalesChannel;
use Koboaccountant\Models\Sales;

/**
 * 
 */
class SalesRepository extends BaseRepository
{
	
	function __construct(SalesChannel $saleschannel, Sales $sale)
	{
		$this->salesModel = $sale;
		$this->saleschannelModel = $channel;
	}
	public function addChannel($data)
	{
		$channel = new SalesChannel;
		$channel->name = $data['name'];

		$channel->save();

		return true;
	}

	public function create($data)
	{
		$sales = new Sales;
		$sales->id = $this->generateUuid();
		//Upload any Image 
		$sales->attachment = $data['attachment'];
		$sales->customer_id = $data['customer_id'];
		$sales->inventory_id = $data['inventory_id'];
		$sales->sales_date = $data['sales_date'];
		$sales->description = $data['description'];
		$sales->save();
		return true;
	}

	public function update($data)
    {
		$sales = Sales::where('id', $data['sales_id'])->first();
        $sales->attachment = $data['attachment'];
		$sales->inventory_id = $data['inventory_id'];
		$sales->customer_id = $data['customer_id'];
		$sales->sales_date = $data['sales_date'];
		$sales->description = $data['description'];
		$sales->save();
		
		return true;

	}
	
	public function delete($data)
	{
		$sales = Sales::where('id', $data['sales_id'])->first();
		$sales->delete();
	}
}