@vite(['public/css/components/article-preview.css'])

<div class="blog-preview">
    <a href="{{ url('/article/' . $article->id) }}">
        <div class="img-wrapper">
            <img src="{{ Storage::url($article->image) }}" alt="blog-image">
        </div>
        <section class="text">
            <h3 class="title">{{ $article->title }}</h3>

            <!-- New Information to Display -->
            <p class="author">
                By {{ $article->author->first_name }} {{ $article->author->last_name }} on
                {{ $article->created_at->format('M d, Y') }}
            </p>
            <p class="read-count">
                Reads: {{ $article->reads }}
            </p>
        </section>
    </a>
</div>
