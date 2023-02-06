<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhapHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhap_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_san_pham')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->integer('so_luong')->nullable();
            $table->foreign('id_users')->references('id')->on('users')
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
        Schema::dropIfExists('nhap_hang');
    }
}
