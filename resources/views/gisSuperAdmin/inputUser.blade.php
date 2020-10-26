@extends('templates.home')
@section('title')
    Input User
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
            <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('inputUser') }}" method="POST">
                @csrf
                <small class="float-right font-italic">Default passowrd akan disamakan dengan email</small>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="" disable selected>Pilih Level</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Super Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
@endsection
