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
                    <textarea class="form-control" id="deskripsi" name="deskrips" rows="8">{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <div class="form-group col-4">
                            <input type="file" class="form-control-file" name="gambar_1" value="">
                        </div>
                        <div class="form-group col-4" >
                            <input type="file" class="form-control-file" name="gambar_2" value="">
                        </div>
                        <div class="form-group col-4">
                            <input type="file" class="form-control-file" name="gambar_3" value="">
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="link_video">Link Video</label>
                    <input class="form-control" type="text" id="link_video" name="link_video">
                </div> --}}
                <button class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </form>
        </div>
    </div>
@endsection
