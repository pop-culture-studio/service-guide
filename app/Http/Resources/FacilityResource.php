<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->area->address.$this->address,
            'service' => $this->service->name,
            'tel' => $this->tel,
            'url' => route('facility', $this),
            'company' => $this->company->name,
        ];
    }
}
