<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class lokasi extends Model
{
    protected $table='lokasi';
    protected $fillable = ['nama_tempat', 'kategori','lat', 'longt'];
}
