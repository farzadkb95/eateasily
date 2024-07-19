<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'data_id' => $this->data_id,
            'amount' => $this->amount,
            'status' => $this->status,
            'pay_ref' => $this->pay_ref,
        ];
    }
}
