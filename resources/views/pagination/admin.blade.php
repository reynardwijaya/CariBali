@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul class="admin_pagination">
            <li>
                @if ($paginator->onFirstPage())
                    <span class="admin_pagination_btn admin_pagination_nav disabled" aria-disabled="true">
                        <i class="fa-solid fa-chevron-left"></i> Prev
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="admin_pagination_btn admin_pagination_nav">
                        <i class="fa-solid fa-chevron-left"></i> Prev
                    </a>
                @endif
            </li>

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="admin_pagination_dots">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <span class="admin_pagination_btn admin_pagination_num active" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="admin_pagination_btn admin_pagination_num">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="admin_pagination_btn admin_pagination_nav">
                        Next <i class="fa-solid fa-chevron-right"></i>
                    </a>
                @else
                    <span class="admin_pagination_btn admin_pagination_nav disabled" aria-disabled="true">
                        Next <i class="fa-solid fa-chevron-right"></i>
                    </span>
                @endif
            </li>
        </ul>
    </nav>
@endif
