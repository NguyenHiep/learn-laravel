<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->unique()->comment('Tên chuyên mục');
            $table->string('slug', 255)->comment('Tên chuyên mục không dấu');
            $table->integer('parent_id')->comment('Id chuyên mục cha, mặc định là 0');
            $table->string('image', 255)->nullable()->comment('Hình ảnh');
            $table->string('description', 1023)->nullable()->comment('Mô tả nội dung chuyên mục');
            $table->tinyInteger('status')->default(1)->comment('Trạng thái [1: Đã đăng, 2: Xét duyệt]');
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
        //
        Schema::dropIfExists('posts_category');
    }
}
