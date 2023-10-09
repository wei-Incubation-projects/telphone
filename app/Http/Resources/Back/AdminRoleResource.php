<?php

namespace App\Http\Resources\Back;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminRoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $this->resource->load('menus');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'remark' => $this->remark,
            'status' => $this->status,
            'menus' => $this->when($this->shouldIncludeRoles(), function (){
                return $this->menus->map(function ($item){
                    return $item->only(['id']);
                });
            },[]),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }

    private function shouldIncludeRoles()
    {
        // 根据属性的值来判断是否展示关联数据
        return $this->symbol !== 'root';
    }
}
