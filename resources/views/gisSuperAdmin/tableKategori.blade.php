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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th colspan="2">Aksi</th>
                            <th>Nama Kategori</th>
                            <th>Warna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td><a class="btn btn-success" href="#"><i class="fas fa-edit text-white"></i></a></td>
                                <td><a class="btn btn-danger" href="#"><i class="far fa-trash-alt text-white"></i></a></td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->color }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
