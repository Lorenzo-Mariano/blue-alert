@vite(['resources/css/app.css', 'public/css/components/navbar.css'])

<<<<<<< HEAD
<nav>
    <a href="/">
        <img src="img/logo.png" alt="Logo" class="logo">
    </a>
=======
<nav class="navbar">
>>>>>>> b707c652419470b666c6083dbc0b02b8bd89feb1
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
    <a href="/about-us" class="{{ Request::is('about-us') ? 'active' : '' }}">About Us</a>
    <a href="/articles/1" class="{{ Request::is('articles') ? 'active' : '' }}">Articles</a>
    <a href="/get-involved" class="{{ Request::is('get-involved') ? 'active' : '' }}">Get Involved</a>
</nav>
