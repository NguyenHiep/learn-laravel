@if ($paginator->hasPages())
    <ul class="pagi">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="disabled"><a href="javascript:void(0)"><i class="fa fa-angle-double-left"></i></a></li>
      @else
        <li class="pagi-prev"><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
      @endif
      
      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="disabled"><span>{{ $element }}</span></li>
        @endif
    
        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="active"><span>{{ $page }}</span></li>
            @else
              <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach
      
      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="pagi-next"><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
      @else
        <li class="disabled"><a href="javascript:void(0)"><i class="fa fa-angle-double-right"></i></a></li>
      @endif
    </ul>
@endif
