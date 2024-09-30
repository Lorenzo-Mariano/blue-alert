@vite(['resources/css/app.css', 'public/css/components/navbar.css'])

<nav>
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
    <a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">About Us</a>
    <a href="/articles" class="{{ Request::is('articles') ? 'active' : '' }}">Articles</a>
    <a href="/get-involved" class="{{ Request::is('get-involved') ? 'active' : '' }}">Get Involved</a>
</nav>

