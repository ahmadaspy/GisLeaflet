@extends('templates.home')
@section('title')
    Data User
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
    <form id="form" class="user" action="{{ route('editProfile') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" value="{{ $data->id }} " name="id">
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Your Name" value="{{ $data->name }}" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" value="{{ $data->email }}" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" name="password" class="form-control form-control-user" id="password1" placeholder="Password" required>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" required>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">Update</button>
        <button class="btn btn-danger btn-user btn-block" type="Reset">Reset</button>
    </form>
@endsection
