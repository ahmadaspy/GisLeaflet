@extends('templates.home')
@section('title')
    Input Kategori
@endsection
@section('content')
    @if(session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('sukses') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header">
            Input Kategori
        </div>
        <div class="card-body">
            <form action="/input/data/kategori" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kategori">Nama Kategori</label>
                    <input id="kategori" type="text" class="form-control" name="kategori">
                </div>
                <div class="form-group">
                    <label for="color">Pilih warna</label>
                    <input id="color" class="form-control" type="color" name="color">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
@endsection
