@extends('templates.AuthTemplates')
@section('title')
    Login
@endsection
@section('alert')
    @if(session()->has('gagal'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('gagal') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
@endsection
@section('form')
    <form class="user" action="/postlogin" method="POST">
        <div class="form-group">
            {{ csrf_field() }}
            <input required name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
        </div>
        <div class="form-group">
            <input required type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
        <hr>
    </form>
@endsection
