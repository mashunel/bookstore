@extends('base')

@section('title', $genre->name)

@section('content')
    <h1>
        {{$genre->name}} 
    </h1>
    <p>
        {{$genre->description}}
        Количество книг в данной категории: {{$genre->books->count()}} 
    </p>
    <div class="row">
        @foreach($genre->books as $book)
            @include('basebook', compact('book'))
        @endforeach
    </div>
@endsection