@if ($paginator->hasPages())
<nav class="admin-pagination-nav" aria-label="Pagination">
    <div class="admin-pagination-info">
        Showing {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} of {{ $paginator->total() }}
    </div>
    <ul class="admin-pagination">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="admin-page-item disabled">
                <span class="admin-page-link">&lsaquo;</span>
            </li>
        @else
            <li class="admin-page-item">
                <a class="admin-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
            </li>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="admin-page-item disabled"><span class="admin-page-link">{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="admin-page-item active"><span class="admin-page-link">{{ $page }}</span></li>
                    @else
                        <li class="admin-page-item"><a class="admin-page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="admin-page-item">
                <a class="admin-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
            </li>
        @else
            <li class="admin-page-item disabled">
                <span class="admin-page-link">&rsaquo;</span>
            </li>
        @endif
    </ul>
</nav>
@endif
