@extends('templates.home')
@section('title')
    Detail Edit
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            {{ $data->lokasi->nama_tempat }}
        </div>
        <div class="card-body">
            <form action="/edit/detail" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $data->judul }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8">{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                </div>
                <div class="form-group">
                    <label for="link_video">Link Video</label>
                    <input class="form-control" type="text" id="link_video" name="link_video" value="{{ $data->link_video }}">
                </div>
                <div class="form-group">
                    <label for="gambar_1">Gambar 1</label>
                    <input type="file" class="form-control-file" id="gambar_1" name="gambar_1">
                </div>
                <div class="form-group">
                    <label for="gambar_2">Gambar 2</label>
                    <input type="file" class="form-control-file" id="gambar_2" name="gambar_2">
                </div>
                <div class="form-group">
                    <label for="gambar_3">Gambar 3</label>
                    <input type="file" class="form-control-file" id="gambar_3" name="gambar_3">
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </form>
        </div>
    </div>
@endsection
