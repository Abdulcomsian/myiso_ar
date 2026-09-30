{{-- Pagination row, laid out exactly like the English pages: the count on one
     side, a five-page window with ‹ › on the other. Expects $paginator.

     English drives its buttons over AJAX; the Arabic pages reload, so each
     page is a link and only the dead ends stay as disabled buttons. The
     wording is the one the Arabic admin pages already use. --}}
@php
    $amCur  = $paginator->currentPage();
    $amLast = $paginator->lastPage();
    $amFrom = max(1, $amCur - 2);
    $amTo   = min($amLast, $amFrom + 4);
    $amFrom = max(1, $amTo - 4);
@endphp
<div class="am-pagination">
    <div class="am-pagination__info">
        عرض <strong>{{ $paginator->firstItem() ?? 0 }}–{{ $paginator->lastItem() ?? 0 }}</strong> من
        <strong>{{ $paginator->total() }}</strong>
    </div>
    <div class="am-pagination__nav">
        @if ($paginator->onFirstPage())
            <button type="button" disabled>&lsaquo;</button>
        @else
            <a class="am-page-link" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
        @endif

        @for ($amP = $amFrom; $amP <= $amTo; $amP++)
            <a class="am-page-link {{ $amP == $amCur ? 'active' : '' }}"
                href="{{ $paginator->url($amP) }}">{{ $amP }}</a>
        @endfor

        @if ($paginator->hasMorePages())
            <a class="am-page-link" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
        @else
            <button type="button" disabled>&rsaquo;</button>
        @endif
    </div>
</div>
