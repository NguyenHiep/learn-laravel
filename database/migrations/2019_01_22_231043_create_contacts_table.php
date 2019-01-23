<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('Tên người bình luận');
            $table->string('email', 100)->comment('Email người bình luận');
            $table->text('content')->comment('Nội dung bình luận');
            $table->string('ip_user', 45)->comment('Địa chỉ IP người bình luận');
            $table->tinyInteger('reply')->default(2)->comment('Trả lời liên hệ [1: Đã trả lời, 2: Chưa trả lời]');
            $table->tinyInteger('status')->default(2)->comment('Trạng thái [1: Đã trả lời, 2: Xét duyệt]');
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
        Schema::dropIfExists('contacts');
    }
}
