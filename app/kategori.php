<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = "list_kategori";
    protected $guarded = [];

    public function lokasi(){
        return $this->hasMany(lokasi::class);
    }
}
