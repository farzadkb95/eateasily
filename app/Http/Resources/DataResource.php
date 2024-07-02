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
        $idealWeight = $this->gender == 'male' ? $this->height - 100 : $this->height - 105;
        $extraWeight = $this->weight - $idealWeight;
        $idealWeightTime = 1;
        if ($extraWeight >= 8) {
            $idealWeightTime = 2;
        }
        if ($extraWeight >= 12) {
            $idealWeightTime = 3;
        }
        if ($extraWeight >= 19) {
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
            'ideal_weight' => $idealWeight,
            'extra_weight' => $extraWeight,
            'ideal_weight_time' => $idealWeightTime,
            'other' => collect($this->other)->mapWithKeys(function ($item) {
                return [$item['key'] => $item['type'] == 'json' ? json_decode($item['value']) : $item['value']];
            }),
        ];
    }
}
