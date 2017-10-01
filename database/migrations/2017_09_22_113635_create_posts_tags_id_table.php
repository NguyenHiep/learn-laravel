<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTagsIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_tags_ids', function (Blueprint $table) {
            $table->increments('id')->comment('Id bài viết');
            $table->integer('posts_id')->comment('Id bài viết');
            $table->integer('posts_tags_id')->comment('Id tags');
            //$table->integer('rank')->comment('Thứ tự');
            //$table->primary(['id', 'posts_id', 'posts_tags_id']);
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
        Schema::dropIfExists('posts_tags_ids');
    }
}
