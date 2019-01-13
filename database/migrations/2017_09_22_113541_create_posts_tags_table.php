<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->unique()->comment('Tên thẻ');
            $table->string('slug', 255)->comment('Tên thẻ không dấu');
            $table->string('description', 1023)->nullable()->comment('Mô tả thẻ');
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
        Schema::dropIfExists('posts_tags');
    }
}
