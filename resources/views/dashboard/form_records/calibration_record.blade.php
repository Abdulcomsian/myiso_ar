@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div style="display:flex;align-items:center;gap:12px;">
            {{-- the guide on this site is a Bootstrap modal, not an am-modal,
                 so it is opened the way Bootstrap opens one --}}
            <button type="button" class="am-page-guide-btn"
                data-toggle="modal" data-target="#amPageGuide"
                title="إضافة أو تعديل سجل معايرة" aria-label="إضافة أو تعديل سجل معايرة">
                <i class="fa fa-info-circle"></i>
            </button>
            <div>
                <h2>سجل المعايرة</h2>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ session('message') }}
        </div>
    @endif
    @if(Session::has('Success'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ Session::get('Success') }}
        </div>
    @endif

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <form method="GET" action="{{ url('/calibration_record') }}" class="am-search" id="amCalSearchForm" style="flex:1;max-width:340px;margin:0;">
                <i class="fa fa-search"></i>
                <input type="text" name="q" id="amCalSearch" value="{{ $search ?? '' }}" placeholder="ابحث في المعايرات…" autocomplete="off">
            </form>
            <button type="button" class="am-btn am-btn-primary" id="toggleCalForm">
                <i class="fa fa-plus"></i> إضافة سجل معايرة
            </button>
        </div>

        <div class="am-inline-form" id="newCalForm" style="margin:16px 20px;">
            <form action="{{ route('calibration') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>اسم الجهاز</label><input type="text" name="equipment" required></div>
                </div>
                <div class="form-row">
                    <div><label>الرقم التسلسلي</label><input type="text" name="serialNum" required></div>
                    <div><label>الموقع</label><input type="text" name="locaction" required></div>
                    <div><label>مرجع طريقة الاختبار</label><input type="text" name="testMethod" required></div>
                </div>
                <div class="form-row">
                    <div><label>معايير القبول</label><input type="text" name="acceptance" required></div>
                    <div><label>تاريخ المعايرة</label><input type="date" max="2999-12-31" name="calibratedDate" required></div>
                    <div><label>رقم الشهادة</label><input type="text" name="certificatenumber" required></div>
                </div>
                <div class="form-row">
                    <div><label>التكرار (بالأشهر، 1-12)</label><input type="number" min="1" max="12" name="freq" required></div>
                    <div><label>مراجع التقرير</label><input type="text" name="reportRev" required></div>
                    <div>
                        <label>النتيجة</label>
                        <select name="sentence" required>
                            <option value="">اختر</option>
                            <option value="Pass">نجاح</option>
                            <option value="Fail">فشل</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div><label>إرفاق الدليل</label><input name="attach_evidence" type="file"></div>
                    <div style="grid-column:span 2;"><label>أي مشاكل أو ملاحظات أخرى</label><input type="text" name="issues_points"></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelCalForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ السجل</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div id="amCalContainer">
            @include('dashboard.form_records.partials.calibration_table')
        </div>
    </div>
</div>

{{-- Page guide --}}
@include('dashboard.form_records.partials.guides.calibration_record')

