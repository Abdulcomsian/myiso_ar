<div class="am-table-wrap">
    <table class="am-table" id="amUsersTable">
        <thead>
        <tr>
            <th>الشركة</th>
            <th>جهة الاتصال</th>
            <th>الدولة</th>
            <th>تفعيل التسجيل</th>
            <th>آخر تسجيل دخول</th>
            <th>تاريخ الانتهاء</th>
            <th style="text-align:left;">الإجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $item)
            @php
                $iso9001 = $item->iso9001_expirydate;
                $iso14001 = $item->iso14001_expirydate;
                $iso45001 = $item->iso45001_expirydate;
                $x = strtotime($iso9001);
                $y = strtotime($iso14001);
                $z = strtotime($iso45001);
                if ($x == 0 && $y == 0 && $z == 0) {
                    $minValueRaw = strtotime('+3 years');
                } else if ($x >= 0 && $y <= 0 && $z <= 0) {
                    $minValueRaw = $x;
                } else if ($x <= 0 && $y >= 0 && $z <= 0) {
                    $minValueRaw = $y;
                } else if ($x <= 0 && $y <= 0 && $z >= 0) {
                    $minValueRaw = $z;
                } else if ($x >= 0 && $y >= 0 && $z <= 0) {
                    $minValueRaw = min($x, $y);
                } else if ($x >= 0 && $y <= 0 && $z >= 0) {
                    $minValueRaw = min($x, $z);
                } else if ($x <= 0 && $y >= 0 && $z >= 0) {
                    $minValueRaw = min($y, $z);
                } else {
                    $minValueRaw = min($x, min($y, $z));
                }
                $minValue = date('d/m/Y', $minValueRaw);
                $daysToExpiry = intval(($minValueRaw - time()) / 86400);
            @endphp
            <tr>
                <td>
                    <div class="am-user-cell">
                        <span class="am-avatar">
                            {{ strtoupper(substr($item->company_name ?? $item->name ?? 'U', 0, 1)) }}
                            @if(!empty($item->profile_image))
                                <img src="{{ asset($item->profile_image) }}" alt="" onerror="this.remove();">
                            @endif
                        </span>
                        <div>
                            <span class="am-cell-primary">{{ $item->company_name ?? '—' }}</span>
                            <span class="am-cell-sub">المعرف: {{ $item->order_number ?? $item->id }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="am-cell-primary">{{ $item->name ?? '—' }}</span>
                    <span class="am-cell-sub">{{ $item->email ?? '' }}</span>
                </td>
                <td>{{ $item->country ?? '—' }}</td>
                <td>
                    @if($item->created_at)
                        <span class="am-chip info">{{ date('d M Y', strtotime($item->created_at)) }}</span>
                    @else
                        <span class="am-cell-sub">—</span>
                    @endif
                </td>
                <td>
                    @if(!empty($item->last_login))
                        <span class="am-cell-primary">{{ date('d M Y', strtotime($item->last_login)) }}</span>
                    @else
                        <span class="am-cell-sub">-</span>
                    @endif
                </td>
                <td>
                    @if($daysToExpiry < 0)
                        <span class="am-chip danger">منتهية الصلاحية</span>
                    @elseif($daysToExpiry < 30)
                        <span class="am-chip warning">{{ $minValue }}</span>
                    @else
                        <span class="am-chip success">{{ $minValue }}</span>
                    @endif
                </td>
                <td style="text-align:left;white-space:nowrap;">
                    <div class="am-actions">
                        <button class="am-icon-btn" title="سجل التنزيلات" onclick="get_downloads({{$item->id}})"><i class="fa fa-download"></i></button>
                        <button class="am-icon-btn" title="سجل الملاحظات" onclick="get_notes({{$item->order_number}})"><i class="fas fa-info-circle"></i></button>
                        <button class="am-icon-btn" title="سجل تسجيل الدخول" onclick="get_history({{$item->id}})"><i class="fas fa-sign-in-alt"></i></button>
                        <button class="am-icon-btn" title="تذكير النشاط" onclick="userEmailDetail({{$item->id}})"><i class="fa fa-envelope"></i></button>
                        <button class="am-icon-btn" title="تعديل" onclick="editDetails({{$item}})"><i class="fa fa-pen"></i></button>
                        <a href="/edit_user/{{$item->id}}" class="am-icon-btn" title="عرض النماذج"><i class="fa fa-file-alt"></i></a>
                        <button class="am-icon-btn danger" title="حذف" onclick="deleteUser({{$item->id}})"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">
                    <div class="am-empty">
                        <i class="fa fa-users"></i>
                        <p class="text-center">لم يتم العثور على مستخدمين.</p>
                    </div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="am-pagination">
    <div class="am-pagination__info">
        عرض <strong>{{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }}</strong> من <strong>{{ number_format($users->total()) }}</strong>
    </div>
    <div class="am-pagination__nav">
        @if ($users->onFirstPage())
            <button disabled>‹</button>
        @else
            <button data-page="{{ $users->currentPage() - 1 }}" class="am-page-link">‹</button>
        @endif

        @php
            $current = $users->currentPage();
            $last = $users->lastPage();
            $start = max(1, $current - 2);
            $end = min($last, $start + 4);
            $start = max(1, $end - 4);
        @endphp
        @for ($p = $start; $p <= $end; $p++)
            <button data-page="{{ $p }}" class="am-page-link {{ $p == $current ? 'active' : '' }}">{{ $p }}</button>
        @endfor

        @if ($users->hasMorePages())
            <button data-page="{{ $users->currentPage() + 1 }}" class="am-page-link">›</button>
        @else
            <button disabled>›</button>
        @endif
    </div>
</div>
