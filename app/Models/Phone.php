<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'tel_phone';

    protected $fillable = [];

}
