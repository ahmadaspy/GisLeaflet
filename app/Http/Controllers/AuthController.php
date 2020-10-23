<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    public function loginview(){
        return view('Auth.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('home');
        }
        return redirect('/login')->with('gagal','Anda tidak terdaftar');
    }

    public function regiseterview(){
        return view('Auth.register');
    }
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

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
