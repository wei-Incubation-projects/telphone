<?php

namespace App\Models;

class Phone extends BaseModel
{

    protected $table = 'tel_phone';

    protected $fillable = ['id', 'phone', 'admin_id', 'status', 'batch', 'created_at', 'updated_at'];

    public array $statusText = [
        1 => '已接通',
        2 => '已同意',
        3 => '未接通(通话中/语音助手/在忙稍后回电)',
        4 => '拒绝',
        5 => '直接挂断',
        0 => '关机/停机/空号'
    ];

    public function agent()
    {
        return $this->belongsTo(AdminUser::class, 'admin_id');
    }
}
