@extends('templates.home')
@section('title')
    Kategori Edit
@endsection
@section('content')
@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<div class="card shadow mb-4">
    <div class="card-header">
        Edit Kategori
    </div>
    <div class="card-body">
        <form action="{{ route('editInputKategori') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $data->id }}" name="id">
            <div class="form-group">
                <label for="kategori">Nama Kategori</label>
                <input id="kategori" type="text" class="form-control" name="kategori" value="{{ $data->kategori }}" required>
            </div>
            <div class="form-group">
                <label for="color">Pilih warna</label>
                <input id="color" class="form-control" type="color" name="color" value="{{ $data->color }}" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</div>
@endsection
