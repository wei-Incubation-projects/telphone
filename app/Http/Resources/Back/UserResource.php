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
            'leader_id' => $this->leader_id,
            'is_leader' => $this->is_leader,
            'type' => $this->type,
            'username' => $this->username,
            'phone' => $this->phone,
            'email' => $this->email,
            'encry' => $this->encry,
            'upload' => $this->upload,
            'status' => $this->status,
            'callback' => $this->callback,
            'created_at' => $this->created_at,
            'lasted_at' => $this->lasted_at,
            'lasted_ip' => $this->lasted_ip,
        ];
    }
}
