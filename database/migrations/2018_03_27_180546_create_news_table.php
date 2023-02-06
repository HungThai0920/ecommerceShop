<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de');// tiêu đề bài viết
            $table->integer('id_danh_muc')->unsigned();// id danh mục sản phẩm
            $table->text('noi_dung')->nullable();// mô tả bài viết
            $table->string('hinh_anh')->nullable();// ảnh bài viết
            $table->tinyInteger('trang_thai');// trạng thải 1: hiển thi , 2: ẩn
            $table->foreign('id_danh_muc')->references('id')->on('danh_muc_tin_tuc')
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
        Schema::dropIfExists('news');
    }
}
