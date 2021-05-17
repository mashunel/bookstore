<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function catalog() {
        $books = Book::get();
        return view('catalog', compact('books'));
    }
    public function genres() {
        $genres = Genre::get();
        return view('genres', compact('genres'));
    }
    public function genre($code) {
        $genre = Genre::where('code', $code)->first();
        return view('genre', compact('genre'));
    }
    public function book($genre, $book = null) {
        $book = Book::get()->first();
        return view('book', ['book' => $book]);
    }
}
