<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
    @vite(['resources/css/app.css', 'public/css/pages/get-involved.css'])
    <script src="{{ asset('js/get-involved.js') }}" defer></script>
</head>

<body>
    @include('components.navbar')
    <dialog class="sign-up-modal">
        <form class="sign-up-form" onsubmit="register(event)">
            @csrf
            <h1>Sign Up</h1>
            <span class="status"></span>
            <label for="first-name">First Name</label>
            <input name="first_name" type="text" maxlength="50" required>
            <label for="first-name">Last Name</label>
            <input name="last_name" type="text" maxlength="50" required>
            <label for="email">Email</label>
            <input name="email" type="email" required>
            <label for="password">Password</label>
            <input name="password" type="password" minlength="8" required>
            <label for="confirm-password">Confirm Password</label>
            <input name="password_confirmation" type="password" minlength="8" required>
            <section>
                <button type="reset">Clear</button>
                <button class="sign-up" type="submit">Sign Up</button>
            </section>
        </form>
    </dialog>
    <dialog class="login-modal">
        <form class="login-form">
            <h1>Login</h1>
            <label for="email">Email</label>
            <input name="email" type="email" required>
            <label for="password">Password</label>
            <input name="password" type="password" required>
            <section>
                <button type="reset">Clear</button>
                <button class="login" type="submit">Login</button>
            </section>
        </form>
    </dialog>
    <main>
        <div class="hero" action="">
            <header>
                <h1>Blue Alert</h1>
                <span>Want to join us? Sign up to interact with blogs and more!</span>
            </header>
            <section class="buttons">
                <button onclick="openSignUp()" class="sign-up">Sign Up</button>
                <button onclick="openLogin()" class="login">Login instead</button>
            </section>
        </div>
    </main>
    @include('components.footer')
</body>

</html>
