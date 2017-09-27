<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->unique()->comment('Tên tập tin');
            $table->string('types', 10)->comment('Loại tập tin (image, docs, video)');
            $table->unsignedInteger('user_id')->comment('Tác giả upload tập tin');
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
        Schema::dropIfExists('posts_medias');
    }
}
