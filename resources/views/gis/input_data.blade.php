@extends('templates.home')
@section('title')
    Input Data
@endsection
@section('content')
    <div class="container">
        @if(session()->has('sukses'))
            <div class="alert alert-success">
                {{ session()->get('sukses') }}
            </div>
        @elseif(session()->has('gagal'))
            <div class="alert alert-danger">
                {{ session()->get('gagal') }}
            </div>
        @endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input</h6>
        </div>
        <div class="card-body">
            <div id="map">

            </div>
            <div class="container">
                <form action="input_data" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama_tempat">Nama Tempat</label>
                        <input type="text" id="nama_tempat" class="form-control" name="nama_tempat" >
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            @foreach ($data_kategori as $item)
                                <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="lat">Garis Lintang</label>
                            <div class="form-group">
                                <input type="text" name="lat" id="lat" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="longt">Garis Bujur</label>
                                <input type="text" name="longt" id="longt" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>

        </div>

    </div>

@endsection
