<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
<form id="postForm" method="POST" action="{{ route('posts.store')}}">
    @csrf
    <div>
        <input type="hidden" name="movie_id" value="{{ $movie_id }}">
        <label for="text">Text:</label><br>
        <textarea id="postText" name="text" required></textarea><br>
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>
@endsection
<!-- resources/views/posts/index.blade.php -->

<!-- Add this script at the end of the file -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#postForm").submit(function(e){
        e.preventDefault();

        let postText = $("#postText").val();

        $.ajax({
            url: '/posts',
            type: 'POST',
            data: {
                text: postText,
                movie_id: "{{ $movie_id }}",
                _token: "{{ csrf_token() }}"
            },
            success: function(data){
                 var movieId = data.movie_id;
                 window.location.href = "http://127.0.0.1:8000/posts/" + movieId;
             }
             error: function(xhr, status, error){
    console.error('AJAX Error: ', status, error);
}
        });
    });
});
</script>

