@extends('base')

@section('title', 'Жанры')

@section('content')
    <div class="row">
    @foreach($genres as $genre)
        <div class="col-md-4">
            <a href="{{ route('genre', $genre->code) }}">
                <img src="{{ Storage::url($genre->image) }}" height='200px'">
                <h2>{{ $genre->name }}</h2>
            </a>
            <p>
                {{ $genre->description }}
            </p>
        </div>
    @endforeach
    </div>
@endsection