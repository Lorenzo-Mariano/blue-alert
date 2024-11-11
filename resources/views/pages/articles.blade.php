<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/articles.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blue Alert - Fight Water Pollution</title>
</head>

<body>
    @include('components.navbar')
    <header>
    </header>

    <main>
<<<<<<< HEAD
                

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
=======
        <div class="left-panel">
            @if (Auth::check())
                @include('components.article-controls')
                <hr>
            @endif
            @include('components.article-filters')
        </div>

        <div class="content">
            @if ($hasArticles)
                <div class="blogs">
                    @foreach ($articles as $article)
                        @include('components.article-preview', ['article' => $article])
                    @endforeach
                </div>
            @else
                <div class="msg-wrapper">
                    <h1 class="no-articles shadow-1">No articles have been posted yet. Check back later!</h1>
                </div>
            @endif

            <div class="pagination">
                {{ $articles->links() }}
            </div>

        </div>
>>>>>>> b707c652419470b666c6083dbc0b02b8bd89feb1
    </main>


    @include('components.footer')
</body>

</html>
