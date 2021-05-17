@extends('auth.baselogin')

@section('title', 'Жанры')

@section('content')
    <div class="col-md-12">
        <h1>Категории</h1>
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
                    Действия
                </th>
            </tr>
            @foreach($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->code }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('genres.destroy', $genre) }}" method="POST">
                                <a class="btn btn-warning" type="button" href="{{ route('genres.show', $genre) }}">Открыть</a>
                                <a class="btn btn-info" type="button" href="{{ route('genres.edit', $genre) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('genres.create') }}">Добавить категорию</a>
    </div>
@endsection