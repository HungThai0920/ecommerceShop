<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_muc_tin_tuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');// tên danh mục tin tức
            $table->tinyInteger('vi_tri');// thứ tự hiển thị
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
        Schema::dropIfExists('category_new');
    }
}
