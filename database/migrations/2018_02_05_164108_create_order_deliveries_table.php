<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->comment('ID order');
            $table->string('buyer_name')->nullable()->comment('Tên người mua');
            $table->string('buyer_email')->nullable()->comment('Email người mua');
            $table->string('buyer_phone_1')->nullable()->comment('Số điện thoại người mua');
            $table->string('buyer_phone_2')->nullable()->comment('Số điện thoại người mua');
            $table->string('buyer_address')->nullable()->comment('Địa chỉ người mua');
            $table->tinyInteger('delivery_type')->comment('Phương thưc nhận hàng');
            $table->string('receiver_name')->nullable()->comment('Tên người nhận');
            $table->string('receiver_email')->nullable()->comment('Email người nhận');
            $table->string('receiver_phone_1')->nullable()->comment('Số điện thoại người nhận');
            $table->string('receiver_phone_2')->nullable()->comment('Số điện thoại2 người nhận');
            $table->string('receiver_address_1')->nullable()->comment('Địa chỉ người nhận');
            $table->string('receiver_address_2')->nullable()->comment('Địa chỉ 2 người nhận');
            $table->tinyInteger('receiver_address_type')->comment('Phương thức nhận hàng');
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
        Schema::dropIfExists('order_deliveries');
    }
}
