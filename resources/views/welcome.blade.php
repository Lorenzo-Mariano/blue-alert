<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    @include('navbar')

    <header>
        <div>
            <h1>Blue Alert</h1>
            <p>Together, we can prevent ocean waste in the Philippines.</p>
        </div>
    </header>

    <section>
        <h2>Our Mission</h2>
        <p>Blue Alert is dedicated to educating and empowering Filipinos to take action against ocean pollution.</p>
    </section>

    <section class="infographics">
        <h2>Infographics</h2>
        <img src="https://example.com/infographic1.jpg" alt="Infographic 1">
        <img src="https://example.com/infographic2.jpg" alt="Infographic 2">
    </section>

    <section class="cta">
        <h2>Join the Movement</h2>
        <p>Get involved by sharing our content, attending our events, and spreading the word about ocean conservation.
        </p>
        <a href="#">Sign Up</a>
    </section>

    <footer>
        <p>&copy; 2024 Blue Alert. All rights reserved.</p>
    </footer>


</body>

</html>
