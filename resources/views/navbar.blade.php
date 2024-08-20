@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    nav {
        background-color: #0f457a;
        padding: 1rem 0;
        position: absolute;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    nav a:hover {
        color: #bbdefb;
        /* Slightly lighter blue on hover */
    }
</style>

<nav>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Blog</a>
    <a href="#">Infographics</a>
    <a href="#">Get Involved</a>
</nav>
