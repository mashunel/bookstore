<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function books()
    {
        return $this->belongsToMany(Book::class, 'booking_book')->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->books as $book) {
            $sum += $book->getPriceForCount();
        }
        return $sum;
    }
    
    public function saveBooking($name, $phone)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('bookingId');
            return true;
        } else {
            return false;
        }
    }
}
