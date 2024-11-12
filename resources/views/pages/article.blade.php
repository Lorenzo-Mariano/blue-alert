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
                        <p class="article-author">
                            Written by
                            <a href="{{ route('user', ['id' => $article->author->id]) }}">
                                {{ $article->author->first_name }} {{ $article->author->last_name }}
                            </a>
                            on {{ $article->created_at->format('M d, Y') }}
                        </p>
                        @if ($article->is_restricted)
                            <div class="restriction-message">
                                <p>This article is restricted. It is not accessible to users other than the author and
                                    the admins.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <section class="article-content">
                <div class="links">
                    <a href="javascript:void(0);" onclick="history.back()" class="back-button">← Back</a>

                    @if (Auth::check() && Auth::user()->is_admin && Auth::user()->id != $article->author->id)
                        <div class="admin-option">
                            <i class="iconoir-minus-hexagon"></i>
                            <a href="{{ route('admin.reasonForm', ['action' => 'banUser', 'id' => $article->author_id]) }}"
                                class="ban-user-button">
                                Ban User
                            </a>
                        </div>

                        <div class="admin-option">
                            <i class="iconoir-lock"></i>
                            <a href="{{ route('admin.reasonForm', ['action' => 'restrictPost', 'id' => $article->id]) }}"
                                class="restrict-post-button">
                                Restrict Post
                            </a>
                        </div>
                    @endif

                    @if (Auth::check() && Auth::id() === $article->author_id)
                        <div class="edit">
                            <i class="iconoir-edit-pencil"></i>
                            <a href="{{ route('articles.edit', $article->id) }}" class="edit-button">Edit Article</a>
                        </div>

                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button"
                                onclick="return confirm('Are you sure you want to delete this article?')">
                                <i class="iconoir-trash"></i> Delete Article
                            </button>
                        </form>
                    @endif
                </div>


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
