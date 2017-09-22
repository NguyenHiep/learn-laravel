<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCategoryIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_category_ids', function (Blueprint $table) {
            $table->integer('posts_id')->comment('Id bài viết');
            $table->integer('posts_category_id')->comment('Id chuyên mục');
            //$table->integer('rank')->comment('Thứ tự');
            $table->primary(['posts_id', 'posts_category_id' ]);
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
        Schema::dropIfExists('posts_category_ids');
    }
}
