<?php

namespace App\Http\Resources\Back;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{

    public static $wrap = 'list';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'agent' => $this->agent->username,
            'status' => $this->status,
            'batch' => $this->batch,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
