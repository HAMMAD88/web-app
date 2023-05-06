<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </body>
</html>
