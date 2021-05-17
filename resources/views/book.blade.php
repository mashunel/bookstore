@extends('base')

@section('title', 'Книга')

@section('content')
    <h1>{{ $book->name }}</h1>
    <p>Цена: <b>{{$book->price}} руб.</b></p>
    <img src="{{ Storage::url($book->image) }}" height='200px'><br>
    <p>{{ $book->description }}</p>
    <form action="{{ route('basket-add', $book) }}" method="POST">
        <button type="submit" class="btn btn-success" role="button">В корзину</button>
        @csrf
    </form>
@endsection