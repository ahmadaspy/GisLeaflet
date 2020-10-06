<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class lokasi extends Model
{
    protected $table='lokasi';
    protected $fillable = ['nama_tempat', 'kategori_id','lat', 'longt'];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }
}
