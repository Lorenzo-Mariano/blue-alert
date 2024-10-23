@vite(['public/css/components/article-preview.css'])

<div class="blog-preview">
    <a href="{{ url('/article/' . $article->id) }}">
        <div class="img-wrapper">
            <img src="{{ Storage::url($article->image) }}" alt="blog-image">
        </div>
        <h3 class="title">{{ $article->title }}</h3>
    </a>
</div>
