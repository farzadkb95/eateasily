<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $idealWeightTime = 1;
        if (abs($this->extra_weight) >= 8) {
            $idealWeightTime = 2;
        }
        if (abs($this->extra_weight) >= 12) {
            $idealWeightTime = 3;
        }
        if (abs($this->extra_weight) >= 19) {
            $idealWeightTime = 4;
        }

        return [
            'id' => $this->id,
            // 'user_id' => $this->user_id,
            // 'guest_id' => $this->guest_id,
            'status' => $this->status,
            'step' => $this->step,
            'type' => $this->type,
            'gender' => $this->gender,
            'age' => $this->age,
            'height' => $this->height,
            'weight' => $this->weight,
            'ideal_weight' => (float) $this->ideal_weight,
            'extra_weight' => (float) $this->extra_weight,
            'ideal_weight_time' => $idealWeightTime,
            'phone' => $this->phone,
            'phone_verified' => filled($this->phone_verified_at),
            'email' => $this->email,
            'email_verified' => filled($this->email_verified_at),
            'guest' => $this->whenLoaded('guest', $this->guest),
            'other' => collect($this->other)->mapWithKeys(function ($item) {
                return [$item['key'] => $item['type'] == 'json' ? json_decode($item['value']) : $item['value']];
            }),
        ];
    }
}
