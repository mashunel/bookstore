<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return view('auth.bookadm', compact('books'));
    }

    public function create()
    {
        $genres = Genre::get();
        return view('auth.bookform', compact('genres'));
    }

    public function store(BookRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('books');
        }
        Book::create($params);
        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('auth.bookview', compact('book'));
    }

    public function edit(Book $book)
    {
        $genres = Genre::get();
        return view('auth.bookform', compact('book', 'genres'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($book->image);
            $params['image'] = $request->file('image')->store('books');
        }
        Book::create($params);
        return redirect()->route('book.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
