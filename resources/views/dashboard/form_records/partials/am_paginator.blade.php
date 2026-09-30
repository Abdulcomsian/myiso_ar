{{-- Pagination row, styled like the English pages. Expects $paginator.
     Shown whenever there is at least one record, the way English shows
     "1-1 / 1" even on a single page. --}}
@if ($paginator->total() > 0)
    @php
        $last = $paginator->lastPage();
        $cur = $paginator->currentPage();
        $from = max(1, $cur - 2);
        $to = min($last, $from + 4);
        $from = max(1, $to - 4);
    @endphp
    <div class="am-paginator">
        <div class="am-paginator__info">
            {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} / {{ $paginator->total() }}
        </div>
        <div class="am-paginator__nav">
            @if ($paginator->onFirstPage())
                <span class="am-paginator__btn" style="opacity:.45;">&lsaquo;</span>
            @else
                <a class="am-paginator__btn" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
            @endif

            @if ($from > 1)
                <a class="am-paginator__btn" href="{{ $paginator->url(1) }}">1</a>
                @if ($from > 2)
                    <span class="am-paginator__btn" style="border:none;background:none;">…</span>
                @endif
            @endif

            @for ($p = $from; $p <= $to; $p++)
                @if ($p == $cur)
                    <span class="am-paginator__btn am-paginator__btn--active">{{ $p }}</span>
                @else
                    <a class="am-paginator__btn" href="{{ $paginator->url($p) }}">{{ $p }}</a>
                @endif
            @endfor

            @if ($to < $last)
                @if ($to < $last - 1)
                    <span class="am-paginator__btn" style="border:none;background:none;">…</span>
                @endif
                <a class="am-paginator__btn" href="{{ $paginator->url($last) }}">{{ $last }}</a>
            @endif

            @if ($paginator->hasMorePages())
                <a class="am-paginator__btn" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
            @else
                <span class="am-paginator__btn" style="opacity:.45;">&rsaquo;</span>
            @endif
        </div>
    </div>
@endif
