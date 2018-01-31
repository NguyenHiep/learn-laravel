<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique()->comment('Tên tài khoản');
            $table->string('email')->unique()->comment('Email tài khoản');
            $table->string('password')->comment('Mật khẩu');
	        $table->tinyInteger('level')->default(3)->comment('Cấp bậc [1: Quản trị viên, 2: Biên tập viên, 3: Cộng tác viên]');
            $table->string('avatar')->nullable()->comment('Ảnh đại diện');
	        $table->tinyInteger('status')->default(2)->comment('Trạng thái [1: Kích hoạt, 2: Không kích hoạt]');
            $table->rememberToken();
            $table->timestamps();
	        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
