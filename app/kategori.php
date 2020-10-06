<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = "list_kategori";
    protected $fillable = ['kategori'];

    public function lokasi(){
        return $this->hasMany(lokasi::class);
    }
}
