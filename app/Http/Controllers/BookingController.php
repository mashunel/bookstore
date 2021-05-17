<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $bookings = Auth::user()->bookings()->where('status', 1)->get();
        return view('auth.admpanel', compact('bookings'));
    }

    public function viewbooking(Booking $booking)
    {
        if (!Auth::user()->bookings->contains($booking)) {
            return back();
        }
        return view('auth.viewbooking', compact('booking'));
    }
}
