@extends('auth.baselogin')

@isset($genre)
    @section('title', 'Редактировать жанр ' . $genre->name)
@else
    @section('title', 'Создать новый жанр')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($genre)
            <h1>Редактировать Категорию <b>{{ $genre->name }}</b></h1>
                @else
                    <h1>Добавить Категорию</h1>
                @endisset

                <form method="POST" enctype="multipart/form-data"
                      @isset($genre)
                      action="{{ route('genres.update', $genre) }}"
                      @else
                      action="{{ route('genres.store') }}"
                    @endisset
                >
                    <div>
                        @isset($genre)
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
                                       value="{{ old('code', isset($genre) ? $genre->code : null) }}">
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
                                       value="@isset($genre){{ $genre->name }}@endisset">
                            </div>
                        </div>
                        <br>
                        <div class="input-group row">
                            <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                            <div class="col-sm-6">
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($genre){{ $genre->description }}@endisset</textarea>
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
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </form>
    </div>
@endsection