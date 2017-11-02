<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('Tên người bình luận');
            $table->string('email', 100)->comment('Email người bình luận');
            $table->text('content')->comment('Nội dung bình luận');
            $table->string('url')->nullable()->comment('Địa chỉ website');
            $table->tinyInteger('comment_status')->default(1)->comment('Trạng thái bình luận[1: Đã đăng, 2: Xét duyệt]');
            $table->string('ip_user', 45)->comment('Địa chỉ IP người bình luận');
            $table->integer('posts_id')->nullable()->comment('Id bài viết');
            $table->integer('comment_parent')->default(0)->comment('Trả lời hay bình luận [0: Bình luận, khác không là trả lời]');
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
        Schema::dropIfExists('comments');
    }
}
