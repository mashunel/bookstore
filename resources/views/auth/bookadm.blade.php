@extends('auth.baselogin')

@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id}}</td>
                    <td>{{ $book->code }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->genre->name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('books.destroy', $book) }}" method="POST">
                                <a class="btn btn-warning" type="button" href="{{ route('books.show', $book) }}">Открыть</a>
                                <a class="btn btn-info" type="button" href="{{ route('books.edit', $book) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button" href="{{ route('books.create') }}">Добавить товар</a>
    </div>
@endsection