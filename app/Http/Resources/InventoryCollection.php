<?php

namespace Koboaccountant\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InventoryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            'id'            => $this->id,
//            'vendor'        => new VendorCollection($this->vendor),
            'invoice_number' => $this->invoice_number,
            'delivered_date' => date("Y-m-d", strtotime((string)$this->delivered_date)),
            'discount'      => $this->discount,
            'delivery_cost' => $this->delivery_cost,
            'tax_amount'    => $this->tax_amount,
            'tax_id'           => $this->tax_id,
            'amount_paid'   => $this->amount_paid,
            'balance'       => $this->balance,
            'total_sales_price' => $this->total_sales_price,
            'total_cost_price'  => $this->total_cost_price,
            'total_quantity'    => $this->total_quantity,
            'created_at' => date("Y-m-d", strtotime((string) $this->created_at)),
        ];
    }
}
