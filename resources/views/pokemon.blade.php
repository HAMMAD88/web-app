@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Add Pokemon</title>
    <!-- Add other necessary meta tags and CSS files here -->
</head>
<body>
    <form method="POST" action="{{ route('pokemon.store') }}">
        @csrf
        <label for="pokemon_name">Pokemon Name:</label><br>
        <input type="text" id="pokemon_name" name="pokemon_name"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
@endsection