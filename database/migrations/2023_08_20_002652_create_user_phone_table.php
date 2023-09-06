<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_phone', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->default('0')->comment('用户id');
            $table->string('phone')->default('')->comment('业务号码');
            $table->integer('callback')->default('1')->comment('拨打结果：0=关机,1=已接通,2=已同意,3=未接通,4=拒绝,5=直接挂断');
            $table->text('remark')->nullable()->comment('备注信息');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_phone');
    }
}
