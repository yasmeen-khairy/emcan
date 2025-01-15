<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('forms/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <div class="title">
            Login Form
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
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
            <div class="field d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="signup-link">
                Regiser now  <a href="{{ route('registerForm') }}">Regiser</a>
            </div>
        </form>
    </div>
</body>
</html>
