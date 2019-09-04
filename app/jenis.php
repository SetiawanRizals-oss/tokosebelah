<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table="jenis";
    protected $table=['kodeJenis','namaJenis','promoJenis','isDelete','tanggalHapus'];
}
