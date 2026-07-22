@extends('admin.dashboard.layouts.app')

@section('content')
@php
$urlparam = request()->route()->parameters;

// Full ISO 9001:2015 audit checklist mapping:
// [radio_field, evidence_field (or null), clause_no, label]
$qmsChecklist = [
    ['qmsCorects',       'evidence',    '4.1',  'فهم المنظمة وسياقها'],
    ['needExpactations', 'evidance2',   '4.2',  'متطلبات وتوقعات الأطراف المعنية'],
    ['correction3',      'evidence3',   '4.3',  'نطاق نظام إدارة الجودة'],
    ['correction4',      'evidance4',   '4.4',  'نظام إدارة الجودة وإجراءاته'],
    ['correction5',      'evidence5',   '5.1',  'القيادة والالتزام'],
    ['correction6',      'evidance7',   '5.2',  'السياسة (سياسة الجودة)'],
    ['correction7',      'evidance7_1', '5.3',  'الأدوار والمسؤوليات والصلاحيات التنظيمية'],
    ['correction8',      'evidance8',   '6.1',  'إجراءات معالجة المخاطر والفرص'],
    ['correction9',      'evidance10',  '6.2',  'أهداف الجودة والتخطيط'],
    ['correction11',     'evidance12',  '6.3',  'تخطيط التغييرات'],
    ['correction12',     'evidence13',  '7.1',  'الموارد (الأفراد، البنية التحتية، البيئة)'],
    ['correction13',     'evidance14',  '7.2',  'الكفاءة (سجلات التدريب)'],
    ['correction14',     null,          '7.3',  'الوعي'],
    ['correction15',     'evidence15',  '7.4',  'التواصل'],
    ['correction16',     null,          '7.5',  'المعلومات الموثقة'],
    ['correciton17',     null,          '8.1',  'تخطيط وإدارة العمليات'],
    ['correction18',     'evidence19',  '8.2',  'متطلبات المنتجات والخدمات'],
    ['correction19',     'evidence20',  '8.3',  'التصميم والتطوير'],
    ['correction20',     'evidence21',  '8.4',  'التحكم في العمليات/المنتجات المقدمة خارجيًا'],
    ['correction21',     null,          '8.5',  'تقديم الإنتاج والخدمة'],
    ['correction22',     'evidence23',  '8.6',  'الإفراج عن المنتجات والخدمات'],
    ['correction23',     null,          '8.7',  'التحكم في المخرجات غير المطابقة'],
    ['correction24',     'evidence25',  '9.1',  'المراقبة والقياس والتحليل والتقييم'],
    ['correction25',     'evidence26',  '9.1.2','رضا العميل'],
    ['correction26',     'evidence27',  '9.2',  'التدقيق الداخلي'],
    ['correction27',     'evidence28',  '9.3',  'مراجعة الإدارة'],
    ['correction28',     'evidence29',  '10.1', 'التحسين'],
    ['correction30',     'evidence30',  '10.2', 'عدم المطابقة والإجراء التصحيحي'],
    ['correction29',     'evidence31',  '10.3', 'التحسين المستمر'],
];
@endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>عمليات تدقيق نظام إدارة الجودة</h2>
            <p>تدقيق أفقي سنوي لكل بند من بنود معيار ISO 9001:2015.</p>
        </div>
        <div>
            <a href="{{ url('/edit_user/'.$urlparam['userid']) }}" class="am-btn am-btn-outline">
                <i class="fa fa-arrow-left"></i> العودة إلى النماذج
            </a>
        </div>
    </div>

    @if ($message = Session::get('msg'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="am-card" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
        <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;"><i class="fa fa-info-circle"></i></span>
            <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                تدقيق أفقي لكل بند من بنود معيار ISO. عادةً ما تكون الدورية سنوية لتحديد مستوى الامتثال.
                تُجرى عمليات التدقيق وفقًا لـ <a href="{{ url('auidt') }}" style="color:var(--am-primary);">عمليات التدقيق</a>.
            </div>
        </div>
    </div>

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amQmsSearch" placeholder="ابحث في تدقيقات نظام إدارة الجودة…" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="toggleQmsForm">
                <i class="fa fa-plus"></i> إضافة تدقيق نظام إدارة الجودة
            </button>
        </div>

        <div class="am-inline-form" id="newQmsForm" style="margin:16px 20px;">
            <form action="{{ route('qmsaudit') }}" method="POST" enctype="multipart/form-data" class="addForm">
                @csrf
                <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                <div class="form-row">
                    <div><label>اسم المدقق</label><input type="text" name="auditrName" required></div>
                    <div><label>تاريخ الاستكمال</label><input type="date" max="2999-12-31" name="competedDate" required></div>
                    <div><label>إرفاق دليل</label><input name="attach_evidence" type="file" accept="image/*,.doc,.docx,.txt,.pdf"></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>تعليقات وإجراءات التدقيق</label><textarea name="audit_comments_actions" rows="2" required></textarea></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>أي مشاكل أخرى</label><input type="text" name="any_issues" placeholder="ملاحظات"></div>
                </div>

                <div style="border-top:1px solid var(--am-border);padding-top:14px;margin-top:6px;">
                    <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:10px;">قائمة تحقق بنود ISO 9001:2015</div>
                    @foreach($qmsChecklist as $qmsRow)
                        @php
                            $radioName = $qmsRow[0];
                            $evidenceName = $qmsRow[1];
                            $clause = $qmsRow[2];
                            $label = $qmsRow[3];
                        @endphp
                        <div class="form-row" style="margin-bottom:8px;">
                            <div style="grid-column:span 3;">
                                <label><strong style="color:var(--am-primary);">{{ $clause }}</strong> — {{ $label }}</label>
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="Yes" required name="{{ $radioName }}"> نعم</label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="No" required name="{{ $radioName }}"> لا</label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="NA" required name="{{ $radioName }}"> لا ينطبق</label>
                                </div>
                            </div>
                            @if ($evidenceName)
                                <div style="grid-column:span 3;">
                                    <label>الدليل</label>
                                    <input type="text" name="{{ $evidenceName }}" placeholder="ملاحظات الدليل">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelQmsForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ التدقيق</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
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
                        <tr data-search="{{ strtolower($item->auditrName . ' ' . $item->audit_comments_actions) }}">
                            <td><span class="am-cell-sub">#{{ $item->QmsauditNumber ?? ($index + 1) }}</span></td>
                            <td>
                                <span class="am-cell-primary">تدقيق نظام إدارة الجودة #{{ $item->QmsauditNumber ?? ($index + 1) }}</span>
                                <span class="am-cell-sub">{{ Str::limit($item->any_issues, 40) }}</span>
                            </td>
                            <td>{{ $item->auditrName ?? '—' }}</td>
                            <td><span class="am-chip info">{{ date('d M Y', strtotime($item->competedDate)) }}</span></td>
                            <td>{{ Str::limit($item->audit_comments_actions, 60) }}</td>
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amQmsView(@json($item))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amQmsEdit(@json($item))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route('deleteqmsAudit') }}"
                                            data-id="{{ intval($item->QmsauditNumber) }}"
                                            data-label="تدقيق نظام إدارة الجودة #{{ $item->QmsauditNumber }}"
                                            data-type="تدقيق نظام إدارة الجودة">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6"><div class="am-empty"><i class="fa fa-shield-alt"></i><p>لم يتم تسجيل أي تدقيقات لنظام إدارة الجودة بعد.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amQmsPagination"></div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="editProcessAudit" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل تدقيق نظام إدارة الجودة</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;margin-bottom:20px;">
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">المدقق</div><div id="vqms-auditor">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">تاريخ الاستكمال</div><div id="vqms-date">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">ملف الدليل</div><div id="vqms-ev">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">التعليقات والإجراءات</div><div id="vqms-comments">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">أي مشاكل أخرى</div><div id="vqms-issues">—</div></div>
            </div>
            <div style="border-top:1px solid var(--am-border);padding-top:14px;">
                <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:10px;">إجابات البنود</div>
                <div id="vqms-checklist" style="display:grid;grid-template-columns:1fr;gap:8px;font-size:13px;"></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="geteditdetails" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:1000px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل تدقيق نظام إدارة الجودة</h4>
        </div>
        <form action="{{ route('update_qmsaudit') }}" method="POST" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
            <input type="hidden" name="id" id="eqms-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>اسم المدقق</label><input type="text" class="form-control" name="auditrName" required></div>
                    <div class="col-lg-6"><label>تاريخ الاستكمال</label><input type="date" class="form-control" name="competedDate" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>تعليقات وإجراءات التدقيق</label><textarea class="form-control" name="audit_comments_actions" rows="2"></textarea></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8"><label>أي مشاكل أخرى</label><input type="text" class="form-control" name="any_issues"></div>
                    <div class="col-lg-4"><label>إرفاق دليل</label><input name="attach_evidence" type="file" class="form-control"></div>
                </div>

                @foreach($qmsChecklist as $qmsRow)
                    @php
                        $radioName = $qmsRow[0];
                        $evidenceName = $qmsRow[1];
                        $clause = $qmsRow[2];
                        $label = $qmsRow[3];
                    @endphp
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label><strong style="color:var(--am-primary);">{{ $clause }}</strong> — {{ Str::limit($label, 60) }}</label>
                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;">
                                <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="Yes" name="{{ $radioName }}"> نعم</label>
                                <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="No" name="{{ $radioName }}"> لا</label>
                                <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="NA" name="{{ $radioName }}"> لا ينطبق</label>
                            </div>
                        </div>
                        @if ($evidenceName)
                            <div class="col-lg-6"><label>الدليل</label><input type="text" class="form-control" name="{{ $evidenceName }}"></div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

