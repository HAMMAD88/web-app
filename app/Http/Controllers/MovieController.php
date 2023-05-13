<?php
// MovieController.php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Poster;
use Illuminate\Http\Request;
class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('poster')->get();

        return view('movies', ['movies' => $movies]);
    }
    public function store(Request $request)
    {
        // $movie = new Movie;
        // $movie->movie_name = $request->movie_name;
        // $movie->director = $request->director;
        // $movie->year = $request->year;
        // $movie->save();
        
        $validatedData = $request->validate([
            'movie_name' => 'required',
            'director' => 'required',
            'year' => 'required',
            // 'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $movie = Movie::create($validatedData);
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('posters', $filename, 'public');
    
            Poster::create([
                'movie_id' => $movie->id,
                'poster_url' => '/storage/' . $filePath
            ]);
        }
        // Redirect or return a response
        return redirect()->route('movies.index');
        
    }
}
