<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title')->comment('Tiêu đề bài viết');
            $table->text('post_intro')->nullable()->comment('Mô tả ngắn bài viết');
            $table->longText('post_full')->comment('Nội dung bài viết');
            $table->string('post_image')->nullable()->comment('Ảnh bài viêt');
            $table->tinyInteger('post_status')->default(1)->comment('Trạng thái bài viết [1: Đã đăng, 2: Xét duyệt]');
            $table->string('post_format', 255)->comment('Định dạng bài viết [1: Chuẩn, 2: Video, 3: Audio, 4: Bộ sưu tập]');
            //$table->string('post_category_id', 255)->comment('Chuyên mục bài viết');
            $table->string('post_keyword')->nullable()->comment('Từ khóa bài viết');
            $table->tinyInteger('visit')->default(0)->comment('Lượt xem bài viết');
            $table->integer('user_id')->unsigned()->comment('Tác giả bài viết');
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
        //
        Schema::dropIfExists('posts');
    }
}
