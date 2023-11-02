<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tel_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->unique()->default('')->comment('号码');
            $table->integer('status')->default(0)->comment('状态：1可用，0禁用')->index();
            $table->integer('leader_id')->default(0)->comment('管理员ID')->index();
            $table->integer('batch')->default(0)->comment('批次')->index();
            $table->integer('user_id')->nullable()->comment('业务员id')->index();
            $table->text('remark')->nullable()->comment('备注信息');
            $table->timestamp('locked_at')->nullable()->nullable()->comment('锁定时间');
            $table->timestamps();
            $table->comment('号码库');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tel_phone');
    }
}
