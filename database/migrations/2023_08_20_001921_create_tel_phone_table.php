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
            $table->string('resource')->default('')->comment('来源');
            $table->integer('status')->default('1')->comment('状态：1可用，0禁用');
            $table->integer('admin_id')->default(0)->comment('管理员ID');
            $table->integer('batch')->default(0)->comment('批次');
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
