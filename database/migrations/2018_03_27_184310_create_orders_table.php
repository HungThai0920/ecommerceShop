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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_giao_dich')->unsigned();// id giao dịch
            $table->integer('id_san_pham')->unsigned();// id sản phẩm
            $table->integer('so_luong');// tổng số sản phẩm
            $table->string('ten_san');// tên sản phẩm
            $table->integer('gia');// giá sản phẩm
            $table->integer('tong_tien');// giá sản phẩm
            $table->foreign('id_giao_dich')->references('id')->on('giao_dich')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_san_pham')->references('id')->on('san_pham')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