<script>
(function(){
    var t=document.getElementById('toggleQmsForm'),f=document.getElementById('newQmsForm'),c=document.getElementById('cancelQmsForm');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amQmsSearch'),tb=document.querySelector('#amQmsTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amQmsPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();

<?php
    $qmsChecklistJs = collect($qmsChecklist)->map(function($c){
        return ['radio' => $c[0], 'evidence' => $c[1], 'clause' => $c[2], 'label' => $c[3]];
    })->values();
?>
var qmsChecklist = {!! json_encode($qmsChecklistJs) !!};

function amQmsView(d){
    document.getElementById('vqms-auditor').textContent = d.auditrName||'—';
    document.getElementById('vqms-date').textContent = d.competedDate ? new Date(d.competedDate).toLocaleDateString() : '—';
    document.getElementById('vqms-comments').textContent = d.audit_comments_actions||'—';
    document.getElementById('vqms-issues').textContent = d.any_issues||'—';
    var ev = document.getElementById('vqms-ev');
    if (d.attach_evidence) { ev.innerHTML = '<a href="'+d.attach_evidence+'" target="_blank" style="color:var(--am-primary);"><i class="fa fa-external-link-alt"></i> عرض</a>'; } else ev.textContent='—';
    var chk = document.getElementById('vqms-checklist');
    chk.innerHTML = '';
    qmsChecklist.forEach(function(f){
        var row = document.createElement('div');
        var answer = d[f.radio] || '—';
        var badgeCls = answer === 'Yes' ? 'success' : (answer === 'No' ? 'danger' : 'info');
        var ev = f.evidence && d[f.evidence] ? '<div style="font-size:12px;color:var(--am-text-muted);margin-top:2px;padding-left:12px;">الدليل: ' + d[f.evidence] + '</div>' : '';
        row.innerHTML = '<div style="display:flex;gap:10px;align-items:center;padding:6px 10px;background:var(--am-hover);border-radius:6px;"><strong style="color:var(--am-primary);min-width:44px;">' + f.clause + '</strong><div style="flex:1;">' + f.label + '</div><span class="am-chip ' + badgeCls + '">' + answer + '</span></div>' + ev;
        chk.appendChild(row);
    });
    document.getElementById('editProcessAudit').classList.add('open');
}
function amQmsEdit(d){
    $("#eqms-id").val(d.QmsauditNumber);
    ['auditrName','competedDate','audit_comments_actions','any_issues'].forEach(function(k){ $("#geteditdetails input[name='"+k+"'], #geteditdetails textarea[name='"+k+"']").val(d[k]||''); });
    qmsChecklist.forEach(function(f){
        $("#geteditdetails input[name='"+f.radio+"']").prop('checked', false);
        if (d[f.radio]) $("#geteditdetails input[name='"+f.radio+"'][value='"+d[f.radio]+"']").prop('checked', true);
        if (f.evidence) $("#geteditdetails input[name='"+f.evidence+"']").val(d[f.evidence]||'');
    });
    document.getElementById('geteditdetails').classList.add('open');
}
</script>

@endsection
