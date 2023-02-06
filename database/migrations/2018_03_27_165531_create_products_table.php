<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_san_pham');// tên sản phẩm
            $table->integer('id_danh_muc')->unsigned();// id danh mục sản phẩm
            $table->integer('id_nha_cung_cap')->unsigned()->nullable();// id nhà cung cấp
            $table->integer('gia');// giá
            $table->integer('giam_gia')->nullable();// giảm giá
            $table->integer('so_luong');// số lượng sản phẩm
            $table->tinyInteger('hien_thi_trang_chu');// số lượng sản phẩm
            $table->tinyInteger('san_pham_noi_bat');// sản phẩm hot
            $table->Integer('luot_xem')->nullable();// số lượt xem
            $table->Integer('so_luong_ban_ra')->nullable();// số lượt bán ra
            $table->string('bao_hanh')->nullable();// thông tin bảo hành
            $table->string('hinh_anh');// Ảnh sản phẩm
            $table->text('mo_ta')->nullable();// mô tả ngắn về sản phẩm
            $table->text('thong_tin_bao_hanh')->nullable();// thông số kỹ thuật
            $table->text('noi_dung')->nullable();// bài viết giới thiệu sp
            $table->tinyInteger('trang_thai');// trạng thải 1: hiển thi , 2: ẩn
            $table->foreign('id_danh_muc')->references('id')->on('danh_muc_san_pham')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_nha_cung_cap')->references('id')->on('nha_cung_cap')
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
        Schema::dropIfExists('products');
    }
}
