@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination pagination-template d-flex justify-content-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item"  aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a href="#" class="page-link "> 
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        @else
        <li class="page-item" >
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" aria-disabled="true" aria-label="@lang('pagination.previous')"> 
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item" ><a href="{{ $url }}" class="page-link active">{{ $page }}</a></span></li>
        @else
        <li class="page-item" ><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')">
               <i class="fa fa-angle-right"></i>
           </a>
       </li>
       @else
       <li class="page-item"  aria-disabled="true" aria-label="@lang('pagination.previous')">
        <a href="#" class="page-link "> 
            <i class="fa fa-angle-right"></i>
        </a>
    </li>
    @endif
</ul>
</nav>
@endif
