<html>
<head>
    <!-- @livewireStyles -->
</head>
<body>
    <div>
    <form wire:submit.prevent="addMovie">
    @csrf
        <div class="form-group">
            <label for="movieName">Movie Name:</label>
            <input type="text" class="form-control" id="movieName" wire:model="movieName">
            <!-- @error('movieName') <span class="text-danger">{{ $message }}</span> @enderror -->
        </div>
        <div class="form-group">
            <label for="directorName">Director Name:</label>
            <input type="text" class="form-control" id="directorName" wire:model="directorName">
            <!-- @error('directorName') <span class="text-danger">{{ $message }}</span> @enderror -->
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" class="form-control" id="year" wire:model="year">
            <!-- @error('year') <span class="text-danger">{{ $message }}</span> @enderror -->
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
    <!-- @livewireScripts -->
</body>
</html>