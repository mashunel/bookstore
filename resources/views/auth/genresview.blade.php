@extends('auth.baselogin')

@section('title', 'Жанр: ', $genre->name)

@section('content')
<div class="col-md-12">
        <h1>Категория Бытовая техника</h1>
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
                <td>{{ $genre->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $genre->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $genre->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $genre->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($genre->image) }}" height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $genre->books->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection