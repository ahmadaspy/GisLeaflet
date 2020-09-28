<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\User;

class location extends Controller
{
    public function show_location(){
        $data = lokasi::all();

        return view('gis.gis', compact('data'));
    }
}
