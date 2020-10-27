<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\kategori;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SuperAdmin extends Controller
{
    // menampilkan input kategori di superadmin
    public function ViewInputKategori(){
        return view('gisSuperAdmin.InputKategoriView');
    }
    // menginputkan data baru kedalam database kategori
    public function InputKategori(Request $request){
        $data = kategori::create($request->all());
        return view('gisSuperAdmin.InputKategoriView')->with('sukses', 'data berhasil');
    }
    // menampilkan data dari database table User yang sudah terigester
    public function ViewTableUser(){
        $data = User::Paginate(10);
        return view('gisSuperAdmin.tabeluser', compact('data'));
    }
    // mendelete user dari superadmin
    public function TableUserDelete($id){
        $data = User::find($id);
        if($data->id == auth()->user()->id){
            Auth::logout();
            $query = $data->delete();
            return redirect()->route('home');
        }else{
            $query = $data->delete();
        }
        if($query){
            return redirect()->route('tabelUser')->with('sukses', 'Berhasi Dihapus');
        }else{
            return redirect()->route('tabelUser')->with('gagal', 'Gagal');
        }
    }
    // menampilkan input user dari superadmin menu
    public function ViewInputUser(){
        return view('gisSuperAdmin.inputUser');
    }
    // menginputkan data user baru kedalam database table User oleh superadmin
    public function InputUser(Request $request){
        $user = new User;
        $user->level = $request->level;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->email;
        $user->remember_token = Str::random(40);
        $query = $user->save();
        if($query){
            return redirect()->route('inputViewUser')->with('sukses', 'Data Berhasil Ditambahkan');
        }else{
            return redirect()->route('inputViewUser')->with('gagal', 'Gagal Ditambahkan');
        }
    }
    // menampilkan list kategori
    public function listKategori(){
        $data = Kategori::Paginate(10);
        return view('gisSuperAdmin.tableKategori', compact('data'));
    }
    // view edit dari kategori
    public function listKategoriEdit($id){
        $data = kategori::find($id);
        return view('gisSuperAdmin.editKategori', compact('data'));
    }
    // mengedit kategori
    public function listkategoriEditInput(Request $request){
        $data = kategori::find($request->id);
        $data->kategori = $request->kategori;
        $data->color = $request->color;
        $query = $data->save();
        if($query){
            return redirect()->route('listKategori')->with('sukses', 'Berhasil Di Update');
        }else{
            return redirect()->route('listKategori')->with('gagal', 'Gagal DI Update');
        }
    }
    // menhapus kategori
    public function listKategoriHapus($id){
        $data = kategori::find($id);
        $data->delete();
        return redirect()->route('listKategori')->with('sukses', 'Berhasil di hapus');
    }
}
