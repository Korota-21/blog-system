@extends('layouts/app')
@section('content')
    <div class="card bg-dark shadow-lg text-white">
        <div class="card-header">
            <h1>Posts</h1>
            <div>
                <div class="card-body">

                    @if (count($posts) > 0)
                        @foreach ($posts as $post)

                            <div class="card mb-2 p-2 text-dark">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <img width="100%" src="\storage\cover_images\{{ $post->cover_image }}">
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                                        <small>Written on {{ $post->created_at }} last update on {{ $post->updated_at }}
                                            by
                                            {{ $post->user->name }}</small>
                                    </div>
                                </div>

                            </div>

                        @endforeach
                        {{ $posts->links('pagination::bootstrap-4') }}

                    @else
                        <p>No posts found</p>
                    @endif
                </div>
            </div>
        @endsection
