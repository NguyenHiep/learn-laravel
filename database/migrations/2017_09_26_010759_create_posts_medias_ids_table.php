<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMediasIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_medias_ids', function (Blueprint $table) {
        //$table->increments('id')->comment('Id');
        $table->integer('posts_id')->comment('Id bài viết');
        $table->integer('posts_medias_id')->comment('Id hình ảnh');
        $table->primary(['posts_id', 'posts_medias_id']);
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
        Schema::dropIfExists('posts_medias_ids');
    }
}
