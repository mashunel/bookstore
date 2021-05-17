<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo(){
        if (Auth::user()->isAdmin()) {
            return route('home');
        } else {
            return route('person.bookings.index');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
