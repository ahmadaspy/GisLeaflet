@extends('templates.home')
@section('title')
    tabel data
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th colspan="2">aksi</th>
                    <th>Nama Tempat</th>
                    <th>Kategori</th>
                    <th>Garis Lintang</th>
                    <th>Garis Bujur</th>
                </tr>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $data->firstItem() + $key}}</td>
                    <td><a href="/edit/{{ $item->id }}" class="btn btn-success">Edit</a></td>
                    <td><a href="/hapus/{{ $item->id }}" class="btn btn-danger">Hapus</a></td>
                    <td>{{ $item->nama_tempat }}</td>
                    <td>{{ $item->kategori->kategori }}</td>
                    <td>{{ $item->lat }}</td>
                    <td>{{ $item->longt }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
