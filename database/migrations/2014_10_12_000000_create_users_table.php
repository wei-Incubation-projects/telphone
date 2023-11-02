<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->default('')->comment('账号');
            $table->string('password')->default('')->comment('密码');
            $table->string('phone')->default('')->comment('电话');
            $table->string('email')->default('')->comment('邮件');
            $table->tinyInteger('status')->default(1)->comment('是否启用');
            $table->tinyInteger('callback')->default(0)->comment('能否复播');
            $table->timestamp('lasted_at')->nullable()->comment('上次登录时间');
            $table->string('lasted_ip')->nullable()->default('')->comment('上次登录IP');
            $table->integer('leader_id')->default(0)->comment('组长id');
            $table->tinyInteger('in_leader')->default(0)->comment('内部组长');
            $table->tinyInteger('is_leader')->default(0)->comment('是否组长');
            $table->tinyInteger('encry')->default(0)->comment('是否加密');
            $table->tinyInteger('upload')->default(0)->comment('能否上传');
            $table->tinyInteger('type')->default(0)->comment('组员类型');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
