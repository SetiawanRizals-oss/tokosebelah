<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = "produk";
    protected $fillable = ['kodeProduk','namaProduk','hargaProduk','kodeKota','kodeJenis','kodeToko','isDelete','tanggalHapus'];

}
