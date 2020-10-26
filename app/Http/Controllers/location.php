<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\User;
use App\kategori;
use Carbon\Carbon;
use App\detail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class location extends Controller
{
    // load home page pertama
    public function show_location(Request $request){
        $data_kategori = kategori::all();
        // berfungsi pada saat filter di cari
        if ($request->has('filter') ){
            $data = lokasi::where('kategori_id', $request->filter)->get();
            if($data->count() > 0){
                foreach($data as $datas){
                    $color[] = $datas->kategori->color;
                }
            }else{
                $color[] = (array)null;
            }

        }else{
        // load page pertama dilakukan
            $data = lokasi::all();
            if($data->count() > 0){
                foreach($data as $datas){
                    $color[] = $datas->kategori->color;
                }
            }else{
                $color[] = (array)null;
            }

        }
        return view('gis.gis', compact('data', 'data_kategori', 'color'));
    }

    // menampilkan halaman detail
    public function detail($id){
        $data = lokasi::find($id);
        $paragraph = str_replace("\r", "<br/>", $data->detail->deskripsi);
        return view('gis.detail', compact('data', 'paragraph'));
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

    // menampilkan halam edit detail pada admin
    public function edit_detail($id){
        $data = detail::find($id);
        return view('gis.edit_detail', compact('data'));
    }

    // store dan edit, edit data detail
    public function edit_detail_data(Request $request){
        // membuat sebuah validate untuk upload file hanya jpeg, jpg, dan png
        $rules = ['gambar_1' => 'mimes:jpeg,png,jpg |max:4096', 'gambar_2' => 'mimes:jpeg,png,jpg |max:4096', 'gambar_3' => 'mimes:jpeg,png,jpg |max:4096'];
        $customMessages = ['mimes' => 'Harus jpeg atau png'];
        $validate = $this->validate($request, $rules, $customMessages);

        // mensave data detail dari request
        $data = detail::find($request->id);
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->link_video = $request->link_video;
        $data->save();
        // menimpa gambar yg sudah ada dengan gambar terbaru jika belum ada akan menstore data gambar ke public/storage
        if($request->hasFile('gambar_1')){
            Storage::disk('public')->delete([$data->gambar_1]);
            $gambar = Storage::disk('public')->put('images/'.$data->lokasi->nama_tempat, $request->gambar_1);
            $data->gambar_1 = $gambar;
            $data->save();
        }
        if($request->hasFile('gambar_2')){
            Storage::disk('public')->delete([$data->gambar_2]);
            $gambar = Storage::disk('public')->put('images/'.$data->lokasi->nama_tempat, $request->gambar_2);
            $data->gambar_2 = $gambar;
            $data->save();
        }
        if($request->hasFile('gambar_3')){
            Storage::disk('public')->delete([$data->gambar_3]);
            $gambar = Storage::disk('public')->put('images/'.$data->lokasi->nama_tempat, $request->gambar_3);
            $data->gambar_3 = $gambar;
            $data->save();
        }
        return redirect()->route('tabeldata')->with('sukses', 'data berhasil');

    }

    // menghapus data di dalam tabel dan database
    public function hapus($id){
            $data = lokasi::find($id);
            Storage::disk('public')->deleteDirectory('images/'.$data->nama_tempat);
            lokasi::where('id', $id)->delete();
            return redirect()->route('tabeldata')->with('sukses', 'data berhasil di hapus');
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
            $data_detail = detail::insert(['lokasi_id' => $data->id]);
            return redirect()->route('input')->with('sukses', 'data berhasil di tambahkan');
        }else{
            return redirect()->route('input')->with('gagal', 'data gagal di inputkan');
        }

    }
}
