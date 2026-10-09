{{-- The two panels: what to check on one side, when to tick on the other.
     Shared so the add form and the edit modal cannot drift. --}}
<div class="qms-panels">

    <div class="qms-panel qms-panel--check">
        <div class="qms-panel__head">ما الذي يجب التحقق منه</div>
        <ul>
            @foreach ($q['check'] as [$line, $tags])
                <li>
                    @foreach ($tags as $tag)
                        <span class="am-chip {{ App\QmsAuditQuestions::badgeChips()[$tag] ?? '' }}" style="font-size:10.5px;padding:2px 8px;margin-inline-end:6px;">{{ $tag }}</span>
                    @endforeach
                    {{ $line }}
                </li>
            @endforeach
        </ul>
        @if (!empty($q['where']))
            <div class="qms-panel__where">
                <strong>أين تبحث:</strong>
                @foreach ($q['where'] as $w)
                    @if ($w[1])<a href="{{ url($w[1]) }}" target="_blank">{{ $w[0] }}</a>@else{{ $w[0] }}@endif{{ $w[2] ? ' ' . $w[2] : '' }}{{ $loop->last ? '' : '،' }}
                @endforeach
            </div>
        @endif
    </div>

    <div class="qms-panel qms-panel--tick">
        <div class="qms-panel__head">متى تختار</div>
        <div class="qms-panel__tick">
            <div class="qms-tick-yes">نعم</div>
            <div>{{ $q['tick_yes'] }}</div>
            <div class="qms-tick-no">لا</div>
            <div>{{ $q['tick_no'] }}</div>
            @if ($q['tick_na'])
                <div class="qms-tick-na">لا ينطبق</div>
                <div>{{ $q['tick_na'] }}</div>
            @endif
        </div>
    </div>

</div>
