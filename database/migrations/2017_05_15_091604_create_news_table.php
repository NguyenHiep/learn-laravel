<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->text('intro')->nullable();;
            $table->longText('full');
            $table->string('image')->nullable();;
            $table->tinyInteger('status')->default(1);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
            ->references('id')->on('tbl_category')
            ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id') //Tao khoa ngoai
            ->references('id')->on('users')
            ->onDelete('cascade');
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
        Schema::dropIfExists('tbl_news');
    }
}
