<?php

namespace App\Http\Resources\Back;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaderResource extends JsonResource
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
            'phone' => $this->phone,
            'email' => $this->email,
            'encry' => $this->encry,
            'upload' => $this->upload,
            'in_leader' => $this->in_leader,
            'status' => $this->status,
            'callback' => $this->callback,
            'created_at' => $this->created_at,
            'lasted_at' => $this->lasted_at,
            'lasted_ip' => $this->lasted_ip,
        ];
    }
}
