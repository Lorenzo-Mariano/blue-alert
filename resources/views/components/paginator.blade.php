@vite(['public/css/components/paginator.css'])

<nav class="paginator">
    @if (!$paginator->onFirstPage())
        <a href="{{ url('/articles/' . ($paginator->currentPage() - 1)) }}">
            <i class="iconoir-arrow-left-circle"></i>
        </a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="disabled">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ url('/articles/' . $page) }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a href="{{ url('/articles/' . ($paginator->currentPage() + 1)) }}">
            <i class="iconoir-arrow-right-circle"></i>
        </a>
    @endif
</nav>
