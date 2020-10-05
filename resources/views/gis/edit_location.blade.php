@extends('templates.home')
@section('title')
{{ $data->name }}
@endsection
@section('content')
<div class="section">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{ $data->name }}
        </div>
        <div class="card-body">
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama_tempat">Nama Tempat</label>
                    <input id="nama_tempat" class="form-control" value="{{ $data->nama_tempat }}">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori">
                        @foreach ($data_kategori as $item)
                            <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lat">Garis Lintang</label>
                    <input value="{{ $data->lat }}" id="lat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="longt">Garis Bujur</label>
                    <input value="{{ $data->longt }}" id="longt" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>
@endsection
