@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card bg-dark text-white shadow-lg">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif
                        <a href="/posts/create" class="btn btn-primary mb-2">Create post</a>
                        <h3 class="mb-2">Your Blog Posts</h3>
                        @if (count($posts))
                        <table class="table table-dark table-hover table-striped">


                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>


                        @foreach ($posts as $post)
                        <tr>
                            <td><a style="text-decoration: none; color:white" href="posts/{{$post->id}}">{{$post->title}}</a></td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a></td>
                            <td>{!! Form::open(['action'=> ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'DELETE', 'class'=>"float-right"]) !!}
                                {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
                                {!! Form::close() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have no posts</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
