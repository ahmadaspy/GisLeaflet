<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class lokasi extends Model
{
    protected $table='lokasi';
    protected $fillabe = ['nama_tempat', 'lat', 'longt'];
}
