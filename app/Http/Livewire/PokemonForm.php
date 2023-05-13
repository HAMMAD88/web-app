<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PokemonForm extends Component
{
    public $pokemonName;
    public function render()
    {
        return view('livewire.pokemon-form');
    }
    public function submit()
    {
        // Validate the form input
        $this->validate([
            'pokemonName' => 'required|min:3|max:255',
        ]);
        App\Models\Pokemon::create([
            'pokemon_name' => $this->pokemonName
        
        ]);

        // Process the form submission and save the Pokemon name
        // You can perform any additional logic here, such as saving to the database
        
        // Clear the input field after submission
        $this->pokemonName = '';
        
        // Show a success message or perform any other action
        session()->flash('success', 'Pokemon name submitted successfully.');
    }
}
