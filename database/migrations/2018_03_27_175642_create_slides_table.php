<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anh_bia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten')->nullable();// tên slide
            $table->string('hinh_anh')->nullable();// tên ảnh
            $table->string('link')->nullable();// link trỏ tới
            $table->tinyInteger('vi_tri')->nullable();// thứ tự hiển thị
            $table->tinyInteger('trang_thai');// trạng thải 1: hiển thi , 2: ẩn
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
        Schema::dropIfExists('slides');
    }
}
