<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieList extends Component
{
    public $movieName;
    public $directorName;
    public $year;

    public function render()
    {
        $movies = Movie::all();

        return view('livewire.movie-list', compact('movies'));
    }

    public function addMovie()
    {
        $this->validate([
            'movieName' => 'required',
            'directorName' => 'required',
            'year' => 'required|numeric',
        ]);

        Movie::create([
            'movie_name' => $this->movieName,
            'director' => $this->directorName,
            'year' => $this->year,
        ]);

        // Reset the input fields after adding the movie
        $this->reset(['movieName', 'directorName', 'year']);
    }

}

