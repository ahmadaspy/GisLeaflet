<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    protected $table = 'detail_lokasi';
    // protected $fillable = ['lokasi_id', 'judul', 'deskripsi', 'link_video'];
    protected $guard = [];
    public function lokasi(){
        return $this->belongsTo(lokasi::class);
    }
}
