<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket() {
        $bookingId = session('bookingId');
        if (!is_null($bookingId)) {
            $booking = Booking::findOrFail($bookingId);
            return view('basket', compact('booking'));
        }
        return view('basket');
    }

    public function basketConfirm(Request $request) {
        $bookingId = session('bookingId');
        if (is_null($bookingId)) {
            return redirect()->route('catalog');
        }
        $booking = Booking::find($bookingId);
        $success = $booking->saveBooking($request->name, $request->phone);

        if ($success) {
            session()->flash('success', 'Мы приняли ваш заказ, ожидайте, пожалуйста!');
        } else {
            session()->flash('warning', 'Ошибка');
        }

        return redirect()->route('catalog');
    }   

    public function basketPlace() {
        $bookingId = session('bookingId');
        if (is_null($bookingId)) {
            return redirect()->route('catalog');
        }
        $booking = Booking::find($bookingId);
        return view('booking', compact('booking'));
    }

    public function basketAdd($bookId)
    {
        $bookingId = session('bookingId');
        if (is_null($bookingId)) {
            $booking = Booking::create();
            session(['bookingId' => $booking->id]);
        } else {
            $booking = Booking::find($bookingId);
        }
        if ($booking->books->contains($bookId)) {
            $pivotRow = $booking->books()->where('book_id', $bookId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $booking->books()->attach($bookId);
        }
        if (Auth::check()) {
            $booking->user_id = Auth::id();
            $booking->save();
        }
        $book = Book::find($bookId);
        session()->flash('success', 'Добавен экземпляр книги: ' . $book->name);
        return redirect()->route('basket');
    }

    public function basketDelete($bookId) {
        $bookingId = session('bookingId');
        if (is_null($bookingId)) {
            return redirect()->route('basket');
        }
        $booking = Booking::find($bookingId);
        if ($booking->books->contains($bookId)) {
            $pivotRow = $booking->books()->where('book_id', $bookId)->first()->pivot;
            if ($pivotRow->count < 2){
                $booking->books()->detach($bookId);
            } else{
                $pivotRow->count--;
                $pivotRow->update(); 
            }  
        }
         
        $book = book::find($bookId);
        session()->flash('warning', 'Удален экземпляр книги: ' . $book->name);
        return redirect()->route('basket');
    }
}
