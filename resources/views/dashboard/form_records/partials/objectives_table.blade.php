{{-- The list, with the status filters above it. Loaded on its own when the
     search box or a pager link is used, so it has to stand alone. --}}
<div style="padding:16px 20px 0;display:flex;gap:8px;flex-wrap:wrap;">
    <a href="#" data-status-filter="" class="am-chip {{ ($status ?? '') === '' ? 'info' : '' }}" style="text-decoration:none;cursor:pointer;">الكل ({{ $counts[''] ?? 0 }})</a>
    @foreach (App\Objective::statuses() as $key => $st)
        <a href="#" data-status-filter="{{ $key }}"
           class="am-chip {{ ($status ?? '') === $key ? $st['chip'] : '' }}"
           style="text-decoration:none;cursor:pointer;{{ ($status ?? '') === $key ? '' : 'opacity:.75;' }}">
            {{ $st['label'] }} ({{ $counts[$key] ?? 0 }})
        </a>
    @endforeach
</div>

<div class="am-table-wrap">
    <table class="am-table" id="amObjTable">
        <thead>
            <tr>
                <th>الهدف</th>
                <th>الشخص المسؤول</th>
                <th>الموعد النهائي</th>
                <th>آخر تقدم</th>
                <th>الحالة</th>
                <th style="text-align:right;">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($objectives as $data)
                @php
                    $last = $latest[$data->id] ?? null;
                    $st   = App\Objective::statuses()[$data->status] ?? ['label' => $data->status, 'chip' => ''];
                    $history = ($data->updates ?? collect())->values();
                @endphp
                <tr>
                    <td>
                        <span class="am-cell-primary">{{ $data->objective }}</span>
                        @if ($data->target)
                            <span class="am-cell-sub">المستهدف: {{ $data->target }}@if ($data->starting_point) (كان {{ $data->starting_point }})@endif</span>
                        @endif
                    </td>
                    <td>{{ $data->person_responsible ?: '—' }}</td>
                    <td><span class="am-chip info">{{ $data->deadline ? date('d/m/Y', strtotime($data->deadline)) : '—' }}</span></td>
                    <td>
                        @if ($last)
                            {{ $last->note }}
                            <span class="am-cell-sub">حُدّث في {{ date('d/m/Y', strtotime($last->update_date ?: $last->created_at)) }}</span>
                        @else
                            <span class="am-cell-sub">لم يُسجَّل أي تقدم بعد.</span>
                        @endif
                    </td>
                    <td><span class="am-chip {{ $st['chip'] }}">{{ $st['label'] }}</span></td>
                    <td style="text-align:right;white-space:nowrap;">
                        @php
                            $payload = [
                                'id' => $data->id, 'objective' => $data->objective,
                                'how_measured' => $data->how_measured, 'starting_point' => $data->starting_point,
                                'target' => $data->target, 'how_achieved' => $data->how_achieved,
                                'person_responsible' => $data->person_responsible, 'agreed_at' => $data->agreed_at,
                                'deadline' => $data->deadline, 'status' => $data->status,
                            ];
                            $notes = $data->updates()->get()->map(function ($u) {
                                return ['update_date' => $u->update_date ?: $u->created_at,
                                        'status' => $u->status, 'note' => $u->note, 'evidence' => $u->evidence];
                            });
                        @endphp
                        <button type="button" class="am-icon-btn" title="عرض" onclick='amObjView(@json($payload))'><i class="fa fa-eye"></i></button>
                        @if (in_array($data->status, ['achieved', 'not_achieved'], true))
                            {{-- finished, so the history is there to read rather than add to --}}
                            <button type="button" class="am-btn am-btn-outline am-btn-sm" onclick='amObjProgress(@json($payload), @json($notes))'>عرض</button>
                        @else
                            <button type="button" class="am-btn am-btn-outline am-btn-sm" onclick='amObjProgress(@json($payload), @json($notes))'>تحديث</button>
                        @endif
                        <button type="button" class="am-icon-btn" title="تحرير" onclick='amObjEdit(@json($payload))'><i class="fa fa-pen"></i></button>
                        <button type="button" class="am-icon-btn" title="حذف" onclick="amObjDelete({{ $data->id }})"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6"><div class="am-empty"><i class="fa fa-bullseye"></i><p>لم تتم إضافة أي أهداف بعد.</p></div></td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="am-pagination">
    <div class="am-pagination__info">
        عرض <strong>{{ $objectives->firstItem() ?? 0 }}–{{ $objectives->lastItem() ?? 0 }}</strong> من <strong>{{ $objectives->total() }}</strong>
    </div>
    <div class="am-pagination__nav">
        @if ($objectives->onFirstPage())
            <button disabled>‹</button>
        @else
            <button data-page="{{ $objectives->currentPage() - 1 }}" class="am-page-link">‹</button>
        @endif
        @php
            $current = $objectives->currentPage();
            $last    = $objectives->lastPage();
            $start   = max(1, $current - 2);
            $end     = min($last, $start + 4);
            $start   = max(1, $end - 4);
        @endphp
        @for ($p = $start; $p <= $end; $p++)
            <button data-page="{{ $p }}" class="am-page-link {{ $p == $current ? 'active' : '' }}">{{ $p }}</button>
        @endfor
        @if ($objectives->hasMorePages())
            <button data-page="{{ $objectives->currentPage() + 1 }}" class="am-page-link">›</button>
        @else
            <button disabled>›</button>
        @endif
    </div>
</div>
