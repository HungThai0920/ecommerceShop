<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_dich', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('ten_khach_hang');// tên người dùng
            $table->string('email');// tên người dùng
            $table->string('so_dien_thoai')->nullable();// tên người dùng
            $table->string('dia_chi')->nullable();// địa chỉ
            $table->Integer('tong_tien')->nullable();// tổng tiền
            $table->string('hinh_thuc_thanh_toan');// hình thức thanh toán
            $table->string('hinh_thuc_van_chuyen');// hình thức vận chuyển
            $table->text('ghi_chu')->nullable();// lưu ý khi giao hàng
            $table->tinyInteger('trang_thai')->nullable();// trạng thải 1: đang hoạt động , 2: bị khóa
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('transaction');
    }
}
