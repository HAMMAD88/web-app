<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
<input type="hidden" name="movie_id" value="{{ $movie_id }}">
<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="text">Text:</label><br>
        <textarea id="text" name="text" required>{{ $post->text }}</textarea><br>
    </div>
    <div>
        <input type="submit" value="Update Post">
    </div>
</form>
@endsection
