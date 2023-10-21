<?php

namespace App\Http\Filters;

class UserFilter extends QueryFilter
{
    public function username($name)
    {
        return $this->builder->where('username', 'like', "%{$name}%");
    }

    public function leader_id($id)
    {
        return $this->builder->where('leader_id', $id);
    }

    public function type($type)
    {
        return $this->builder->where('type', $type);
    }

    public function phone($phone)
    {
        return $this->builder->where('phone', $phone);
    }
}
