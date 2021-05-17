@extends('base')

@section('title', 'Корзина')

@section('content')
    <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($booking->books as $book)
                <tr>
                    <td>
                        <a href="{{route('book', [$book->genre->code, $book->code])}}">
                            <img height="56px" src="{{ Storage::url($book->image) }}">
                            {{ $book->name }}
                        </a>
                    </td>
                    <td><span class="badge">{{ $book->pivot->count }}</span>
                        <div class="btn-group form-inline">
                            <form action="{{ route('basket-delete', $book) }}" method="POST">
                                <button type="submit" class="btn btn-danger" href=""><span
                                    class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                            <form action="{{ route('basket-add', $book) }}" method="POST">
                                <button type="submit" class="btn btn-success" href=""><span
                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                @csrf
                            </form>
                        </div>
                    </td>
                    <td>{{ $book->price }} руб.</td>
                    <td>{{ $book->getPriceForCount() }} руб.</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость:</td>
                <td>{{ $booking->getFullPrice() }}</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">Оформить заказ</a>
        </div>
    </div>
@endsection