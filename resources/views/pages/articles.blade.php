<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/articles.css', 'public/css/components/article-filters.css', 'public/css/components/article-preview.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Prevent Ocean Waste</title>
</head>

<body>
    @include('components.navbar')
    <header>
    </header>

    <main>
                

        <section class="blogs">

            <div class="article-preview">
                <img src="https://via.placeholder.com/300" alt="Article image">
                <p>Lorem ipsum dolor sit amet, consectetur</p>
            </div>

            <div class="article-preview">
                <img src="https://via.placeholder.com/300" alt="Article image">
                <p>Adipiscing elit, sed do eiusmod tempor incididunt</p>
            </div>

            <div class="article-preview">
                <img src="https://via.placeholder.com/300" alt="Article image">
                <p>Ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="article-preview">
                <img src="https://via.placeholder.com/300" alt="Article image">
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
            </div>

            <div class="article-preview">
                <img src="https://via.placeholder.com/300" alt="Article image">
                <p>Ex ea commodo consequat. Duis aute irure dolor in reprehenderit</p>
            </div>

            <div class="article-preview">
                <img src="https://via.placeholder.com/300" alt="Article image">
                <p>In voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
            
        </section>

        <section class="pagination">
            <a href="/" class="pagination-link">01</a>
            <a href="/" class="pagination-link">02</a>
            <a href="/" class="pagination-link">03</a>
            <a href="/" class="pagination-link">04</a>
        </section>
    </main>


    @include('components.footer')
</body>

</html>
