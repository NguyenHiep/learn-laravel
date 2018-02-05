<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('ordered_at')->comment('Ngày đặt hàng');
            $table->dateTime('delivered_at')->nullable()->comment('Ngày giao hàng');
            $table->integer('sub_total')->unsigned()->default(0)->comment('Tổng tiền chưa thuế');
            $table->integer('total')->unsigned()->default(0)->comment('Tổng tiền có thuế');
            $table->integer('tax_rate')->unsigned()->default(10)->comment('Phần trăm thuế 10% VAT');
            $table->integer('delivery_fee')->unsigned()->default(0)->comment('Phí vận chuyển');
            $table->integer('tax_fee')->unsigned()->default(0)->comment('Tiền thuế');
            $table->text('note')->nullable()->comment('Ghi chú đơn hàng');
            $table->tinyInteger('status')->default(1)->comment('Trạng thái đơn hàng [1: Chờ xử lý, 2: Xử lý xong, 3: Đang giao hàng, 4: Giao hàng thành công]');
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
        Schema::dropIfExists('orders');
    }
}
