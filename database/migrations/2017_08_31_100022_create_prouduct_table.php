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
	    $table->longText('description', 2000)->comment('Mô tả sản phẩm');
	    $table->longText('short_description', 500)->nullable()->comment('Mô tả ngắn sản phẩm');
	    $table->string('category_id', 100)->nullable()->comment('Chuyên mục sản phẩm');
	    $table->string('sku', 50)->unique()->comment('Mã SKU');
        $table->string('price')->comment('Giá sản phẩm');
        $table->string('sale_price')->nullable()->comment('Giá khuyến mãi phẩm');
        $table->integer('quantity')->comment('Số lượng sản phẩm');
        $table->tinyInteger('status')->default(1)->comment('Trạng thái sản phẩm [1: Đã đăng, 2: Xét duyệt]');
        $table->string('meta_title', 100)->nullable()->comment('Meta title');
        $table->string('meta_keywords', 1000)->nullable()->comment('Meta key words');
        $table->string('meta_description', 255)->nullable()->comment('Meta description');
	    $table->integer('brand_id')->nullable()->comment('Thương hiệu sản phẩm');
        $table->text('galary_img', 255)->nullable()->comment('Ảnh galary');
        $table->string('pictures', 255)->nullable()->comment('Ảnh sản phẩm');
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
