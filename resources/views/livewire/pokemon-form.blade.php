<html>
<head>
    @livewireStyles
</head>
<body>
    @livewireScripts
<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="pokemonName">Pokemon Name</label>
            <input type="text" wire:model="pokemonName" class="form-control" id="pokemonName">
            @error('pokemonName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
