<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 255)->comment('Thông tin website - Tên công ty');
            $table->string('company_zip', 8)->comment('Thông tin website - Mã bưu chính');
            $table->string('company_address', 1023)->comment('Thông tin website - Địa chỉ');
            $table->string('company_tel', 13)->nullable()->comment('Thông tin website - Số điện thoại');
            $table->string('company_fax', 13)->nullable()->comment('Thông tin website - Số Fax');
            $table->text('company_copyright')->comment('Bản quyền website');
            $table->string('subtitle', 127)->nullable()->comment('Thông tin website - Tiêu đề mặc định page home');
            $table->decimal('company_lat', 9, 6)->nullable()->comment('Thông tin website - Vĩ độ');
            $table->decimal('company_lng', 9, 6)->nullable()->comment('Thông tin website - Kinh độ');
            $table->tinyInteger('i18n_flg')->default(2)->comment('Đa ngôn ngữ[1 Đa ngôn ngữ,2: Không đa ngôn ngữ]');
            $table->string('email1', 255)->nullable()->comment('Email người gửi - Email');
            $table->string('email1_name', 255)->nullable()->comment('Email người gửi - Tên hiển thị trên email');
            $table->text('about_privacy')->comment('Thông tin cá nhân - Thông tin cá nhân và Điều khoản sử dụng');
            $table->text('about_terms')->comment('Thông tin cá nhân - Điều khoản Dịch vụ - Điều khoản và Điều kiện');
            $table->string('mail_smtp_host', 255)->nullable()->comment('Email người gửi - Host SMTP');
            $table->smallInteger('mail_smtp_port')->nullable()->comment('Email người gửi - Port SMTP');
            $table->string('mail_smtp_user', 255)->nullable()->comment('Email người gửi - User SMTP');
            $table->string('mail_smtp_pass', 255)->nullable()->comment('Email người gửi - PassWord SMTP');
            $table->timestamps();
            $table->softDeletes();
            //$table->timestamp('deleted_at')->nullable()->comment('Ngày xóa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_info');
    }
}
