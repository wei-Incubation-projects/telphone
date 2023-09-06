<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'user_phone';

    protected $fillable = ['id','user_id','phone','status'];

    public array $statusText = [
        1 => '已接通',
        2 => '已同意',
        3 => '未接通(通话中/语音助手/在忙稍后回电)',
        4 => '拒绝',
        5 => '直接挂断',
        0 => '关机/停机/空号'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
