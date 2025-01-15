<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('forms/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <div class="title">
            Register Form
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="field">
                <input type="text" name="name" value="{{ old('name') }}" required>
                <label>Name</label>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Email Address</label>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <input type="password" name="password_confirmation" required>
                <label>Confirm Password</label>
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>

                @enderror
            </div>
            <div class="field d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm">Signup</button>
            </div>
            <div class="signup-link">
                Already have an account? <a href="{{ route('loginForm') }}">Login</a>
            </div>
        </form>
    </div>
</body>
</html>
