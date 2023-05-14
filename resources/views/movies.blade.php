@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .scrollable {
            height: 600px;
            overflow-y: auto;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            margin: 1rem auto;
            width: 80%;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .movie {
            border-bottom: 1px solid #ddd;
            padding: 1rem 0;
            transition: background-color 0.2s;
        }
        .movie:last-child {
            border-bottom: none;
        }
        .movie:hover {
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-container {
            position: absolute;
            top: 60;
            right: 20;
            bottom: 60;
            left: 20;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .movie-card {
    display: flex;
    align-items: center;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.movie-image {
    width: 150px;
    height: auto;
    object-fit: cover;
    margin-right: 10px;
}

.movie-details {
        display: flex;
        flex-direction: column;
    }

.movie-title {
    font-size: 24px;
    margin: 0 0 5px;
}

.movie-info {
    margin: 0;
    font-size: 16px;
}

    </style>

    <input type="text" id="search" placeholder="Search for a movie..." class="form-control">

    <div class="scrollable">
        @foreach ($movies as $movie)
        <a href="{{ route('posts.index', $movie->id) }}" class="movie" data-movie-name="{{ $movie->movie_name }}">
        <div class="movie-card">
        <img src="{{ $movie->poster->poster_url }}" alt="{{ $movie->poster->poster_url }}" class="movie-image">


    <div class="movie-details">
    <h2 class="movie-title">{{ $movie->movie_name }}</h2>
    <p class="movie-info"><strong>Directed by:</strong> {{ $movie->director }}</p>
    <p class="movie-info"><strong>Year:</strong> {{ $movie->year }}</p>
    @if (Auth::user()->name == 'Hammad')
        <form action="{{ route('movies.destroy', $movie) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif
</div>
</div>
        </a>
        @endforeach
    </div>
    <style>
    .form-container {
    width: 100%;
    max-width: 800px;
    margin: 60px auto; /* auto will center the box horizontally */
} </style>

    <div class="form-container">
        <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="movie_name">Movie Name:</label><br>
                <input type="text" id="movie_name" name="movie_name" required><br>
            </div>

            <div>
                <label for="director">Director:</label><br>
                <input type="text" id="director" name="director" required><br>
            </div>

            <div>
                <label for="year">Year:</label><br>
                <input type="number" id="year" name="year" required><br>
            </div>

            <div>
            <label for="poster">Poster:</label><br>
            <input type="file" id="poster" name="poster" accept="image/*" required><br>
            </div>

            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <script>
        document.getElementById('search').addEventListener('input', function(e) {
            var search = e.target.value.toLowerCase();
            var movies = document.querySelectorAll('.movie');

            movies.forEach(function(movie) {
                var movieName = movie.dataset.movieName.toLowerCase();

                if (movieName.includes(search)) {
                    movie.style.display = '';
                } else {
                    movie.style.display = 'none';
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
