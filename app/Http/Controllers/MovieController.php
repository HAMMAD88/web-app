<?php
// MovieController.php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resource\MovieResource;
class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('poster')->get();

        return view('movies', ['movies' => $movies]);
    }
    public function store(Request $request)
    {
        
        
        $validatedData = $request->validate([
            'movie_name' => 'required',
            'director' => 'required',
            'year' => 'required|integer|min:1888|max:'.date('Y'),
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
    public function destroy(Movie $movie)
{
    // Check if the authenticated user is an admin
    if (Auth::user()->name == 'Hammad') {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    } else {
        return redirect()->route('movies.index')->with('error', 'You do not have permission to delete movies');
    }
}



}
