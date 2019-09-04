<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    protected $table="toko";
    protected $fillable=['kodeToko','namaToko','ratingToko','isDelete','tanggalHapus'];
}
