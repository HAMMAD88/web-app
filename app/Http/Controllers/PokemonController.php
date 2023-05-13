<?php
// PokemonController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function store(Request $request)
    {
        $pokemon = new Pokemon;
        $pokemon->pokemon_name = $request->pokemon_name;
        $pokemon->save();

        // Redirect or return a response
    }
}