<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .scrollable {
        max-height: 600px;
        overflow-y: auto;
        margin: 0 auto;
        width: 50%;
    }
    .post {
        border: 1px solid #ddd;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .post p {
        margin-bottom: 10px;
    }
    .post button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
        margin: 10px 10px 0 0;
    }
    .post button:hover {
        background-color: #0056b3;
    }
</style>

<div class="scrollable">
<input type="hidden" name="movie_id" value="{{ $movie_id }}">
    @if ($posts->isEmpty())
        <p>No posts yet.</p>
    @else
        @foreach ($posts as $post)
        <div class="post">
            <p>{{ $post->text }}</p>
            <p>Likes: {{ $post->likes->count() }}</p>
            <p>Dislikes: {{ $post->dislikes->count() }}</p>
            <p>Posted by: {{ $post->user->name }}</p>
            @if (Auth::id() == $post->user_id)
           <a href="{{ route('posts.edit', ['id' => $post->id, 'movie_id' => $movie_id]) }}">Edit Post</a>
            @endif

            <form method="POST" action="{{ route('posts.like', $post->id) }}">
                @csrf
                
                <button type="submit">Like</button>
            </form>
            <form method="POST" action="{{ route('posts.dislike', $post->id) }}">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $movie_id }}">
                <button type="submit">Dislike</button>
            </form>
        </div>
        @endforeach
    @endif
</div>
<a href="{{ route('posts.create',['movie_id' => $movie_id] ) }}" style="background-color: #007BFF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Create new post</a>
<a href="{{ route('posts.myPosts') }}" style="background-color: #007BFF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">My Posts</a>

@endsection
