<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis', function (Blueprint $table) {
             $table->string('kodeJenis',5);
            $table->primary('kodeJenis');
            $table->string('namaJenis',20);
            $table->integer('promoJenis');
            $table->integer('isDelete');
            $table->date('tanggalHapus');
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
        Schema::dropIfExists('jenis');
    }
}
