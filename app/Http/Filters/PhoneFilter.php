<?php

namespace App\Http\Filters;

class PhoneFilter extends QueryFilter
{
    public function phone($phone)
    {
        return $this->builder->where('phone', 'like', "{$phone}%");
    }

    public function leader_id($leader_id)
    {
        return $this->builder->where('leader_id', $leader_id);
    }

    public function status($status)
    {
        return $this->builder->where('status', $status);
    }
}
