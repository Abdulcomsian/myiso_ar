@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div style="display:flex;align-items:center;gap:12px;">
            <button type="button" class="am-page-guide-btn"
                data-toggle="modal" data-target="#amPageGuide"
                title="عن تعليمات العمل" aria-label="عن تعليمات العمل">
                <i class="fa fa-info-circle"></i>
            </button>
            <div>
                <h2>تعليمات العمل</h2>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ session('message') }}
        </div>
    @endif
    @if(session('msg'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ session('msg') }}
        </div>
    @endif

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <form method="GET" action="{{ url('/work_instruction') }}" class="am-search" id="amWiSearchForm" style="flex:1;max-width:340px;margin:0;">
                <i class="fa fa-search"></i>
                <input type="text" name="q" id="amWiSearch" value="{{ $search ?? '' }}" placeholder="البحث في تعليمات العمل..." autocomplete="off">
            </form>
            <button type="button" class="am-btn am-btn-primary" id="toggleWiForm">
                <i class="fa fa-plus"></i> إضافة تعليمات عمل
            </button>
        </div>

        <div class="am-inline-form" id="newWiForm" style="margin:16px 20px;">
            <form action="{{ route('workinstructions') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div><label>عنوان تعليمات العمل</label><input type="text" name="workinstruction" placeholder="عنوان العملية" required></div>
                    <div><label>المرجع</label><input type="text" name="instructionref" required></div>
                    <div><label>دورية المراجعة أو التنفيذ</label><select name="reviewFrequency"><option value="">اختر الدورية...</option>@foreach (App\Workinstructions::frequencyOptions() as $fqKey => $fqLabel)<option value="{{ $fqKey }}">{{ $fqLabel }}</option>@endforeach</select></div>
                </div>
                <div class="form-row">
                    <div>
                        <label>رقم الموظف المُعِدّ</label>
                        <select name="empId" required>
                            <option value="">اختر الموظف</option>
                            @foreach($employess as $emp)
                                <option value="{{ $emp->empNumber }}">{{ $emp->empNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div><label>تاريخ الإصدار</label><input type="date" max="2999-12-31" name="issueDate" required></div>
                    <div><label>حالة التعديل</label><input type="text" name="revisionstatus" required></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>النطاق</label><input type="text" name="scop" required></div>
                </div>
                <div class="form-row">
                    @for ($i = 1; $i <= 12; $i++)
                        <div><label>النقطة {{ $i }}</label><input type="text" name="point{{ $i }}"></div>
                    @endfor
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>أعدّه</label><input type="text" name="CompiledBy" required></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelWiForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ التعليمات</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div id="amWiContainer">
            @include('dashboard.form_records.partials.work_instruction_table')
        </div>
    </div>
</div>

{{-- Page guide --}}
@include('dashboard.form_records.partials.guides.work_instruction')

{{-- View modal --}}
<div class="am-modal" id="viewWiModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:820px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل تعليمات العمل</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">العنوان</div><div id="vwi-title">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">المرجع</div><div id="vwi-ref">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">رقم الموظف المُعِدّ</div><div id="vwi-emp">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">تاريخ الإصدار</div><div id="vwi-date">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">حالة التعديل</div><div id="vwi-rev">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">دورية المراجعة أو التنفيذ</div><div id="vwi-freq">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">أعدّه</div><div id="vwi-comp">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">النطاق</div><div id="vwi-scope">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:8px;">الخطوات</div><ol id="vwi-points" style="padding-inline-start:18px;margin:0;font-size:13px;line-height:1.6;"></ol></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">يغلق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editWiModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تحرير تعليمات العمل</h4>
        </div>
        <form action="{{ route('editworkinstructions') }}" method="POST" style="display:contents;">
            @csrf
            <input type="hidden" name="id" id="ewi-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-4"><label>العنوان</label><input type="text" class="form-control" name="workinstruction" required></div>
                    <div class="col-lg-4"><label>المرجع</label><input type="text" class="form-control" name="instructionref" required></div>
                    <div class="col-lg-4"><label>دورية المراجعة أو التنفيذ</label><select class="form-control" name="reviewFrequency"><option value="">اختر الدورية...</option>@foreach (App\Workinstructions::frequencyOptions() as $fqKey => $fqLabel)<option value="{{ $fqKey }}">{{ $fqLabel }}</option>@endforeach</select></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>رقم الموظف المُعِدّ</label>
                        <select class="form-control" name="empId" required>
                            <option value="">اختر الموظف</option>
                            @foreach($employess as $emp)
                                <option value="{{ $emp->empNumber }}">{{ $emp->empNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4"><label>تاريخ الإصدار</label><input type="date" class="form-control" name="issueDate" required></div>
                    <div class="col-lg-4"><label>حالة التعديل</label><input type="text" class="form-control" name="revisionstatus" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>النطاق</label><input type="text" class="form-control" name="scop" required></div>
                </div>
                <div class="form-group row">
                    @for ($i = 1; $i <= 12; $i++)
                        <div class="col-lg-4"><label>النقطة {{ $i }}</label><input type="text" class="form-control" name="point{{ $i }}"></div>
                    @endfor
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>أعدّه</label><input type="text" class="form-control" name="CompiledBy" required></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">يلغي</button>
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
            <button type="button" class="am-btn am-btn-outline am-modal-close">يلغي</button>
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
    var t = document.getElementById('toggleWiForm');
    var f = document.getElementById('newWiForm');
    var c = document.getElementById('cancelWiForm');
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
    var input     = document.getElementById('amWiSearch');
    var form      = document.getElementById('amWiSearchForm');
    var container = document.getElementById('amWiContainer');
    if (!container) return;
    var baseUrl = '{{ url('/work_instruction') }}';
    function debounce(fn, wait) { var t; return function() { var ctx = this, args = arguments; clearTimeout(t); t = setTimeout(function() { fn.apply(ctx, args); }, wait); }; }
    function showLoading() { container.style.opacity = '0.5'; container.style.pointerEvents = 'none'; }
    function hideLoading() { container.style.opacity = ''; container.style.pointerEvents = ''; }
    function fetchPage(page) {
        var q = input ? input.value.trim() : '';
        var url = baseUrl + '?q=' + encodeURIComponent(q) + '&page=' + page;
        showLoading();
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r){ return r.text(); })
            .then(function(html) { container.innerHTML = html; hideLoading(); })
            .catch(function() { hideLoading(); });
    }
    input && input.addEventListener('input', debounce(function() { fetchPage(1); }, 350));
    form  && form.addEventListener('submit', function(e) { e.preventDefault(); fetchPage(1); });
    container.addEventListener('click', function(e) {
        var btn = e.target.closest('.am-page-link');
        if (!btn || btn.disabled) return;
        e.preventDefault();
        var p = parseInt(btn.getAttribute('data-page'), 10);
        if (!isNaN(p) && p > 0) fetchPage(p);
    });
})();
// the wording for each stored key, taken from the model
var amWiFrequencies = @json(App\Workinstructions::frequencyOptions());
function amWiFreqLabel(k) { return (k && amWiFrequencies[k]) || '—'; }
function amWiView(d) {
    document.getElementById('vwi-title').textContent = d.workinstruction || '—';
    document.getElementById('vwi-ref').textContent = d.instructionref || '—';
    document.getElementById('vwi-emp').textContent = d.empId || '—';
    document.getElementById('vwi-date').textContent = d.issueDate ? new Date(d.issueDate).toLocaleDateString() : '—';
    document.getElementById('vwi-rev').textContent = d.revisionstatus || '—';
    document.getElementById('vwi-freq').textContent = amWiFreqLabel(d.reviewFrequency);
    document.getElementById('vwi-comp').textContent = d.CompiledBy || '—';
    document.getElementById('vwi-scope').textContent = d.scop || '—';
    var pointsEl = document.getElementById('vwi-points');
    pointsEl.innerHTML = '';
    for (var i = 1; i <= 12; i++) {
        var pt = d['point'+i];
        if (pt) { var li = document.createElement('li'); li.textContent = pt; pointsEl.appendChild(li); }
    }
    document.getElementById('viewWiModal').classList.add('open');
}
function amWiEdit(d) {
    document.getElementById('ewi-id').value = d.id || '';
    var m = document.getElementById('editWiModal');
    ['workinstruction','instructionref','issueDate','revisionstatus','scop','CompiledBy'].forEach(function(k){
        var el = m.querySelector("input[name='"+k+"']");
        if (el) el.value = d[k] || '';
    });
    var sel = m.querySelector("select[name='empId']"); if (sel) sel.value = d.empId || '';
    var fq = m.querySelector("select[name='reviewFrequency']"); if (fq) fq.value = d.reviewFrequency || '';
    for (var i = 1; i <= 12; i++) {
        var el = m.querySelector("input[name='point"+i+"']");
        if (el) el.value = d['point'+i] || '';
    }
    m.classList.add('open');
}
</script>
@endsection
