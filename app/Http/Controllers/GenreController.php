<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::get();
        return view('auth.genresadm', compact('genres'));
    }

    public function create()
    {
        return view('auth.genresform');
    }

    public function store(GenreRequest $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            $params['image'] = $request->file('image')->store('genres');
        }
        Genre::create($params);
        return redirect()->route('genres.index');
    }

    public function show(Genre $genre)
    {
        return view('auth.genresview', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('auth.genresform', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($category->image);
            $params['image'] = $request->file('image')->store('categories');
        }
        Genre::create($params);
        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
