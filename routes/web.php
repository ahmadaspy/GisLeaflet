<?php

use App\Http\Controllers\AuthController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Whoops\RunInterface;
use Whoops\Util\TemplateHelper;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', 'location@show_location')->name('home');
Route::get('/detail/{id}', 'location@detail');
Route::get('/login', 'AuthController@loginview')->name('login');
Route::post('/postlogin', 'AuthController@postLogin');
Route::get('/register', 'AuthController@regiseterview')->name('register');
Route::post('/postRegister', 'AuthController@postRegister');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/profile/edit', 'AuthController@editProfile')->name('editProfile');

Route::group(['middleware' => ['auth', 'checkLevel:admin,superadmin']], function(){
    Route::get('/edit/{id}', 'location@edit_location');
    Route::get('/edit/detail/{id}', 'location@edit_detail');
    Route::post('/edit/detail', 'location@edit_detail_data');
    Route::get('/input', 'location@input')->name('input');
    Route::post('/input_data', 'location@input_data');
    Route::Post('/edit', 'location@edit');
    Route::get('/hapus/{id}', 'location@hapus');
    Route::get('/data', 'location@table_location')->name('tabeldata');
    Route::get('/profile/{id}', 'AuthController@profileView')->name('profile');
});

Route::group(['middleware' => ['auth', 'checkLevel:superadmin']], function(){
    Route::get('/list/kategori', 'SuperAdmin@listKategori')->name('listKategori');
    Route::get('/list/kategori/hapus/{id}', 'SuperAdmin@listKategoriHapus')->name('listKategoriHapus');
    Route::get('/list/kategori/edit/{id}', 'SuperAdmin@listKategoriEdit')->name('listKategoriEdit');
    Route::post('/list/kategori/edit/input', 'SuperAdmin@listkategoriEditInput')->name('editInputKategori');
    Route::get('/input/kategori', 'SuperAdmin@ViewInputKategori')->name('inputKategori');
    Route::post('/input/data/kategori', 'SuperAdmin@InputKategori');
    Route::get('/tabel/user', 'SuperAdmin@ViewTableUser')->name('tabelUser');
    Route::get('/tabel/user/delete/{id}', 'SuperAdmin@TableUserDelete')->name('userDelete');
    Route::get('/input/data/user', 'SuperAdmin@ViewInputUser')->name('inputViewUser');
    Route::post('/input/data/user', 'SuperAdmin@InputUser')->name('inputUser');
});



