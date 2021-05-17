@extends('base')

@section('title', 'Каталог')

@section('content')
    <h1>Все товары</h1>
    <div class="row">
        @foreach($books as $book)
            @include('basebook', compact('book'))
        @endforeach
    </div>
@endsection