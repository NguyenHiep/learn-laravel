<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsMediasInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts_medias_info', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique()->comment('Id tập tin');
            $table->string('extension',255)->comment('Phần mở rộng tập tin [PNG, GIF, ...]');
            $table->string('width', 5)->nullable()->comment('Chiều rộng');
            $table->string('height', 5)->nullable()->comment('Chiều cao');
            $table->string('size', 20)->nullable()->comment('Dung lượng tệp');
            $table->string('title', 255)->nullable()->comment('Tiêu đề');
            $table->string('caption', 255)->nullable()->comment('Chú thích');
            $table->string('alt', 255)->nullable()->comment('Văn bản thay thế');
            $table->string('description', 1025)->nullable()->comment('Mô tả tập tin');
            $table->tinyInteger('lightbox')->nullable()->comment('Popup đối với ảnh hoặc video');
            $table->string('video_length', 30)->nullable()->comment('Thời gian video [3:25]');
            $table->tinyInteger('video_type')->nullable()->comment('Loại video [1: youtube, 2: vimeo, 3: facebook]');
            $table->string('video_code_id', 50)->nullable()->comment('Mã code id của video');
            //$table->string('description', 1023)->nullable()->comment('Mô tả files');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');
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
        Schema::dropIfExists('posts_medias_info');
    }
}
