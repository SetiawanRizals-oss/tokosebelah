<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = "kota"; //namatable

    //untuk mengatasi masalah mass_asigment
    protected $fillable = ['kodeKota','namaKota','luasKota','isDelete','tanggalHapus']; //namakolom, selain create_at dan update_at

}
