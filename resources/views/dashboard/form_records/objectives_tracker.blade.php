@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div style="display:flex;align-items:center;gap:12px;">
            <button type="button" class="am-page-guide-btn"
                onclick="document.getElementById('amPageGuide').classList.add('open')"
                title="متتبع الأهداف" aria-label="متتبع الأهداف">
                <i class="fa fa-info-circle"></i>
            </button>
            <div>
                <h2>متتبع الأهداف</h2>
            </div>
        </div>
    </div>

    @if(session('Success'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ session('Success') }}
        </div>
    @endif

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <form method="GET" action="{{ url('/objectives_tracker') }}" class="am-search" id="amObjSearchForm" style="flex:1;max-width:340px;margin:0;">
                <i class="fa fa-search"></i>
                <input type="text" name="q" id="amObjSearch" value="{{ $search ?? '' }}" placeholder="ابحث في الأهداف…" autocomplete="off">
            </form>
            <button type="button" class="am-btn am-btn-primary" id="toggleObjForm">
                <i class="fa fa-plus"></i> إضافة هدف
            </button>
        </div>

        <div class="am-inline-form" id="newObjForm" style="margin:16px 20px;">
            <form action="{{ route('objective.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>الهدف *</label><input type="text" name="objective" placeholder="خفض النفايات العامة المرسلة إلى المكبّ بنسبة 15%" required></div>
                </div>
                <div class="form-row">
                    <div><label>طريقة القياس *</label><input type="text" name="how_measured" placeholder="وزن النفايات الشهري في فواتير المورّد" required></div>
                    <div><label>نقطة البداية</label><input type="text" name="starting_point" placeholder="4.2 طن في 2025"></div>
                    <div><label>المستهدف *</label><input type="text" name="target" placeholder="3.6 طن أو أقل" required></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>كيف سيتحقق ذلك</label><textarea name="how_achieved" rows="3" placeholder="إضافة حاويات إعادة تدوير في كل محطة؛ تدريب الموظفين في اجتماع الفريق في أبريل؛ التحول إلى مورّد يعيد تدوير الكرتون"></textarea></div>
                </div>
                <div class="form-row">
                    <div>
                        <label>الشخص المسؤول *</label>
                        <select name="person_responsible" required>
                            <option value="">اختر موظفًا…</option>
                            @foreach ($employees as $emp)
                                <option value="{{ trim($emp->first_name . ' ' . $emp->surname) }}">{{ trim($emp->first_name . ' ' . $emp->surname) ?: $emp->empNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>اعتُمد في</label>
                        <select name="agreed_at">
                            <option value="">اختر مراجعة الإدارة…</option>
                            @foreach ($reviews as $rev)
                                <option value="{{ $rev->id }}">{{ $rev->mgtreviewId ? 'مراجعة ' . $rev->mgtreviewId : 'Review' }}@if($rev->reviewdate) — {{ date('d/m/Y', strtotime($rev->reviewdate)) }}@endif</option>
                            @endforeach
                        </select>
                    </div>
                    <div><label>الموعد النهائي *</label><input type="date" max="2999-12-31" name="deadline" required></div>
                    <div>
                        <label>الحالة</label>
                        <select name="status">
                            @foreach (App\Objective::statuses() as $key => $st)
                                <option value="{{ $key }}" {{ $key === 'not_started' ? 'selected' : '' }}>{{ $st['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelObjForm">يلغي</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ الهدف</button>
                </div>
            </form>
        </div>
    </div>

    {{-- What each status means --}}
    <div class="am-card" style="margin-bottom:16px;padding:16px 20px;background:rgba(247,183,49,0.07);border:1px solid rgba(247,183,49,0.28);">
        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:#8a6a12;font-weight:600;margin-bottom:12px;">معنى كل حالة</div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:14px 18px;">
            @foreach (App\Objective::statuses() as $st)
                <div>
                    <span class="am-chip {{ $st['chip'] }}">{{ $st['label'] }}</span>
                    <div style="font-size:12.5px;color:var(--am-text);line-height:1.5;margin-top:6px;">{{ $st['means'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="am-card">
        <div id="amObjContainer">
            @include('dashboard.form_records.partials.objectives_table')
        </div>
    </div>
</div>

{{-- Page guide --}}
<div class="am-modal" id="amPageGuide" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:600px;">
        <div class="am-modal__header">
            <span class="am-modal__icon am-page-guide-icon"><i class="fa fa-info-circle"></i></span>
            <div>
                <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;">النماذج والسجلات</div>
                <h4 class="am-modal__title" style="color:var(--am-primary);">متتبع الأهداف</h4>
            </div>
        </div>
        <div class="am-modal__body" style="color:var(--am-text);">
            <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
            <p style="margin:0 0 16px;">الصفحة التي تسجّل فيها أهدافك القابلة للقياس في مجالات الجودة (ISO 9001) والبيئة (ISO 14001) والصحة والسلامة (ISO 45001)، وتتابع فيها مدى تقدمك في تحقيقها على مدار العام.</p>

            <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما أهميته؟</h5>
            <p style="margin:0 0 16px;">تُتفق الأهداف في اجتماع مراجعة الإدارة، لكنها تحتاج إلى متابعة بين الاجتماعات. ويُظهر تسجيل التقدم بانتظام ما إذا كان كل هدف يسير وفق الخطة أو متأخرًا أو محقَّقًا. ويمكن للمدقق أن يطلب الاطلاع على التقدم الحالي في أي وقت، وسجل التقدم في هذه الصفحة هو الدليل على ذلك.</p>

            <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
            <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                <li style="margin-bottom:6px;">انقر على إضافة هدف ، ثم اختر المواصفة, الهدف هو التحسين.</li>
                <li style="margin-bottom:6px;">اكتب الهدف بحيث يمكن قياسه. فعبارة «تحسين السلامة» غير قابلة للقياس، أما «عدم وقوع أي حادث يتسبب في فقدان أيام عمل خلال عام 2026» فقابلة للقياس.</li>
                <li style="margin-bottom:6px;">أدخِل طريقة القياس ونقطة البداية والمستهدف، لتتمكن من إثبات التحسن.</li>
                <li style="margin-bottom:6px;">أضِف ما سيُنفَّذ، والمسؤول، والموعد النهائي، واجتماع مراجعة الإدارة الذي اعتُمد فيه الهدف.</li>
                <li style="margin-bottom:6px;">حدّث التقدم مرة كل ثلاثة أشهر على الأقل، وأرفِق أدلة مثل الأرقام أو التقارير أو الصور أو مقاطع الفيديو.</li>
                <li style="margin-bottom:6px;">أبقِ الحالة محدّثة: لم يبدأ أو يسير وفق الخطة أو في خطر أو محقَّق أو غير محقَّق.</li>
                <li>راجِع كل هدف في اجتماع مراجعة الإدارة التالي، ثم اتفقوا على أهداف جديدة للعام المقبل.</li>
            </ul>
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">يغلق</button>
        </div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="viewObjModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:760px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل الهدف</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px 18px;">
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الهدف</div><div id="vobj-objective">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">طريقة القياس</div><div id="vobj-measured">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">نقطة البداية</div><div id="vobj-start">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">المستهدف</div><div id="vobj-target">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">كيف سيتحقق ذلك</div><div id="vobj-achieved">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الشخص المسؤول</div><div id="vobj-person">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الموعد النهائي</div><div id="vobj-deadline">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الحالة</div><div id="vobj-status">—</div></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">يغلق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editObjModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تحرير الهدف</h4>
        </div>
        <form action="{{ route('objective.update') }}" method="POST" style="display:contents;">
            @csrf
            <input type="hidden" name="id" id="eobj-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-12"><label>الهدف *</label><input type="text" class="form-control" name="objective" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>طريقة القياس *</label><input type="text" class="form-control" name="how_measured" required></div>
                    <div class="col-lg-4"><label>نقطة البداية</label><input type="text" class="form-control" name="starting_point"></div>
                    <div class="col-lg-4"><label>المستهدف *</label><input type="text" class="form-control" name="target" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>كيف سيتحقق ذلك</label><textarea class="form-control" name="how_achieved" rows="3"></textarea></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>الشخص المسؤول *</label>
                        <select class="form-control" name="person_responsible" required>
                            <option value="">اختر موظفًا…</option>
                            @foreach ($employees as $emp)
                                <option value="{{ trim($emp->first_name . ' ' . $emp->surname) }}">{{ trim($emp->first_name . ' ' . $emp->surname) ?: $emp->empNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>اعتُمد في</label>
                        <select class="form-control" name="agreed_at">
                            <option value="">اختر مراجعة الإدارة…</option>
                            @foreach ($reviews as $rev)
                                <option value="{{ $rev->id }}">{{ $rev->mgtreviewId ? 'مراجعة ' . $rev->mgtreviewId : 'Review' }}@if($rev->reviewdate) — {{ date('d/m/Y', strtotime($rev->reviewdate)) }}@endif</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3"><label>الموعد النهائي *</label><input type="date" max="2999-12-31" class="form-control" name="deadline" required></div>
                    <div class="col-lg-3">
                        <label>الحالة</label>
                        <select class="form-control" name="status">
                            @foreach (App\Objective::statuses() as $key => $st)
                                <option value="{{ $key }}">{{ $st['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">يلغي</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- Update progress --}}
<div class="am-modal" id="progressObjModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:860px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-chart-line"></i></span>
            <div>
                <h4 class="am-modal__title">تحديث التقدم</h4>
                <div id="pobj-title" style="font-size:12.5px;color:var(--am-text-muted);"></div>
            </div>
        </div>
        <form action="{{ route('objective.progress') }}" method="POST" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="objective_id" id="pobj-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>ملاحظة التقدم *</label><input type="text" class="form-control" name="note" placeholder="انخفاض بنسبة 9% مقارنة بالفترة نفسها من العام الماضي" required></div>
                    <div class="col-lg-3">
                        <label>الحالة *</label>
                        <select class="form-control" name="status" id="pobj-status" required>
                            @foreach (App\Objective::statuses() as $key => $st)
                                <option value="{{ $key }}">{{ $st['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3"><label>التاريخ</label><input type="date" max="2999-12-31" class="form-control" name="update_date" id="pobj-date"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>الدليل <span style="color:var(--am-text-soft);">PDF أو JPEG أو TXT أو DOCX أو PNG — فاتورة نفايات أو فاتورة طاقة أو سجل شكاوى أو تقرير حادث</span></label>
                        <input type="file" class="form-control" name="evidence" accept=".pdf,.jpg,.jpeg,.txt,.doc,.docx,.png">
                    </div>
                </div>

                <div style="border-top:1px solid var(--am-border);padding-top:14px;margin-top:6px;">
                    <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:10px;">سجل التقدم</div>
                    <div id="pobj-history"></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">يلغي</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> حفظ التحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- Delete --}}
<div class="am-modal" id="amObjConfirmDelete" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:460px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:rgba(235,77,75,0.12);color:var(--am-danger);"><i class="fa fa-exclamation-triangle"></i></span>
            <h4 class="am-modal__title">حذف الهدف</h4>
        </div>
        <div class="am-modal__body"><p style="margin:0;">سيؤدي هذا إلى حذف الهدف وسجل تقدمه بالكامل، ولا يمكن التراجع عن ذلك.</p></div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">يلغي</button>
            <form action="{{ route('objective.destroy') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="id" id="dobj-id">
                <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> حذف</button>
            </form>
        </div>
    </div>
</div>

<script>
// Closing a modal: the close button, the backdrop, or Escape - the same
// handler every other page on this site uses.
document.addEventListener('click', function(e) {
    var close = e.target.closest('.am-modal-close');
    if (close) { var m = close.closest('.am-modal'); if (m) m.classList.remove('open'); return; }
    if (e.target.classList && e.target.classList.contains('am-modal')) e.target.classList.remove('open');
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') document.querySelectorAll('.am-modal.open').forEach(function(m){ m.classList.remove('open'); });
});
var amObjStatuses = @json(App\Objective::statuses());

document.addEventListener('DOMContentLoaded', function () {
    var form   = document.getElementById('newObjForm');
    var toggle = document.getElementById('toggleObjForm');
    var cancel = document.getElementById('cancelObjForm');
    toggle && toggle.addEventListener('click', function () { form.classList.toggle('open'); });
    cancel && cancel.addEventListener('click', function () { form.classList.remove('open'); });
});

// search and paging without a full page load, as the other lists do
(function () {
    var input     = document.getElementById('amObjSearch');
    var form      = document.getElementById('amObjSearchForm');
    var container = document.getElementById('amObjContainer');
    if (!container) return;
    var baseUrl = '{{ url('/objectives_tracker') }}';
    var status  = '{{ $status ?? '' }}';

    function debounce(fn, wait) { var t; return function () { var c = this, a = arguments; clearTimeout(t); t = setTimeout(function () { fn.apply(c, a); }, wait); }; }
    function fetchPage(page) {
        var q = input ? input.value.trim() : '';
        var url = baseUrl + '?q=' + encodeURIComponent(q) + '&status=' + encodeURIComponent(status) + '&page=' + page;
        container.style.opacity = '0.5';
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (r) { return r.text(); })
            .then(function (html) { container.innerHTML = html; container.style.opacity = ''; window.history.replaceState({}, '', url); })
            .catch(function () { container.style.opacity = ''; });
    }
    form && form.addEventListener('submit', function (e) { e.preventDefault(); fetchPage(1); });
    input && input.addEventListener('input', debounce(function () { fetchPage(1); }, 300));
    container.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-page]');
        if (!btn) return;
        e.preventDefault();
        var p = parseInt(btn.getAttribute('data-page'), 10);
        if (!isNaN(p) && p > 0) fetchPage(p);
    });
    container.addEventListener('click', function (e) {
        var chip = e.target.closest('[data-status-filter]');
        if (!chip) return;
        e.preventDefault();
        status = chip.getAttribute('data-status-filter');
        fetchPage(1);
    });
})();

function amObjView(d) {
    document.getElementById('vobj-objective').textContent = d.objective || '—';
    document.getElementById('vobj-measured').textContent  = d.how_measured || '—';
    document.getElementById('vobj-start').textContent     = d.starting_point || '—';
    document.getElementById('vobj-target').textContent    = d.target || '—';
    document.getElementById('vobj-achieved').textContent  = d.how_achieved || '—';
    document.getElementById('vobj-person').textContent    = d.person_responsible || '—';
    document.getElementById('vobj-deadline').textContent  = d.deadline ? new Date(d.deadline).toLocaleDateString() : '—';
    var st = amObjStatuses[d.status];
    document.getElementById('vobj-status').innerHTML =
        '<span class="am-chip ' + (st ? st.chip : '') + '">' + (st ? st.label : (d.status || '—')) + '</span>';
    document.getElementById('viewObjModal').classList.add('open');
}

function amObjEdit(d) {
    var m = document.getElementById('editObjModal');
    document.getElementById('eobj-id').value = d.id || '';
    ['objective', 'how_measured', 'starting_point', 'target', 'deadline'].forEach(function (k) {
        var el = m.querySelector("[name='" + k + "']");
        if (el) el.value = d[k] || '';
    });
    var ta = m.querySelector("[name='how_achieved']"); if (ta) ta.value = d.how_achieved || '';
    ['person_responsible', 'agreed_at', 'status'].forEach(function (k) {
        var el = m.querySelector("select[name='" + k + "']");
        if (el) el.value = d[k] || '';
    });
    m.classList.add('open');
}

// the history is rendered from the rows the server sent with the list
function amObjProgress(d, history) {
    document.getElementById('pobj-id').value = d.id || '';
    document.getElementById('pobj-title').textContent = d.objective || '';
    var sel = document.getElementById('pobj-status'); if (sel) sel.value = d.status || 'not_started';
    var dt = document.getElementById('pobj-date');
    if (dt && !dt.value) { dt.value = new Date().toISOString().slice(0, 10); }   // today, as a starting point

    var box = document.getElementById('pobj-history');
    box.innerHTML = '';
    if (!history || !history.length) {
        box.innerHTML = '<div style="font-size:13px;color:var(--am-text-muted);">لم يُسجَّل أي تقدم بعد.</div>';
    } else {
        history.forEach(function (h) {
            var st = amObjStatuses[h.status] || { chip: '', label: h.status };
            var row = document.createElement('div');
            row.style.cssText = 'display:grid;grid-template-columns:110px 120px 1fr 110px;gap:12px;align-items:start;padding:10px 0;border-bottom:1px solid var(--am-border);font-size:13px;';
            row.innerHTML =
                '<div style="color:var(--am-text-muted);">' + (h.update_date ? new Date(h.update_date).toLocaleDateString() : '—') + '</div>' +
                '<div><span class="am-chip ' + st.chip + '">' + st.label + '</span></div>' +
                '<div>' + (h.note ? String(h.note).replace(/[<>&]/g, function (c) { return { '<': '&lt;', '>': '&gt;', '&': '&amp;' }[c]; }) : '') + '</div>' +
                '<div>' + (h.evidence
                    ? '<a href="{{ asset('objective_evidence') }}/' + encodeURIComponent(h.evidence) + '" target="_blank">' + h.evidence + '</a>'
                    : '—') + '</div>';
            box.appendChild(row);
        });
    }
    document.getElementById('progressObjModal').classList.add('open');
}

function amObjDelete(id) {
    document.getElementById('dobj-id').value = id;
    document.getElementById('amObjConfirmDelete').classList.add('open');
}
</script>
@endsection
