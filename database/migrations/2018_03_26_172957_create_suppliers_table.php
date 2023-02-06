<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_cung_cap', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');// tên nhà cung cấp
            $table->string('dia_chi')->nullable();// địa chỉ nhà cung cấp
            $table->string('so_dien_thoai')->nullable();// số điện thoại nhà cung cấp
            $table->string('email')->nullable();// email nhà cung cấp
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
        Schema::dropIfExists('suppliers');
    }
}
