<?php

namespace App\Http\Filters;

class UserFilter extends QueryFilter
{
    public function name($name)
    {
        return $this->builder->where('name','like',"%{$name}%");
    }
}
