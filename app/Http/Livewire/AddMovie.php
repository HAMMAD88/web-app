<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class AddMovie extends Component
{
    public $movieName;
    public $directorName;
    public $year;

    public function render()
    {
        return view('livewire.add-movie');
    }

    public function addMovie()
    {
        // $this->validate([
        //     'movieName' => 'required',
        //     'directorName' => 'required',
        //     'year' => 'required|numeric',
        // ]);
        
        // $validatedData = $this->validate([
        //     'movieName' => 'required',
        //     'directorName' => 'required',
        //     'year' => 'required',
        // ]);

       $model = Movie::create([
            'movie_name' => $this->movieName,
            'director' => $this->directorName,
            'year' => $this->year,
        ]);
        // $this->dispatchBrowserEvent('swal',[
        //     'title'=>'User created',
        //     'text'=> 'User created',
        //     'icon'=> 'SUCCESS',
        //     'timer' => 3000
        // ]);
        if ($model) {
            // Model created successfully
            $response = [
                'status' => 'success',
                'message' => 'Model created successfully',
                'model' => $model
            ];
        } else {
            // Failed to create model
            $response = [
                'status' => 'error',
                'message' => 'Failed to create model'
            ];
        }
        
        return response()->json($response);

        // Reset the input fields after adding the movie
        $this->reset(['movieName', 'directorName', 'year']);
    }
}

