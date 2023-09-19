<?php

namespace App\Http\Resources\Back;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'account' => $this->account,
            'status' => $this->status,
            'ip_address' => $this->ip_address,
            'phones' => $this->whenLoaded('phones'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
