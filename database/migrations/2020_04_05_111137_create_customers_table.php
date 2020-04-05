<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar')->nullable()->comment('Ảnh đại diện');
            $table->string('first_name')->comment('Tên');
            $table->string('last_name')->comment('Họ');
            $table->string('username')->unique()->comment('Tên tài khoản');
            $table->string('password')->comment('Mật khẩu');
            $table->string('email')->unique()->comment('Email tài khoản');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable()->comment('Thời gian đăng nhập sau cùng');
            $table->string('phone', 20)->comment('Điện thoại');
            $table->tinyInteger('gender')->unsigned()->default(2)->comment('Giới tính [1: Nam, 2: Nữ]');
            $table->date('birthday')->nullable()->comment('Sinh nhật');
            $table->string('address', 1000)->nullable()->comment('Địa chỉ');
            $table->bigInteger('city_id')->unsigned()->nullable()->comment('Tỉnh');;
            $table->bigInteger('district_id')->unsigned()->nullable()->comment('Quận or Huyện');
            $table->tinyInteger('status')->unsigned()->default(2)->comment('Trạng thái [1: Kích hoạt, 2: Không kích hoạt]');
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
        Schema::dropIfExists('customers');
    }
}
