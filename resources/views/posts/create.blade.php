@extends('layouts/app')
@section('content')


    <div class="card bg-dark text-white shadow-lg">

        <div class="card-header">
            <h1>Create</h1>
            <div>
                <div class="card-body">

                    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST' ,'enctype' =>'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::label('title', 'Title') }}
                        {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('body', 'Body') }}
                        {!! Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body content']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('cover_image') !!}
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @endsection
