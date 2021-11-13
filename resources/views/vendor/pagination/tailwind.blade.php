@if ($paginator->hasPages())
    <nav role="navigation" class="pagination" >

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="pagination__arrow pagination__arrow_prev pagination__arrow_disabled">
                <svg viewBox="0 0 792.049 792.049" height="30" width="30">
                    <path id="_x38__35_" d="M622.955 342.127L268.424 20.521c-27.36-27.36-71.677-27.36-99.037 0s-27.36 71.676 0 99.037l304.749 276.468-304.749 276.466c-27.36 27.359-27.36 71.676 0 99.036s71.677 27.36 99.037 0l354.531-321.606c14.783-14.783 21.302-34.538 20.084-53.897 1.186-19.36-5.301-39.114-20.084-53.898z" fill="currentColor"/>
                </svg>
            </span>
        @else
            <a class="pagination__arrow pagination__arrow_prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"}}">
                <svg viewBox="0 0 792.049 792.049" height="30" width="30">
                    <path id="_x38__35_" d="M622.955 342.127L268.424 20.521c-27.36-27.36-71.677-27.36-99.037 0s-27.36 71.676 0 99.037l304.749 276.468-304.749 276.466c-27.36 27.359-27.36 71.676 0 99.036s71.677 27.36 99.037 0l354.531-321.606c14.783-14.783 21.302-34.538 20.084-53.897 1.186-19.36-5.301-39.114-20.084-53.898z" fill="currentColor"/>
                </svg>
            </a>
        @endif

        <div class="pagination__pages">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        {{ $element }}
                    </span>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span class="btn menu__item_active">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}" class="btn" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination__arrow" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <svg viewBox="0 0 792.049 792.049" height="30" width="30">
                    <path id="_x38__35_" d="M622.955 342.127L268.424 20.521c-27.36-27.36-71.677-27.36-99.037 0s-27.36 71.676 0 99.037l304.749 276.468-304.749 276.466c-27.36 27.359-27.36 71.676 0 99.036s71.677 27.36 99.037 0l354.531-321.606c14.783-14.783 21.302-34.538 20.084-53.897 1.186-19.36-5.301-39.114-20.084-53.898z" fill="currentColor"/>
                </svg>
            </a>
        @else
            <span class="pagination__arrow pagination__arrow_disabled">
                <svg viewBox="0 0 792.049 792.049" height="30" width="30">
                    <path id="_x38__35_" d="M622.955 342.127L268.424 20.521c-27.36-27.36-71.677-27.36-99.037 0s-27.36 71.676 0 99.037l304.749 276.468-304.749 276.466c-27.36 27.359-27.36 71.676 0 99.036s71.677 27.36 99.037 0l354.531-321.606c14.783-14.783 21.302-34.538 20.084-53.897 1.186-19.36-5.301-39.114-20.084-53.898z" fill="currentColor"/>
                </svg>
            </span>
        @endif
    </nav>
@endif



