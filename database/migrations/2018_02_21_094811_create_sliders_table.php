<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_img')->comment('Ảnh slider');
            $table->string('slider_title')->comment('Tiêu đề slider');
            $table->text('slider_content')->nullable()->comment('Nội dung slider');
            $table->string('slider_url')->comment('Đường dẫn slider');
            $table->tinyInteger('slider_target')->comment('Taget slider [1: _blank, 2: _self, 3: _parent, 4: _top, 5: framename]');
            $table->tinyInteger('slider_status')->default(1)->comment('Trạng thái slider [1: Đã đăng, 2: Xét duyệt]');
            $table->integer('user_id')->unsigned()->comment('Tác giả');
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
        Schema::dropIfExists('sliders');
    }
}
