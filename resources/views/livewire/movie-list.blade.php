<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    @livewireStyles
</head>
<body>
@livewireScripts
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Movie Name</th>
                                    <th>Director</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movies as $movie)
                                    <tr>
                                        <td>{{ $movie->movie_name }}</td>
                                        <td>{{ $movie->director }}</td>
                                        <td>{{ $movie->year }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <form wire:submit.prevent="addMovie">
                    <div class="form-group">
                        <label for="movieName">Movie Name:</label>
                        <input type="text" class="form-control" id="movieName" wire:model="movieName">
                        @error('movieName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="directorName">Director Name:</label>
                        <input type="text" class="form-control" id="directorName" wire:model="directorName">
                        @error('directorName') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="number" class="form-control" id="year" wire:model="year">
                        @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add Movie</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
