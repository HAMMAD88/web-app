<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('posts.store')}}">
    @csrf
    <div>
        <input type="hidden" name="movie_id" value="{{ $movie_id }}">
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required></textarea><br>
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>
@endsection
