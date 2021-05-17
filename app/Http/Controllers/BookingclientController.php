<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingclientController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('status', 1)->get();
        return view('auth.admpanel', compact('bookings'));
    }

    public function viewbooking(Booking $booking)
    {
        return view('auth.viewbooking', compact('booking'));
    }
}
