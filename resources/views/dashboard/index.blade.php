@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>مرحبًا، {{ Auth::user()->name }}</h2>
            <p>بوابة إدارة نظام الأيزو الخاصة بك</p>
        </div>
    </div>

    @if (!empty($showInactivityAlert) && $showInactivityAlert)
    {{-- Inactivity Warning Modal (only shows when previous last_login was 90+ days ago) --}}
    <div class="am-modal open" id="inactivityAlertOverlay" role="dialog" aria-modal="true">
        <div class="am-modal__box">
            <div class="am-modal__header">
                <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                <div>
                    <h4 class="am-modal__title">مراجعة النظام متأخرة</h4>
                    <p style="margin:2px 0 0;font-size:12.5px;color:var(--am-text-muted);">لم تقم بمراجعة وثائقك منذ فترة</p>
                </div>
            </div>
            <div class="am-modal__body">
                مضى 90 يومًا على آخر مراجعة لنظام الوثائق لديك. النظام غير المُحدَّث يعرّضك لخطر عدم اجتياز التدقيق وتعليق الشهادة أو سحبها. يرجى مراجعة سجلاتك وتحديثها.
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-danger am-modal-close">حسنًا، سأقوم بالمراجعة</button>
            </div>
        </div>
    </div>
    @endif

    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    {{-- Quick Links --}}
    <div style="display:flex; gap:1rem; flex-wrap:wrap; margin-bottom:1.5rem;">
        <a href="{{ url('quality_manual') }}" style="flex:1; min-width:160px; text-decoration:none;">
            <div class="am-card" style="text-align:center; padding:1.25rem 1rem; cursor:pointer;">
                <div style="font-size:2rem; color:var(--am-primary); margin-bottom:.5rem;"><i class="fa fa-book"></i></div>
                <div style="font-weight:600; color:var(--am-text);">الإجراءات والنماذج الرئيسية</div>
            </div>
        </a>
        <a href="{{ url('sale_processes') }}" style="flex:1; min-width:160px; text-decoration:none;">
            <div class="am-card" style="text-align:center; padding:1.25rem 1rem; cursor:pointer;">
                <div style="font-size:2rem; color:var(--am-primary); margin-bottom:.5rem;"><i class="fa fa-cogs"></i></div>
                <div style="font-weight:600; color:var(--am-text);">العمليات</div>
            </div>
        </a>
        <a href="{{ url('documented_information') }}" style="flex:1; min-width:160px; text-decoration:none;">
            <div class="am-card" style="text-align:center; padding:1.25rem 1rem; cursor:pointer;">
                <div style="font-size:2rem; color:var(--am-primary); margin-bottom:.5rem;"><i class="fa fa-file-text"></i></div>
                <div style="font-weight:600; color:var(--am-text);">الإجراءات</div>
            </div>
        </a>
        <a href="{{ url('requirements_aspect') }}" style="flex:1; min-width:160px; text-decoration:none;">
            <div class="am-card" style="text-align:center; padding:1.25rem 1rem; cursor:pointer;">
                <div style="font-size:2rem; color:var(--am-primary); margin-bottom:.5rem;"><i class="fa fa-clipboard"></i></div>
                <div style="font-weight:600; color:var(--am-text);">النماذج والسجلات</div>
            </div>
        </a>
        <a href="{{ url('work_instruction') }}" style="flex:1; min-width:160px; text-decoration:none;">
            <div class="am-card" style="text-align:center; padding:1.25rem 1rem; cursor:pointer;">
                <div style="font-size:2rem; color:var(--am-primary); margin-bottom:.5rem;"><i class="fa fa-list-ol"></i></div>
                <div style="font-weight:600; color:var(--am-text);">تعليمات العمل المحلية</div>
            </div>
        </a>
    </div>

    {{-- The objectives, as the tracker lists them. The ones already
         achieved are left out; everything else is here whether it is due
         an update or not. --}}
    <div class="am-card mb-3">
        <div class="am-card__body">
            <div style="margin-bottom:1.25rem;">
                <span style="display:inline-block;background:#c9d5f0;color:#3d5aa8;padding:6px 18px;border-radius:999px;font-size:14px;font-weight:600;">
                    متتبع الأهداف
                </span>
            </div>
            <div id="amObjDashContainer">
                @include('dashboard.form_records.partials.objectives_table', [
                    'showFilters' => false,
                    'actions'     => ['view', 'progress'],
                    'viewAllUrl'  => url('/objectives_tracker'),
                ])
            </div>
        </div>
    </div>
    {{-- Requirements Due --}}
    <div class="am-card mb-3">
        <div class="am-card__body">
            <div style="margin-bottom:1.25rem;">
                <span style="display:inline-block;background:#c9d5f0;color:#3d5aa8;padding:6px 18px;border-radius:999px;font-size:14px;font-weight:600;letter-spacing:0.2px;">
                    المتطلبات المطلوبة
                </span>
            </div>
            <div id="amDashReqContainer" data-dash-list data-page-name="reqpage" data-url="{{ url('/requirements_dashboard') }}">
                @include('dashboard.partials.dash_requirements')
            </div>
        </div>
    </div>

    {{-- Calibration Due --}}
    <div class="am-card mb-3">
        <div class="am-card__body">
            <div style="margin-bottom:1.25rem;">
                <span style="display:inline-block;background:#c9d5f0;color:#3d5aa8;padding:6px 18px;border-radius:999px;font-size:14px;font-weight:600;letter-spacing:0.2px;">
                    المعايرة المطلوبة
                </span>
            </div>
            <div id="amDashCalContainer" data-dash-list data-page-name="calpage" data-url="{{ url('/calibration_dashboard') }}">
                @include('dashboard.partials.dash_calibration')
            </div>
        </div>
    </div>

    {{-- ISO Certificates --}}
    <div class="am-card mb-3">
        <div class="am-card__body">
            <div style="margin-bottom:1.25rem;">
                <span style="display:inline-block;background:#c9d5f0;color:#3d5aa8;padding:6px 18px;border-radius:999px;font-size:14px;font-weight:600;letter-spacing:0.2px;">
                    شهادات ISO
                </span>
            </div>
            @php
                $hasCert = $user['iso9001_certificate'] || $user['iso14001_certificate'] || $user['iso45001_certificate'];
            @endphp
            @if(!$hasCert)
            <div class="am-empty">
                <i class="fa fa-certificate"></i>
                <p>لم يتم رفع أي شهادات.</p>
            </div>
            @else
            <div class="am-table-wrap">
                <table class="am-table">
                    <thead>
                        <tr>
                            <th>الشهادة</th>
                            <th>الرابط</th>
                            <th>الوصف</th>
                            <th>تاريخ انتهاء الصلاحية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user['iso9001_certificate'])
                        <tr>
                            <th>ISO9001</th>
                            <td>
                                <a href="{{ asset($user['iso9001_certificate']) }}" target="_blank">
                                    <i class="far fa-file-pdf fa-2x" style="color:red;"></i>
                                </a>
                            </td>
                            <td>{{ $user['iso9001_description'] }}</td>
                            <td>{{ date("d/m/Y", strtotime($user['iso9001_expirydate'])) }}</td>
                        </tr>
                        @endif
                        @if($user['iso14001_certificate'])
                        <tr>
                            <th>ISO14001</th>
                            <td>
                                <a href="{{ asset($user['iso14001_certificate']) }}" target="_blank">
                                    <i class="far fa-file-pdf fa-2x" style="color:red;"></i>
                                </a>
                            </td>
                            <td>{{ $user['iso14001_description'] }}</td>
                            <td>{{ date("d/m/Y", strtotime($user['iso14001_expirydate'])) }}</td>
                        </tr>
                        @endif
                        @if($user['iso45001_certificate'])
                        <tr>
                            <th>ISO45001</th>
                            <td>
                                <a href="{{ asset($user['iso45001_certificate']) }}" target="_blank">
                                    <i class="far fa-file-pdf fa-2x" style="color:red;"></i>
                                </a>
                            </td>
                            <td>{{ $user['iso45001_description'] }}</td>
                            <td>{{ date("d/m/Y", strtotime($user['iso45001_expirydate'])) }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    {{-- Supporting Documents --}}
    <div class="am-card mb-3">
        <div class="am-card__body">
            <div style="margin-bottom:1.25rem;">
                <span style="display:inline-block;background:#c9d5f0;color:#3d5aa8;padding:6px 18px;border-radius:999px;font-size:14px;font-weight:600;letter-spacing:0.2px;">
                    المستندات الداعمة
                </span>
            </div>
            @php
                // the four documents this card offers, in the order they were in
                $docs = [
                    ['title' => 'تقرير التدقيق',
                     'url'   => !empty($user['audit_report']) ? asset($user['audit_report']) : null,
                     'none'  => 'غير متوفر'],
                    ['title' => 'نظرة عامة على التدقيق عن بُعد',
                     'url'   => '/uploads/user/pdfs/Remote-Audit-Overview.pdf',
                     'none'  => ''],
                    ['title' => 'استخدام الشهادات وعلامات التصديق',
                     'url'   => '/uploads/user/pdfs/Use-Of-Certificate-and-Certification-Marks.pdf',
                     'none'  => ''],
                    ['title' => 'اتفاقية شهادة ضمان الجودة',
                     'url'   => !empty($user['qa_certification']) ? asset($user['qa_certification']) : null,
                     'none'  => 'غير متوفر'],
                ];
            @endphp
            @include('dashboard.partials.dash_supporting_docs', [
                'docs'    => $docs,
                'comment' => $user['audit_comment'] ?? '',
                'labels'  => ['comments' => 'تعليقات المدقق',
                              'no_comments' => 'لا توجد تعليقات.'],
            ])
        </div>
    </div>

</div>

{{-- Delete Calibration Modal --}}
<div class="am-modal" id="calibrationModal" role="dialog" aria-modal="true">
    <div class="am-modal__box">
        <div class="am-modal__header">
            <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
            <h4 class="am-modal__title">حذف سجل المعايرة؟</h4>
        </div>
        <div class="am-modal__body">
            أنت على وشك حذف سجل المعايرة هذا نهائيًا. لا يمكن التراجع عن هذا الإجراء.
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
            <form action="{{ route('deletecaliberinfo') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="id" id="req_id2" value=""/>
                <button type="submit" class="am-btn am-btn-lightblue">
                    <i class="fa fa-trash"></i> نعم، احذف
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Delete Requirement Modal --}}
<div class="am-modal" id="myModal" role="dialog" aria-modal="true">
    <div class="am-modal__box">
        <div class="am-modal__header">
            <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
            <h4 class="am-modal__title">حذف المتطلب؟</h4>
        </div>
        <div class="am-modal__body">
            أنت على وشك حذف هذا المتطلب نهائيًا. لا يمكن التراجع عن هذا الإجراء.
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
            <form action="{{ route('deleteRequirementadmin') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="id" id="req_id" value=""/>
                <button type="submit" class="am-btn am-btn-lightblue">
                    <i class="fa fa-trash"></i> نعم، احذف
                </button>
            </form>
        </div>
    </div>
