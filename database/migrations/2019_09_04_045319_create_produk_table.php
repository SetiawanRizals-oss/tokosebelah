<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('kodeProduk',5);
            $table->primary('kodeProduk');
            $table->string('namaProduk',30);
            $table->string('hargaProduk',30)->nullable();
            $table->string('kodeKota',5);
            $table->foreign('kodeKota')->references('kodeKota')->on('kota');
            $table->string('kodeJenis',5);
            $table->foreign('kodeJenis')->references('kodeJenis')->on('jenis');
            $table->string('kodeToko',5);
            $table->foreign('kodeToko')->references('kodeToko')->on('toko');
            $table->integer('isDelete');
            $table->timestamps();
            $table->date('tanggalHapus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
