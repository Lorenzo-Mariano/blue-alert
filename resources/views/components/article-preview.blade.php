@vite(['public/css/components/article-preview.css'])

<div class="blog-preview">
    <a href="{{ url('/articles/' . $article->id) }}">
        {{-- <img src="{{ $article->image_url }}" alt="blog-image"> --}}
        <img src="https://static.animecorner.me/2024/06/1717764399-1b00ff8d04de8fa8256cf86a5f37b986-768x432.jpg"
            alt="blog-image">
        <h3 class="title">{{ $article->title }}</h3>
    </a>
</div>
