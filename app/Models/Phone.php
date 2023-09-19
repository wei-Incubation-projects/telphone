<?php

namespace App\Models;

class Phone extends BaseModel
{

    protected $table = 'tel_phone';

    protected $fillable = ['id', 'phone', 'admin_id', 'status', 'batch', 'created_at', 'updated_at'];

    public function agent()
    {
        return $this->belongsTo(AdminUser::class, 'admin_id');
    }
}
