<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_title')->comment('Tiêu đề trang');
            $table->string('page_slug')->comment('Tiêu đề trang không dấu');
            $table->text('page_intro')->nullable()->comment('Mô tả ngắn trang');
            $table->longText('page_full')->comment('Nội dung trang');
            $table->unsignedInteger('page_medias_id')->nullable()->comment('Ảnh trang');
            $table->tinyInteger('page_status')->default(1)->comment('Trạng thái trang [1: Đã đăng, 2: Xét duyệt]');
            $table->string('page_attribute', 255)->comment('Thuộc tính trang');
            $table->string('page_keyword')->nullable()->comment('Từ khóa bài viết');
            $table->tinyInteger('visit')->default(0)->comment('Lượt xem trang');
            $table->integer('user_id')->unsigned()->comment('Tác giả trang');
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
        Schema::dropIfExists('pages');
    }
}
