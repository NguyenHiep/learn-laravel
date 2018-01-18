<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProuductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('products', function (Blueprint $table) {
	    $table->increments('id');
	    $table->string('name', 255)->unique()->comment('Tên sản phẩm');
	    $table->string('title', 140)->comment('Tiêu đề sản phẩm');
	    $table->string('description', 2000)->comment('Mô tả sản phẩm');
	    $table->string('short_description', 500)->comment('Mô tả ngắn sản phẩm');
	    $table->string('category_id', 100)->comment('Chuyên mục sản phẩm');
	    $table->string('sku', 50)->comment('Mã SKU');
        $table->integer('price')->comment('Giá sản phẩm');
        $table->integer('sale_price')->comment('Giá khuyến mãi phẩm');
        $table->tinyInteger('status')->default(1)->comment('Trạng thái sản phẩm [1: Đã đăng, 2: Xét duyệt]');
        $table->string('meta_title', 100)->comment('Meta title');
        $table->string('meta_keywords', 1000)->comment('Meta key words');
        $table->string('meta_description', 255)->comment('Meta description');
	    $table->integer('brand_id')->comment('Thương hiệu sản phẩm');
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
        Schema::dropIfExists('products');
    }
}
