<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{

    protected $table = 'kota';
    protected $fillable = ['kodeKota', 'namaKota', 'luasKota','isDelete'];

   
}
