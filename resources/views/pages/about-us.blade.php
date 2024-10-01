<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Blue Alert</title>
    @vite(['resources/css/app.css', 'public/css/pages/about-us.css'])
</head>

<body>
    @include('components.navbar')
    <main>
        <h1>About Us</h1>

        <section class="mission">
            <h2>Our Mission</h2>
            <p>
                Our mission is to educate and empower Filipinos to combat water pollution, particularly river
                waste.By raising awareness and promoting better practices, the organization seeks to protect the
                ocean,a vital resource for food, livelihoods, and marine life, for future generations.
            </p>
        </section>

        <section class="vision">
            <h2>Our Vision</h2>
            <p>
                To create a future where the oceans are free from plastic pollution, thriving with marine life,and
                protected by a generation of environmentally-conscious Filipinos who actively safeguard our marine
                ecosystems.
            </p>
        </section>

        <section class="social-media">
            {{-- basta links dito to social media, if you even like that --}}
            <h3>Follow Us On</h3>
            <a href="https://facebook.com"> <i class="fa-brands fa-facebook"></i></a>
            <a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com"><i class="fa-brands fa-twitter"></i></a>
        </section>
    </main>

    @include('components.footer')
</body>

</html>
