@extends('layouts/app')
@section('content')
    <a href="/posts/{{ $post->id }}" class="btn btn-dark mb-1">back</a>

    <div class="card bg-dark text-white shadow-lg">

        <div class="card-header">
            <h1>Edit</h1>
            <div>
                <div class="card-body">
                    <!-- the update function require a PUT|PATCH method you can chack it with [php artisan route:list] -->
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('body', 'Body') }}
                        {!! Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body content']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('cover_image') !!}
                    </div>
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
