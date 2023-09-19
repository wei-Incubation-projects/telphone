<?php

namespace App\Models;

class UserPhone extends BaseModel
{

    protected $table = 'user_phone';

    protected $fillable = ['id', 'user_id','phone','callback','remark', 'created_at', 'updated_at'];

    public array $statusText = [
        1 => '已接通',
        2 => '已同意',
        3 => '未接通(通话中/语音助手/在忙稍后回电)',
        4 => '拒绝',
        5 => '直接挂断',
        0 => '关机/停机/空号'
    ];
}