{{-- View modal --}}
<div class="am-modal" id="viewCalModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:820px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل المعايرة</h4>
        </div>
        <div class="am-modal__body">
            @php $vf = [
                'equipment' => 'الجهاز', 'serialNum' => 'الرقم التسلسلي', 'locaction' => 'الموقع',
                'testMethod' => 'طريقة الاختبار', 'acceptance' => 'معايير القبول', 'calibratedDate' => 'تاريخ المعايرة',
                'certificatenumber' => 'رقم الشهادة', 'freq' => 'التكرار (شهور)', 'reportRev' => 'مراجع التقرير',
                'sentence' => 'النتيجة', 'issues_points' => 'ملاحظات',
            ]; @endphp
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                @foreach($vf as $k => $lb)
                    <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">{{ $lb }}</div><div id="vcal-{{ $k }}">—</div></div>
                @endforeach
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الدليل</div><div id="vcal-ev">—</div></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editCalModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل سجل المعايرة</h4>
        </div>
        <form action="{{ route('calibrationedit') }}" method="POST" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="id" id="ecal-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-12"><label>اسم الجهاز</label><input type="text" class="form-control" name="equipment" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>الرقم التسلسلي</label><input type="text" class="form-control" name="serialNum" required></div>
                    <div class="col-lg-4"><label>الموقع</label><input type="text" class="form-control" name="locaction" required></div>
                    <div class="col-lg-4"><label>مرجع طريقة الاختبار</label><input type="text" class="form-control" name="testMethod" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>معايير القبول</label><input type="text" class="form-control" name="acceptance" required></div>
                    <div class="col-lg-4"><label>تاريخ المعايرة</label><input type="date" class="form-control" name="calibratedDate" required></div>
                    <div class="col-lg-4"><label>رقم الشهادة</label><input type="text" class="form-control" name="certificatenumber" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>التكرار (بالأشهر)</label><input type="number" class="form-control" min="1" max="12" name="freq" required></div>
                    <div class="col-lg-4"><label>مراجع التقرير</label><input type="text" class="form-control" name="reportRev" required></div>
                    <div class="col-lg-4"><label>النتيجة</label>
                        <select class="form-control" name="sentence" required>
                            <option value="">اختر</option>
                            <option value="Pass">نجاح</option>
                            <option value="Fail">فشل</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>إرفاق الدليل</label><input name="attach_evidence" type="file" class="form-control"></div>
                    <div class="col-lg-6"><label>أي مشاكل أو ملاحظات أخرى</label><input type="text" class="form-control" name="issues_points"></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="am-modal" id="amConfirmDelete" role="dialog" aria-modal="true">
    <div class="am-modal__box">
        <div class="am-modal__header">
            <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
            <h4 class="am-modal__title">حذف <span id="amConfirmType">عنصر</span>؟</h4>
        </div>
        <div class="am-modal__body">
            أنت على وشك حذف <strong id="amConfirmLabel">هذا العنصر</strong> نهائيًا، ولا يمكن التراجع عن ذلك.
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
            <form id="amConfirmForm" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="id" id="amConfirmId">
                <button type="submit" class="am-btn" style="background:var(--am-danger);color:#fff;">
                    <i class="fa fa-trash"></i> نعم، احذف
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('click', function(e) {
    var close = e.target.closest('.am-modal-close');
    if (close) { var m = close.closest('.am-modal'); if (m) m.classList.remove('open'); return; }
    if (e.target.classList && e.target.classList.contains('am-modal')) e.target.classList.remove('open');
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') document.querySelectorAll('.am-modal.open').forEach(function(m){ m.classList.remove('open'); });
});
(function() {
    var t = document.getElementById('toggleCalForm');
    var f = document.getElementById('newCalForm');
    var c = document.getElementById('cancelCalForm');
    t && t.addEventListener('click', function() { f.classList.toggle('open'); });
    c && c.addEventListener('click', function() { f.classList.remove('open'); });
})();
document.addEventListener('click', function(e) {
    var btn = e.target.closest('.am-confirm-delete');
    if (!btn) return;
    e.preventDefault();
    document.getElementById('amConfirmForm').setAttribute('action', btn.getAttribute('data-action') || '');
    document.getElementById('amConfirmId').value = btn.getAttribute('data-id') || '';
    document.getElementById('amConfirmType').textContent = btn.getAttribute('data-type') || 'عنصر';
    document.getElementById('amConfirmLabel').textContent = btn.getAttribute('data-label') || 'هذا العنصر';
    document.getElementById('amConfirmDelete').classList.add('open');
});
(function() {
    var input = document.getElementById('amCalSearch');
    var form = document.getElementById('amCalSearchForm');
    var container = document.getElementById('amCalContainer');
    if (!container) return;
    var baseUrl = '{{ url('/calibration_record') }}';
    function debounce(fn, wait) { var t; return function() { var ctx = this, args = arguments; clearTimeout(t); t = setTimeout(function() { fn.apply(ctx, args); }, wait); }; }
    function showLoading() { container.style.opacity = '0.5'; container.style.pointerEvents = 'none'; }
    function hideLoading() { container.style.opacity = ''; container.style.pointerEvents = ''; }
    function fetchPage(page) {
        var q = input ? input.value.trim() : '';
        var url = baseUrl + '?q=' + encodeURIComponent(q) + '&page=' + page;
        showLoading();
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r) { return r.text(); })
            .then(function(html) { container.innerHTML = html; hideLoading(); })
            .catch(function() { hideLoading(); });
    }
    input && input.addEventListener('input', debounce(function() { fetchPage(1); }, 350));
    form && form.addEventListener('submit', function(e) { e.preventDefault(); fetchPage(1); });
    container.addEventListener('click', function(e) {
        var btn = e.target.closest('.am-page-link');
        if (!btn || btn.disabled) return;
        e.preventDefault();
        var p = parseInt(btn.getAttribute('data-page'), 10);
        if (!isNaN(p) && p > 0) fetchPage(p);
    });
})();
function amCalView(d){
    ['equipment','serialNum','locaction','testMethod','acceptance','calibratedDate','certificatenumber','freq','reportRev','sentence','issues_points'].forEach(function(k){
        var el = document.getElementById('vcal-'+k);
        if (el) el.textContent = d[k] || '—';
    });
    var ev = document.getElementById('vcal-ev');
    if (d.attach_evidence) { ev.innerHTML = '<a href="'+d.attach_evidence+'" target="_blank" style="color:var(--am-primary);"><i class="fa fa-external-link-alt"></i> عرض</a>'; } else ev.textContent='—';
    document.getElementById('viewCalModal').classList.add('open');
}
function amCalEdit(d){
    document.getElementById('ecal-id').value = d.id || '';
    ['equipment','serialNum','locaction','testMethod','acceptance','calibratedDate','certificatenumber','freq','reportRev','issues_points'].forEach(function(k){
        var el = document.querySelector("#editCalModal input[name='"+k+"']");
        if (el) el.value = d[k] || '';
    });
    var sel = document.querySelector("#editCalModal select[name='sentence']");
    if (sel) sel.value = d.sentence || '';
    document.getElementById('editCalModal').classList.add('open');
}
</script>
@endsection
