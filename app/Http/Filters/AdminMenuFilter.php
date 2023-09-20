<?php

namespace App\Http\Filters;

class AdminMenuFilter extends QueryFilter
{
    public function title($name)
    {
        return $this->builder->where('title','like',"%{$name}%");
    }
}
