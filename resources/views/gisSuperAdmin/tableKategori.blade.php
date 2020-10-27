@extends('templates.home')
@section('title')
    Table Kategori
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
    @if(session()->has('gagal'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Warna</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->color }}</td>
                                <td><a class="btn btn-success" href="{{ route('listKategoriEdit', ['id' => $item->id]) }}"><i class="fas fa-edit text-white"></i></a></td>
                                <td><a class="btn btn-danger" href="{{  route('listKategoriHapus', ['id' => $item->id]) }}"><i class="far fa-trash-alt text-white"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
