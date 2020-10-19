<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    protected $table = 'detail_lokasi';
    protected $fillable = ['judul', 'deskripsi'];
    protected $guard = [];
    public function lokasi(){
        return $this->belongsTo(lokasi::class);
    }
}
