<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table="jenis";
    protected $fillable=['kodeJenis','namaJenis','promoJenis','isDelete','tanggalHapus'];
}
