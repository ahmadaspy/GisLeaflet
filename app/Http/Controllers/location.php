<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\User;

class location extends Controller
{
    public function show_location(Request $request){
        // berfungsi pada saat filter di cari
        if ($request->has('filter') ){
            $data = lokasi::where('kategori', $request->filter)->get();
            $data_filter_option = lokasi::select('kategori')->distinct()->get();
        }else{
        // load page pertama dilakukan
            $data = lokasi::all();
            $data_filter_option = lokasi::select('kategori')->distinct()->get();
        }
        return view('gis.gis', compact('data','data_filter_option'));
    }
    public function table_location(){
        $data = lokasi::simplePaginate(8);
        return view ('gis.tabel_lokasi', compact('data'));
    }
    public function edit_location($id){
        $data = lokasi::find($id);
        return view('gis.edit_location', compact('data'));
    }
}
