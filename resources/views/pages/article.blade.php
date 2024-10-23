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
                {{-- Background Image --}}
                <div class="header-overlay">
                    <img src="https://static.animecorner.me/2024/06/1717764399-1b00ff8d04de8fa8256cf86a5f37b986-768x432.jpg"
                        alt="Article Background" class="background-image">
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
