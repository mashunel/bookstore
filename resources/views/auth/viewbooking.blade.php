@extends('auth.baselogin')

@section('title', 'Заказ ' . $booking->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $booking->id }}</h1>
                    <p>Заказчик: <b>{{ $booking->name }}</b></p>
                    <p>Номер теелфона: <b>{{ $booking->phone }}</b></p>
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
                        @foreach ($booking->books as $book)
                            <tr>
                                <td>
                                    <a href="{{ route('book', $book) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($book->image) }}">
                                        {{ $book->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1</span></td>
                                <td>{{ $book->price }} руб.</td>
                                <td>{{ $book->getPriceForCount()}} руб.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $booking->getFullPrice() }} руб.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection