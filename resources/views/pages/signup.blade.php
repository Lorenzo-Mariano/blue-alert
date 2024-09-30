<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/signup.css']) <!-- Adjust if you're using Vite -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Blue Alert</title>
</head>

<body>
    @include('components.navbar')

    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="#" method="POST">
            @csrf
            <div class="input-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            
            <div class="input-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="password_confirmation" required>
            </div>

            <button type="submit" class="signup-btn">Sign Up</button>

            <p class="already-account">
                Already have an account? <a href="#">Log In</a>
            </p>
        </form>
    </div>
</body>

</html>
