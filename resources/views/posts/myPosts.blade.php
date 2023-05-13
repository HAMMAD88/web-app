<!-- resources/views/posts/myPosts.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .post-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }
    .post {
        border: 1px solid #ddd;
        margin-bottom: 20px;
        padding: 20px;
        width: 80%;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .post p {
        margin-bottom: 10px;
        background-color: #f5f5f5; /* light gray background */
        padding: 10px;
        border-radius: 5px;
    }
    .post button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }
    .post button:hover {
        background-color: #0056b3;
    }
</style>

<div class="post-container">
    @foreach ($posts as $post)
    <div class="post">
        <p>{{ $post->text }}</p>
        <p>Likes: {{ $post->likes->count() }}</p>
        <p>Dislikes: {{ $post->dislikes->count() }}</p>
        <!-- <form method="POST" action="{{ route('posts.like', $post->id) }}">
            @csrf
            <button type="submit">Like</button>
        </form>
        <form method="POST" action="{{ route('posts.dislike', $post->id) }}">
            @csrf
            <button type="submit">Dislike</button>
        </form> -->
    </div>
    @endforeach
</div>
@endsection
