<?php

namespace App\Http\Filters;

class PhoneFilter extends QueryFilter
{
    public function phone($phone)
    {
        return $this->builder->where('phone','like',"{$phone}%");
    }
}
