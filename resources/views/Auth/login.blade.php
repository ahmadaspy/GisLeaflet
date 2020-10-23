@extends('templates.AuthTemplates')
@section('title')
    Login
@endsection
@section('form')
    <form class="user" action="/postlogin" method="POST">
        <div class="form-group">
            {{ csrf_field() }}
            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
        <hr>
    </form>
@endsection
