@vite(['resources/css/app.css', 'public/css/components/navbar.css'])

<nav class="navbar">
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
    <a href="/about-us" class="{{ Request::is('about-us') ? 'active' : '' }}">About Us</a>
    <a href="/articles/1" class="{{ Request::is('articles') ? 'active' : '' }}">Articles</a>
    <a href="/get-involved" class="{{ Request::is('get-involved') ? 'active' : '' }}">Get Involved</a>
</nav>
