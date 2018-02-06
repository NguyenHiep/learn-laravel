<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->comment('ID order');
            $table->integer('product_id')->unsigned()->comment('ID sản phẩm');
            $table->string('name', 255)->comment('Tên sản phẩm');
            $table->string('sku', 50)->comment('Mã SKU');
            $table->integer('price')->unsigned()->comment('Giá sản phẩm');
            $table->integer('sale_price')->unsigned()->nullable()->comment('Giá khuyến mãi phẩm');
            $table->integer('quantity')->comment('Số lượng sản phẩm');
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
        Schema::dropIfExists('order_products');
    }
}
