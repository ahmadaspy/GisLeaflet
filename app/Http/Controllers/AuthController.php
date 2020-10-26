<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    // menampilkan view form login
    public function loginview(){
        return view('Auth.login');
    }
    // authentication untuk login user
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('home');
        }
        return redirect('/login')->with('gagal','Anda tidak terdaftar');
    }
    // menampilkan view form register
    public function regiseterview(){
        return view('Auth.register');
    }
    // post untuk membuat user baru untuk level user biasa
    public function postRegister(Request $request){
        $user = new User;
        $user->level = 'user';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->remember_token = Str::random(40);
        $user->save();
        Auth::login($user);
        return redirect()->route('home');
    }
    // logout semua user, dari user, admin, superadmin
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    // menampilkan user profile dimana data di ambikan dan bisa di edit
    public function profileView($id){
        $data = User::find($id);
        return view('Auth.EditUser', compact('data'));
    }
    // pengeditan user profile dengan tidak mengubah level
    public function editProfile(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $query = $user->save();
        if($query){
            return redirect()->route('profile', ['id' => $request->id])->with('sukses', 'Berhasil Di Update');
        }else{
            return redirect()->route('profile', ['id' => $request->id])->with('gagal', 'Gagal Di Update');
        }
    }
}
