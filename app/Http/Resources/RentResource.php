<?php

namespace Koboaccountant\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'start'         =>  $this->start,
            'end'           =>  $this->end,
            'amount'        =>  $this->amount,
            'expired'       =>  $this->expired,
            'property_details'      => $this->property_details,
            'other_costs'   =>  $this->other_costs,
            'amount_paid'   =>    $this->amountPaidThisPeriod(),
            'has_completed_payment' =>  $this->has_completed_payment,
        ];
    }
}
