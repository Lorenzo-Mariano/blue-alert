<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/welcome.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>

</head>

<body>
    @include('components.navbar')

    <main>

        <header>
            <div>
                <h1>Blue Alert</h1>
                <p>Together, we can prevent ocean waste in the Philippines.</p>
            </div>
        </header>

        <section class="mission-statement">
            <h2>Our Mission</h2>
            <p>Blue Alert is dedicated to educating and empowering Filipinos to take action against ocean pollution. The
                ocean is a vital resource, providing food, livelihoods, and a home for countless species. However, it is
                under threat from the massive influx of plastic waste that contaminates its waters. By raising awareness
                and
                advocating for better practices, we aim to protect our oceans for future generations.</p>
        </section>

        <section class="ocean-awareness">
            <h2>The State of Our Oceans</h2>
            <p>The world's oceans are facing an unprecedented crisis. Each year, millions of tons of plastic enter the
                oceans, disrupting marine ecosystems and endangering wildlife. In the Philippines, this problem is
                especially severe, as the country ranks among the top contributors to ocean plastic waste. From remote
                coastal communities to bustling urban centers, plastic pollution is a pervasive issue that affects
                everyone.
            </p>
            <p>But it’s not just the environment that suffers—our health and livelihoods are also at risk. Contaminated
                water, poisoned fish, and damaged ecosystems all have far-reaching consequences. The fight against ocean
                plastic waste is not just an environmental issue; it’s a battle for the well-being of all Filipinos.</p>
        </section>

        <section class="infographics">
            <h2>Infographics</h2>
            <p>Visualize the impact of ocean waste and understand the scale of the problem through our infographics.
                These
                resources highlight key data, showcase the effects of plastic pollution, and offer actionable steps we
                can
                all take to mitigate this crisis.</p>
            <img src="https://example.com/infographic1.jpg" alt="Infographic 1">
            <img src="https://example.com/infographic2.jpg" alt="Infographic 2">
        </section>

        <section class="cta">
            <h2>Join the Movement</h2>
            <p>The time to act is now. Ocean conservation requires collective effort, and every individual’s
                contribution
                counts. Whether it’s by reducing plastic usage, supporting policies that protect marine environments, or
                spreading the message to others—everyone has a role to play. Join us in our mission to protect the
                oceans
                and secure a sustainable future for the Philippines.</p>
            <a href="#">Sign Up</a>
        </section>

        <footer>
            <p>&copy; 2024 Blue Alert. All rights reserved.</p>
        </footer>
    </main>


</body>

</html>
