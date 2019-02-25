<?php

namespace Koboaccountant\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DebtorCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $otherData =  [
            'totalPaid' => $this->sale->transactions->pluck('amount')->sum(),
            'totalInvoice' => $this->sale->total_amount,
        ];

        return array_merge(parent::toArray($request), $otherData);
    }
}
