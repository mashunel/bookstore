<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="Public/js/app.js" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymouss -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('catalog')}}"> I Love Books Store </a>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @admin
                    <li ><a href="{{ route('genres.index') }}">Категории</a></li>
                    <li ><a href="{{ route('books.index') }}">Товары</a></li>
                    <li ><a href="{{ route('home') }}">Заказы</a></li>
                    @else
                    <li ><a href="{{ route('catalog') }}">Каталог</a></li>
                    <li ><a href="{{ route('genres') }}">Жанры</a></li>
                    <li ><a href="{{ route('basket') }}">Корзина</a></li>
                    @endadmin
                </ul>

                @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                        </li>
                    </ul>
                @endguest

                @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                        @admin
                        <li ><a href="{{ route('catalog') }}">Вернуться на сайт</a></li>
                        <li><a href="{{ route('get-logout') }}">Выйти</a></li>
                        @else
                        <li><a href="{{ route('person.bookings.index') }}">Мои заказы</a></li>
                        <li><a href="{{ route('get-logout') }}">Выйти</a></li>
                        @endadmin
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>