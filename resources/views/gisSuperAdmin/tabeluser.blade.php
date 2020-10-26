@extends('templates.home')
@section('title')
    Tabel User
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
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
    </div>
    <div class="card-body">
        <div class="overflow-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama</th>
                        <th>E-mail</th>
                        <th>Level</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td><a href="{{ route('userDelete', ['id' => $item->id]) }}" class="btn btn-danger"><i class="far fa-trash-alt text-white"></a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            @if ($item->level == 'user')
                                <td class="bg-secondary text-white">{{ $item->level }}</td>
                            @endif
                            @if ($item->level == 'admin')
                                <td class="bg-primary text-white">{{ $item->level }}</td>
                            @endif
                            @if ($item->level == 'superadmin')
                                <td class="bg-success text-white">{{ $item->level }}</td>
                            @endif
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
