<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->comment('Tên người bình luận');
            $table->text('content')->comment('Nội dung bình luận');
            $table->tinyInteger('rate')->default(3)->comment('Số sao cho sản phẩm, mặc định là 3 sao, tối thiểu là 1 sao, tối đa là 5 sao');
            $table->tinyInteger('status')->default(2)->comment('Trạng thái bình luận[1: Đã đăng, 2: Xét duyệt]');
            $table->string('ip_user', 45)->comment('Địa chỉ IP người bình luận');
            $table->unsignedBigInteger('product_id')->nullable()->comment('Id sản phẩm');
            $table->unsignedBigInteger('customer_id')->nullable()->comment('Id người dùng');
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
        Schema::dropIfExists('product_comments');
    }
}
