@vite(['resources/css/app.css', 'public/css/components/navbar.css'])


{{-- Next I want a new link that says "Admin Dashboard". It should only be accessible to admins ofc. --}}
<nav class="navbar">
    <section class="main-links">
        <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
        <a href="/about-us" class="{{ Request::is('about-us') ? 'active' : '' }}">About Us</a>
        <a href="/articles/1" class="{{ Request::is('articles') ? 'active' : '' }}">Articles</a>
        <a href="/get-involved" class="{{ Request::is('get-involved') ? 'active' : '' }}">Get Involved</a>
    </section>

    @if (Auth::check() && Auth::user()->is_admin)
        <a href="/admin/dashboard" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">Admin Dashboard</a>
    @endif

    <a class="profile-link" href="{{ Auth::check() ? '/profile' : '/get-involved' }}">
        {{ Auth::check() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : 'Not logged in.' }}
    </a>
</nav>
