<?php

namespace Koboaccountant\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientTransactionCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
        	'bank_id'   => $this->bank_detail_id,
	        'bank'      => $this->paymentMode,
	        'amount'    => $this->amount,
        ]);
    }
}
