<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ho_ten');// tên người dùng
            $table->string('email')->unique('email');// email 
            $table->string('password');// password 
            $table->tinyInteger('gioi_tinh')->nullable();// giới tính
            $table->string('so_dien_thoai')->nullable();// số điện thoại
            $table->tinyInteger('vai_tro');// quyền
            $table->string('dia_chi')->nullable();// địa chỉ
            $table->date('ngay_sinh')->nullable();// ngày tháng năm sinh
            $table->tinyInteger('trang_thai')->nullable();// trạng thải 1: đang hoạt động , 2: bị khóa
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
