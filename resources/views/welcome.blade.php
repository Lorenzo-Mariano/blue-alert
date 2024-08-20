<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #4077ca;
            color: #e3e7eb;
        }

        header {
            /* background: url('https://example.com/hero-image.jpg') no-repeat center center/cover; */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding-top: 60px;
            /* Adjust for navbar height */
        }

        header h1 {
            font-size: 4rem;
            margin: 0;
        }

        header p {
            font-size: 1.5rem;
            margin-top: 20px;
        }

        section {
            padding: 60px 20px;
            text-align: center;
        }

        section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #bbdefb;
        }

        .infographics img {
            width: 100%;
            max-width: 300px;
            margin: 20px;
            border-radius: 8px;
            border: 2px solid #bbdefb;
        }

        .cta {
            background-color: #1565c0;
            color: white;
            padding: 40px;
            margin-top: 40px;
        }

        .cta a {
            color: #0d47a1;
            text-decoration: none;
            font-weight: 600;
            background-color: #e3f2fd;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #bbdefb;
        }

        footer {
            background-color: #0d47a1;
            color: #e3f2fd;
            padding: 20px;
            text-align: center;
        }
    </style>
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
