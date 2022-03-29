@extends('layouts/app')
@section('content')

        <h1>{{ $title }}</h1>
        @if (count($serveses))
            <ul class="list-group">
                @foreach ($serveses as $service)
                    <li class="list-group-item">{{ $service }}</li>
                @endforeach
            </ul>
        @endif

@endsection
