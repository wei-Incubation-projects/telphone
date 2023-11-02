<?php

namespace App\Models;

class Phone extends BaseModel
{

    protected $table = 'tel_phone';

    protected $fillable = ['id', 'phone', 'leader_id', 'status', 'batch', 'user_id','remark','created_at', 'updated_at'];
//    protected $dateFormat = 'U';

    public static array $statusText = [
        0 => '等待处理',
        1 => '已接通',
        2 => '已同意',
        3 => '未接通(通话中/语音助手/在忙稍后回电)',
        4 => '拒绝',
        5 => '直接挂断',
        -1 => '关机/停机/空号',
    ];

    public static function statusKey(): array
    {
        return array_fill_keys(array_keys(self::$statusText),0);
    }
}
