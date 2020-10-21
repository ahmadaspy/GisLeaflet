<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\kategori;

class SuperAdmin extends Controller
{
    public function ViewInputKategori(){
        return view('gisSuperAdmin.InputKategoriView');
    }

    public function InputKategori(Request $request){
        $data = kategori::create($request->all());
        return view('gisSuperAdmin.InputKategoriView')->with('sukses', 'data berhasil');
    }
}
