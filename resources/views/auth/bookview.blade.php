@extends('auth.baselogin')

@section('title', $book->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $book->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $book->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $book->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $book->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $book->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($genre->image) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $book->genre->name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection