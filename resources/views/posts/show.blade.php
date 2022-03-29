@extends('layouts/app')
@section('content')
    <a href="/posts" class="btn btn-light">back</a>

    <h1>{{ $post->title }}</h1>
    <div class="col-md-4 col-sm-4">
        <img width="100%" src="\storage\cover_images\{{ $post->cover_image }}">
    </div>
    <br>
    <br>
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>Written on {{ $post->created_at }} last update on {{ $post->updated_at }} by {{ $post->user->name }}. </small>

    <hr>
    @if (!Auth::guest() && Auth::user()->name == $post->user->name)

        <a href="/posts/{{ $post->id }}/edit" class="btn btn-light">Edit</a>
        {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'float-right']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif

@endsection