</div>

{{-- What the row buttons open. Edit and Delete are not drawn on this card,
     but their modals are here so turning them on is one word above. --}}
@include('dashboard.form_records.partials.objective_modals', ['evidenceId' => 'objDashEvidence'])
@include('dashboard.form_records.partials.objective_scripts', [
    'listUrl'     => url('/objectives_dashboard'),
    'containerId' => 'amObjDashContainer',
    'syncUrl'     => false,
])
@endsection

@section('myscript')
<script>
    // Open modals.
    //
    // Delegated rather than bound to the buttons that happen to be on the page
    // at load: these lists are paged now, so the rows are replaced as you move
    // through them and a button bound once would be dead on the second page.
    document.addEventListener('click', function (e) {
        var req = e.target.closest('.delete_requirement');
        if (req) {
            e.preventDefault();
            document.getElementById('req_id').value = req.getAttribute('data-id');
            document.getElementById('myModal').classList.add('open');
            return;
        }
        var cal = e.target.closest('.calibrationModal');
        if (cal) {
            e.preventDefault();
            document.getElementById('req_id2').value = cal.getAttribute('data-id');
            document.getElementById('calibrationModal').classList.add('open');
        }
    });

    // The pager on a dashboard card. One handler for every card that carries
    // data-dash-list, so a new card needs no new script. The address bar is
    // left alone - paging a card is not navigating the page.
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-dash-list] .am-page-link');
        if (!btn || btn.disabled) return;
        e.preventDefault();
        var box  = btn.closest('[data-dash-list]');
        var page = parseInt(btn.getAttribute('data-page'), 10);
        if (!box || isNaN(page) || page < 1) return;
        var url  = box.getAttribute('data-url');
        box.style.opacity = '0.5';
        fetch(url + '?' + (box.getAttribute('data-page-name') || 'page') + '=' + page, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (r) { return r.text(); })
            .then(function (html) { box.innerHTML = html; box.style.opacity = ''; })
            .catch(function () { box.style.opacity = ''; });
    });

    // Close modal on Cancel / overlay click / Escape
    document.addEventListener('click', function(e) {
        var close = e.target.closest('.am-modal-close');
        if (close) { var m = close.closest('.am-modal'); if (m) m.classList.remove('open'); return; }
        if (e.target.classList && e.target.classList.contains('am-modal')) e.target.classList.remove('open');
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.am-modal.open').forEach(function(m){ m.classList.remove('open'); });
    });
</script>
@endsection

{{-- What the row buttons open. Edit and Delete are not drawn on this card,
     but their modals are here so turning them on is one word above. --}}
