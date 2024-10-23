<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'public/css/pages/article.css'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} - Blue Alert</title>
</head>

<body>
    @include('components.navbar')

    <main>

        <article>
            <section class="article-header">
                <div class="header-overlay">
                    <img src="{{ Storage::url($article->image) }}" alt="Article Background" class="background-image">
                    <div class="header-content">
                        <h1>{{ $article->title }}</h1>
                        <p class="article-author">Written by {{ $article->author->first_name }}
                            {{ $article->author->last_name }} on
                            {{ $article->created_at->format('M d, Y') }}
                        </p>
                    </div>
                </div>
            </section>

            <section class="article-content">
                <a href="/articles" class="back-button">← Back to Articles</a>
                <div class="article-body">
                    {!! nl2br(e($article->content)) !!}
                </div>

                @if ($article->references && $article->references->isNotEmpty())
                    <div class="article-references">
                        <h3>References:</h3>
                        <ul>
                            @foreach ($article->references as $reference)
                                <li><a href="{{ $reference->url }}" target="_blank">{{ $reference->description }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>
        </article>

    </main>

    @include('components.footer')
</body>

</html>
