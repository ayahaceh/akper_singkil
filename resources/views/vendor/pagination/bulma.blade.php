@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="pagination-previous" disabled>
                <i class="fa-solid fa-chevron-left mr-2"></i>
                Previous
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous">
                <i class="fa-solid fa-chevron-left mr-2"></i>
                Previous
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next">
                Next page
                <i class="fa-solid fa-chevron-right ml-2"></i>
            </a>
        @else
            <a href="#" class="pagination-next" disabled>
                Next page
                <i class="fa-solid fa-chevron-right ml-2"></i>
            </a>
        @endif

        <ul class="pagination-list">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current" aria-current="page">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
