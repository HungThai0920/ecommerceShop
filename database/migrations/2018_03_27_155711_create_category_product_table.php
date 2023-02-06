<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_muc_san_pham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');// tên danh mục
            $table->integer('id_danh_muc_cha');// id danh mục cha
            $table->tinyInteger('vi_tri');// thứ tự sắp xếp
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
        Schema::dropIfExists('category_product');
    }
}
