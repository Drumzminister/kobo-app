<?php

namespace Koboaccountant\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SaleCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
	        'id' => $this->id,
	        'tax' => $this->tax,
	        'type' => $this->type,
	        'created_at' => date("Y-m-d", strtotime((string) $this->created_at)),
	        'sale_date' => date("Y-m-d", strtotime((string) $this->sale_date)),
	        'saleItems' => SaleItemCollection::collection($this->saleItems),
	        'total_amount' => $this->total_amount,
	        'invoice_number' => $this->invoice_number,
	        'customer' => new CustomerCollection($this->customer),
	        'saleChannel' => new SaleChannelCollection($this->saleChannel),
	        'discount' => $this->discount,
	        'delivery_cost' => $this->delivery_cost,
	        'balance' => $this->balance,

	        // Custom Fields
	        'transactions' => ClientTransactionCollection::collection($this->transactions),
	        'customer_name' => $this->customer ? $this->customer->name : null,
	        'quantity'  => array_sum($this->saleItems->pluck('quantity')->toArray()),
        ];
    }
}
