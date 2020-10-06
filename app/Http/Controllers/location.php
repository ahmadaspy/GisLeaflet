<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\User;
use App\kategori;

class location extends Controller
{
    public function show_location(Request $request){
        $data_kategori = kategori::all();
        // berfungsi pada saat filter di cari
        if ($request->has('filter') ){
            $data = lokasi::where('kategori_id', $request->filter)->get();

        }else{
        // load page pertama dilakukan
            $data = lokasi::all();
        }
        return view('gis.gis', compact('data', 'data_kategori'));
    }

    // menampilkan data tabel ke halaman admin
    public function table_location(){
        $data = lokasi::simplePaginate(8);
        return view ('gis.tabel_lokasi', compact('data'));
    }

    // menampilan halaman edit lokasi pada admin
    public function edit_location($id){
        $data = lokasi::find($id);
        $data_kategori = kategori::all();
        return view('gis.edit_location', compact('data','data_kategori'));
    }
    // memasukan data edit kedalam database
    public function edit(Request $request){
        $data = lokasi::where('id', $request->id)->update(['kategori_id' => $request->kategori_id, 'nama_tempat' => $request->nama_tempat, 'lat'=> $request->lat,'longt' => $request->longt]);
        return redirect()->route('tabeldata');
    }

    // menghapus data di dalam tabel dan database
    public function hapus($id){
            lokasi::where('id', $id)->delete();
            return redirect()->route('tabeldata');
    }

    // menampilkan halaman input data dan mengambil data list kategori di model kateogri
    public function input(){
        $data_kategori = kategori::all();
        return view('gis.input_data', compact('data_kategori'));
    }
    // input data lokasi di halaman admin
    public function input_data(Request $request){
        $data = lokasi::create($request->all());
        if($data->exists){
            return redirect()->route('input')->with('sukses', 'data berhasil di tambahkan');
        }else{
            return redirect()->route('input')->with('gagal', 'data gagal di inputkan');
        }

    }
}
