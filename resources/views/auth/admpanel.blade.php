@extends('auth.baselogin')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Когда отправлен
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id}}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->phone }}</td>
                    <td>{{ $booking->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $booking->getFullPrice() }} руб.</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                                @admin
                                href="{{ route('bookings.adminView', $booking) }}"
                                @else
                                href="{{ route('person.bookings.clientView', $booking) }}"
                                @endadmin
                            >Открыть</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection