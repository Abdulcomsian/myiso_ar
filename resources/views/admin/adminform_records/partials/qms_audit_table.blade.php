<div class="am-table-wrap">
    <table class="am-table" id="amQmsTable">
        <thead>
            <tr>
                <th style="width:60px;">#</th>
                <th>تدقيق نظام إدارة الجودة</th>
                <th>المدقق</th>
                <th>تاريخ الاستكمال</th>
                <th>التعليقات</th>
                <th style="text-align:right;">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($auditreport as $index => $item)
                <tr>
                    <td><span class="am-cell-sub">#{{ $auditreport->firstItem() + $index }}</span></td>
                    <td>
                        <span class="am-cell-primary">تدقيق رقم {{ $item->QmsauditNumber ?? ($auditreport->firstItem() + $index) }}</span>
                        <span class="am-cell-sub">{{ Str::limit($item->any_issues, 40) }}</span>
                    </td>
                    <td>{{ $item->auditrName ?? '—' }}</td>
                    <td><span class="am-chip info">{{ $item->competedDate ? date('d M Y', strtotime($item->competedDate)) : '—' }}</span></td>
                    <td>{{ Str::limit($item->audit_comments_actions, 60) }}</td>
                    <td style="text-align:right;white-space:nowrap;">
                        <div class="am-actions">
                            <button type="button" class="am-icon-btn" title="عرض" onclick='amQmsView(@json($item))'><i class="fa fa-eye"></i></button>
                            <button type="button" class="am-icon-btn" title="تعديل" onclick='amQmsEdit(@json($item))'><i class="fa fa-pen"></i></button>
                            <button type="button" class="am-icon-btn danger am-confirm-delete"
                                    title="حذف"
                                    data-action="{{ route('deleteqmsAudit') }}"
                                    data-id="{{ $item->id }}"
                                    data-label="تدقيق رقم {{ $item->QmsauditNumber }}"
                                    data-type="تدقيق نظام إدارة الجودة">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6"><div class="am-empty"><i class="fa fa-shield-alt"></i><p>لم تُسجَّل أي عمليات تدقيق بعد.</p></div></td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="am-pagination">
    <div class="am-pagination__info">
        عرض <strong>{{ $auditreport->firstItem() ?? 0 }}–{{ $auditreport->lastItem() ?? 0 }}</strong> من <strong>{{ $auditreport->total() }}</strong>
    </div>
    <div class="am-pagination__nav">
        @if ($auditreport->onFirstPage())
            <button disabled>‹</button>
        @else
            <button data-page="{{ $auditreport->currentPage() - 1 }}" class="am-page-link">‹</button>
        @endif
        @php
            $current = $auditreport->currentPage();
            $last    = $auditreport->lastPage();
            $start   = max(1, $current - 2);
            $end     = min($last, $start + 4);
            $start   = max(1, $end - 4);
        @endphp
        @for ($p = $start; $p <= $end; $p++)
            <button data-page="{{ $p }}" class="am-page-link {{ $p == $current ? 'active' : '' }}">{{ $p }}</button>
        @endfor
        @if ($auditreport->hasMorePages())
            <button data-page="{{ $auditreport->currentPage() + 1 }}" class="am-page-link">›</button>
        @else
            <button disabled>›</button>
        @endif
    </div>
</div>
