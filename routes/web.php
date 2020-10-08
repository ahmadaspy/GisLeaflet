<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'location@show_location');
Route::get('/detail/{id}', 'location@detail');


Route::get('/data', 'location@table_location')->name('tabeldata');

Route::get('/edit/{id}', 'location@edit_location');
Route::get('/input', 'location@input')->name('input');
Route::post('/input_data', 'location@input_data');
Route::Post('/edit', 'location@edit');
Route::get('/hapus/{id}', 'location@hapus');

