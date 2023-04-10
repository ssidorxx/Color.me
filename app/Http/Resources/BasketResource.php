<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,

            'user' => $this->user_id,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'amount' => $this->amount,
            'summary' => $this->summary,
        ];
    }
}
