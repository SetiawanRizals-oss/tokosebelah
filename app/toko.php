<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    protected $table = 'toko'; //namatable

    //untuk mengatasi masalah mass_asigment
    protected $fillable = ['kodeToko','namaToko','ratingToko','isDelete','tanggalHapus']; //namakolom, selain create_at dan update_at
}
