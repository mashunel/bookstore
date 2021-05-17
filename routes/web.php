<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'client',
        'as' => 'person.',
    ], function () {
        Route::get('/bookings', 'App\Http\Controllers\BookingController@index')->name('bookings.index');
        Route::get('/bookings/{booking}', 'App\Http\Controllers\BookingController@viewbooking')->name('bookings.clientView');
    });
    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::group([ 'middleware' => 'is_admin'], function () {
            Route::get('/bookings', 'App\Http\Controllers\BookingController@index')->name('home');
            Route::get('/bookings/{booking}', 'App\Http\Controllers\BookingController@viewbooking')->name('bookings.adminView');
        });
        Route::resource('genres', 'App\Http\Controllers\GenreController');
        Route::resource('books', 'App\Http\Controllers\BookController');
    });
});

Route::get('/', 'App\Http\Controllers\MainController@catalog')->name('catalog');
Route::get('/genres', 'App\Http\Controllers\MainController@genres')->name('genres');

Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
    Route::group([
        'middleware' => 'empty_basket',
    ], function () {
        Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
        Route::get('/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
        Route::post('/delete/{id}', 'App\Http\Controllers\BasketController@basketDelete')->name('basket-delete');
        Route::post('/place', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
    });
});

Route::get('/{genre}', 'App\Http\Controllers\MainController@genre')->name('genre');
Route::get('/{genre}/{book?}', 'App\Http\Controllers\MainController@book')->name('book');