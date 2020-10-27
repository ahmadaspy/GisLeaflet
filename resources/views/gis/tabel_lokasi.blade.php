@extends('templates.home')
@section('title')
    tabel data
@endsection
@section('costumestyle')
    <style>
        #aksi{
            text-align: center;
        }
    </style>
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tempat</th>
                        <th>Kategori</th>
                        <th>Garis Lintang</th>
                        <th>Garis Bujur</th>
                        <th colspan="3" id="aksi">aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $data->firstItem() + $key}}</td>
                        <td>{{ $item->nama_tempat }}</td>
                        <td>{{ $item->kategori->kategori }}</td>
                        <td>{{ $item->lat }}</td>
                        <td>{{ $item->longt }}</td>
                        <td><a href="/edit/{{ $item->id }}" class="btn btn-success">Edit</a></td>
                        <td><a href="/edit/detail/{{ $item->id }}" class="btn btn-primary">Edit Detail</a></td>
                        <td><a href="/hapus/{{ $item->id }}" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
