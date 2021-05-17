@extends('auth.baselogin')

@isset($book)
    @section('title', 'Редактировать ' . $book->name)
@else
    @section('title', 'Добавить книгу')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($book)
            <h1>Редактировать книгу <b>{{ $book->name }}</b></h1>
        @else
            <h1>Добавить книгу</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($book)
              action="{{ route('books.update', $book) }}"
              @else
              action="{{ route('books.store') }}"
            @endisset
        >
            <div>
                @isset($book)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                        value="{{ old('code', isset($book) ? $book->code : null) }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($book){{ $book->name }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="genre_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="genre_id" id="genre_id" class="form-control">
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}"
                                @isset($book)
                                    @if($book->genre_id == $genre->id)
                                        selected
                                        @endif
                                    @endisset
                                >{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
								<textarea name="description" id="description" cols="72"
                                          rows="7">@isset($book){{ $book->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="price" id="price"
                               value="@isset($book){{ $book->price }}@endisset">
                    </div>
                </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection