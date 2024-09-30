<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/welcome.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>

</head>

<body>
    @include('components.navbar')


        <div class="login-container">
            <h2>Log In</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="options">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me?</label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <button type="submit" class="login-btn">Log in</button>
            </form>
    
            <div class="social-media">
                <p>Or Sign In with</p>
                <a href="https://facebook.com"> <i class="fa-brands fa-facebook"></i></a>
                <a href="https://accounts.google.com"><i class="fa-brands fa-google"></i></i></a>
            </div>
            
            <p class="signup">Don't have an account? <a href="signup">Sign Up</a></p>
        </div>

</body>

</html>