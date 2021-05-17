<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Booking;
use Illuminate\Http\Request;

class EmptyBasket
{
    public function handle(Request $request, Closure $next)
    {
        $bookingId = session('bookingId');
        if (!is_null($bookingId)) {
            $booking = Booking::findOrFail($bookingId);
            if ($booking->books->count() == 0) {
                session()->flash('warning', 'Ваша корзина пуста!');
                return redirect()->route('catalog');
            } else {
                return $next($request);
            }
        } else {
            session()->flash('warning', 'Ваша корзина пуста!');
            return redirect()->route('catalog');
        }
    }
}
