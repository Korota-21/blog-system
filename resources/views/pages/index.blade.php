@extends('layouts/app')

@section('content')
<div class="jumbotron text-center bg-dark text-white">
    <h1>Welcome To BlogSystem!</h1>
    <p>This a laravel application works as blog and posting system</p>
    <p class="pt-5"><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
</div>
@endsection
