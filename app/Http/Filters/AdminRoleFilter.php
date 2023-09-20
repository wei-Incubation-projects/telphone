<?php

namespace App\Http\Filters;

class AdminRoleFilter extends QueryFilter
{
    public function name($name)
    {
        return $this->builder->where('name','like',"%{$name}%");
    }
}
