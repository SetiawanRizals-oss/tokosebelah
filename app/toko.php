<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
<<<<<<< HEAD
    protected $table = 'toko'; //namatable

    //untuk mengatasi masalah mass_asigment
    protected $fillable = ['kodeToko','namaToko','ratingToko','isDelete','tanggalHapus']; //namakolom, selain create_at dan update_at
=======
    protected $table="toko";
    protected $fillable=['kodeToko','namaToko','ratingToko','isDelete','tanggalHapus'];
>>>>>>> 905c01ddecc7c76e855acaaa252fe5f0c5149bc5
}
