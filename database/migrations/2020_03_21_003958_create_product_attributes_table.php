<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('product_id');
            $table->string('size', 5)->unique()->comment('Size sản phẩm');
            $table->string('sku', 50)->unique()->comment('Mã SKU');
            $table->float('price', 14, 2)->comment('Giá sản phẩm');
            $table->unsignedInteger('quantity')->comment('Số lượng sản phẩm');
            $table->unique(['product_id', 'size', 'sku']);
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
        Schema::dropIfExists('product_attributes');
    }
}
