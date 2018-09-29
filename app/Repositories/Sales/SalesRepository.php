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
		$sale = new Sales;
		$sale->id = $this->generateUuid();
		//Upload any Image 
		$sale->attachment = $data['attachment'];
		$sale->customer_id = $data['customer_id'];
		$sale->inventory_id = $data['inventory_id'];
		$sale->sales_date = $data['sales_date'];
		$sale->description = $data['description'];
		$sale->save();
		return true;
	}
}