@extends('admin.dashboard.layouts.app')

@section('content')
@php $urlparam = request()->route()->parameters; @endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>عمليات تدقيق العمليات</h2>
            <p>عمليات تدقيق تعليمات العمل التي يجريها المدقق الداخلي للتحقق من التنفيذ الصحيح للعملية.</p>
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
                تتحقق عمليات تدقيق العمليات من أن تعليمات العمل أو مخططات تدفق العملية المحددة يتم اتباعها بشكل صحيح.
            </div>
        </div>
    </div>

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amPaSearch" placeholder="ابحث في عمليات التدقيق…" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="togglePaForm">
                <i class="fa fa-plus"></i> إضافة تدقيق عمليات
            </button>
        </div>

        <div class="am-inline-form" id="newPaForm" style="margin:16px 20px;">
            <form action="{{ route('auditsaveadmin') }}" method="POST" enctype="multipart/form-data" id="addForm">
                @csrf
                <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                <div class="form-row">
                    <div>
                        <label>عنوان العملية / تعليمات العمل</label>
                        <select name="processAudit" required>
                            <option value="">اختر</option>
                            <option value="QP1-Sales Process">QP1-عملية المبيعات</option>
                            <option value="QP2-Purchasing Process">QP2-عملية الشراء</option>
                            <option value="QP3-Servicing of a Contract">QP3-خدمة العقد</option>
                            <option value="QP4-Competency Process">QP4-عملية الكفاءة</option>
                            <option value="Process Interaction">تفاعل العمليات</option>
                            @isset($workInstructionsData)
                                @foreach($workInstructionsData as $item)
                                    <option value="{{ $item->workinstruction }}">{{ $item->workinstruction }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div><label>المدقق</label><input type="text" name="auditor" required></div>
                    <div><label>تاريخ التدقيق</label><input type="date" name="auditDate" required></div>
                </div>
                <div class="form-row">
                    <div><label>عدد حالات عدم المطابقة</label><input type="number" min="0" name="nonConformities" required></div>
                    <div><label>عدد الملاحظات</label><input type="number" min="0" name="Observations" required></div>
                    <div><label>مرجع تقرير NC</label><input type="text" name="nonConfReport"></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:span 2;"><label>إجراءات التدقيق</label><textarea name="AdutiActions" rows="3" required></textarea></div>
                    <div><label>دورية التدقيق (بالأشهر)</label><input type="number" min="1" max="12" name="dateFrequency" required></div>
                </div>

                <div style="border-top:1px solid var(--am-border);padding-top:14px;margin-top:6px;">
                    <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:10px;">قائمة التحقق للتدقيق</div>
                    @php
                        $questions = [
                            ['qmsCorects', '1 — هل هذه العملية مشمولة في نطاق النظام ولا تزال ذات صلة؟', 'evidence'],
                            ['needExpactations', '2 — هل يتم تنفيذ هذه العملية كما تم توثيقها؟', 'evidance2'],
                            ['correction3', '3 — هل جميع الموظفين المعنيين مدربون والسجلات كاملة؟', 'evidence3'],
                            ['correction4', '4 — هل تتم مراقبة مؤشرات الأداء الرئيسية لهذه العملية؟', 'evidance4'],
                            ['correction5', '5 — هل تم تحديد أهداف مناسبة في مراجعة الإدارة؟', 'evidence5'],
                            ['correction6', '6 — هل يتم الاحتفاظ بالسجلات بشكل صحيح (المعلومات الموثقة)؟', ''],
                            ['correction7', '7 — هل تتم مراجعة العملية للمخاطر والفرص؟', 'evidance7'],
                            ['correction9', '8 — هل تم إغلاق الإجراءات التصحيحية وأصبحت فعالة؟', 'evidance9'],
                            ['correction10', '9 — هل تتم مراقبة رضا العميل؟', 'evidance10'],
                        ];
                    @endphp
                    @foreach($questions as [$name, $label, $evidence])
                        <div class="form-row" style="margin-bottom:8px;">
                            <div style="grid-column:span 3;">
                                <label>{{ $label }}</label>
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="Yes" required name="{{ $name }}"> نعم</label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="No" required name="{{ $name }}"> لا</label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="NA" required name="{{ $name }}"> لا ينطبق</label>
                                </div>
                            </div>
                            @if ($evidence)
                                <div style="grid-column:span 3;">
                                    <label>الدليل</label>
                                    <input type="text" name="{{ $evidence }}" placeholder="ملاحظات الدليل">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="form-row" style="margin-top:14px;">
                    <div><label>إرفاق دليل</label><input name="attach_evidence" type="file"></div>
                    <div style="grid-column:span 2;"><label>أي مشاكل أخرى</label><textarea name="any_issues" rows="2"></textarea></div>
                </div>

                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelPaForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ التدقيق</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="amPaTable">
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>العملية</th>
                        <th>المدقق</th>
                        <th>تاريخ التدقيق</th>
                        <th>حالات عدم المطابقة</th>
                        <th>الملاحظات</th>
                        <th>الدورية</th>
                        <th style="text-align:right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($getprocess as $index => $data)
                        @php
                            $ncrClass = ((int)$data->nonConformities) > 0 ? 'warning' : 'success';
                        @endphp
                        <tr data-search="{{ strtolower($data->processAudit . ' ' . $data->auditor) }}">
                            <td><span class="am-cell-sub">#{{ $index + 1 }}</span></td>
                            <td>
                                <span class="am-cell-primary">{{ Str::limit($data->processAudit, 40) }}</span>
                            </td>
                            <td>{{ $data->auditor }}</td>
                            <td><span class="am-chip info">{{ date('d M Y', strtotime($data->auditDate)) }}</span></td>
                            <td><span class="am-chip {{ $ncrClass }}">{{ $data->nonConformities }}</span></td>
                            <td>{{ $data->Observations }}</td>
                            <td>كل {{ $data->dateFrequency }} أشهر</td>
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amPaView(@json($data))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amPaEdit(@json($data))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route('deleteauditadmin') }}"
                                            data-id="{{ $data->id }}"
                                            data-label="تدقيق {{ Str::limit($data->processAudit, 30) }}"
                                            data-type="تدقيق العمليات">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8"><div class="am-empty"><i class="fa fa-clipboard-list"></i><p>لم يتم تسجيل أي عمليات تدقيق للعمليات بعد.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amPaPagination"></div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="viewPaModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل تدقيق العمليات</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">العملية</div><div id="vpa-proc">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">المدقق</div><div id="vpa-auditor">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">تاريخ التدقيق</div><div id="vpa-date">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">حالات عدم المطابقة</div><div id="vpa-nc">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الملاحظات</div><div id="vpa-obs">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">مرجع تقرير NC</div><div id="vpa-ncr">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الدورية</div><div id="vpa-freq">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">إجراءات التدقيق</div><div id="vpa-actions">—</div></div>
                <div style="grid-column:1/-1;border-top:1px solid var(--am-border);padding-top:12px;">
                    <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:10px;">إجابات قائمة التحقق</div>
                    <ol id="vpa-checklist" style="padding-left:20px;margin:0;font-size:13px;line-height:1.7;"></ol>
                </div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الدليل</div><div id="vpa-ev">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">أي مشاكل أخرى</div><div id="vpa-issues">—</div></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editPaModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:1000px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل تدقيق العمليات</h4>
        </div>
        <form action="{{ route('auditupdateadmin') }}" method="POST" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
            <input type="hidden" name="id" id="epa-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>العملية</label>
                        <select class="form-control" name="processAudit">
                            <option value="QP1-Sales Process">QP1-عملية المبيعات</option>
                            <option value="QP2-Purchasing Process">QP2-عملية الشراء</option>
                            <option value="QP3-Servicing of a Contract">QP3-خدمة العقد</option>
                            <option value="QP4-Competency Process">QP4-عملية الكفاءة</option>
                            <option value="Process Interaction">تفاعل العمليات</option>
                            @isset($workInstructionsData)
                                @foreach($workInstructionsData as $item)
                                    <option value="{{ $item->workinstruction }}">{{ $item->workinstruction }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-lg-6"><label>المدقق</label><input type="text" class="form-control" name="auditor"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>تاريخ التدقيق</label><input type="date" class="form-control" name="auditDate"></div>
                    <div class="col-lg-4"><label>حالات عدم المطابقة</label><input type="number" class="form-control" min="0" name="nonConformities"></div>
                    <div class="col-lg-4"><label>الملاحظات</label><input type="number" class="form-control" min="0" name="Observations"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>مرجع تقرير NC</label><input type="text" class="form-control" name="nonConfReport"></div>
                    <div class="col-lg-4"><label>الدورية (بالأشهر)</label><input type="number" class="form-control" min="1" max="12" name="dateFrequency"></div>
                    <div class="col-lg-4"><label>إرفاق دليل</label><input name="attach_evidence" type="file" class="form-control"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>إجراءات التدقيق</label><textarea class="form-control" name="AdutiActions" rows="3"></textarea></div>
                </div>
                @foreach($questions as [$name, $label, $evidence])
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>{{ Str::limit($label, 60) }}</label>
                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;">
                                <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="Yes" name="{{ $name }}"> نعم</label>
                                <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="No" name="{{ $name }}"> لا</label>
                                <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="NA" name="{{ $name }}"> لا ينطبق</label>
                            </div>
                        </div>
                        @if ($evidence)
                            <div class="col-lg-6"><label>الدليل</label><input type="text" class="form-control" name="{{ $evidence }}"></div>
                        @endif
                    </div>
                @endforeach
                <div class="form-group row">
                    <div class="col-lg-12"><label>أي مشاكل أخرى</label><textarea class="form-control" name="any_issues" rows="2"></textarea></div>
                </div>
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
    var t=document.getElementById('togglePaForm'),f=document.getElementById('newPaForm'),c=document.getElementById('cancelPaForm');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amPaSearch'),tb=document.querySelector('#amPaTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amPaPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();

var paChecklistFields = [
    ['qmsCorects', '1 — مشمولة في نطاق النظام', 'evidence'],
    ['needExpactations', '2 — تُنفذ كما تم توثيقها', 'evidance2'],
    ['correction3', '3 — الموظفون مدربون', 'evidence3'],
    ['correction4', '4 — مؤشرات الأداء مُراقبة', 'evidance4'],
    ['correction5', '5 — الأهداف محددة في مراجعة الإدارة', 'evidence5'],
    ['correction6', '6 — السجلات محفوظة', null],
    ['correction7', '7 — تمت مراجعتها للمخاطر والفرص', 'evidance7'],
    ['correction9', '8 — الإجراءات التصحيحية مغلقة', 'evidance9'],
    ['correction10', '9 — رضا العميل مُراقب', 'evidance10'],
];

function amPaView(d){
    document.getElementById('vpa-proc').textContent = d.processAudit||'—';
    document.getElementById('vpa-auditor').textContent = d.auditor||'—';
    document.getElementById('vpa-date').textContent = d.auditDate ? new Date(d.auditDate).toLocaleDateString() : '—';
    document.getElementById('vpa-nc').textContent = d.nonConformities||'0';
    document.getElementById('vpa-obs').textContent = d.Observations||'0';
    document.getElementById('vpa-ncr').textContent = d.nonConfReport||'—';
    document.getElementById('vpa-freq').textContent = d.dateFrequency ? ('كل '+d.dateFrequency+' أشهر') : '—';
    document.getElementById('vpa-actions').textContent = d.AdutiActions||'—';
    document.getElementById('vpa-issues').textContent = d.any_issues||'—';
    var chk = document.getElementById('vpa-checklist');
    chk.innerHTML = '';
    paChecklistFields.forEach(function(f){
        var li = document.createElement('li');
        var ev = f[2] ? '<div style="font-size:12px;color:var(--am-text-muted);margin-top:2px;">الدليل: ' + (d[f[2]] || '—') + '</div>' : '';
        li.innerHTML = '<strong>' + f[1] + ':</strong> ' + (d[f[0]] || '—') + ev;
        chk.appendChild(li);
    });
    var ev = document.getElementById('vpa-ev');
    if (d.attach_evidence) { ev.innerHTML = '<a href="'+d.attach_evidence+'" target="_blank" style="color:var(--am-primary);"><i class="fa fa-external-link-alt"></i> عرض</a>'; } else ev.textContent='—';
    document.getElementById('viewPaModal').classList.add('open');
}
function amPaEdit(d){
    $("#epa-id").val(d.id);
    ['auditor','auditDate','nonConformities','Observations','nonConfReport','dateFrequency','AdutiActions','any_issues'].forEach(function(k){ $("#editPaModal input[name='"+k+"'], #editPaModal textarea[name='"+k+"']").val(d[k]||''); });
    $("#editPaModal select[name='processAudit']").val(d.processAudit||'');
    paChecklistFields.forEach(function(f){
        $("#editPaModal input[name='"+f[0]+"']").prop('checked', false);
        if (d[f[0]]) $("#editPaModal input[name='"+f[0]+"'][value='"+d[f[0]]+"']").prop('checked', true);
        if (f[2]) $("#editPaModal input[name='"+f[2]+"']").val(d[f[2]]||'');
    });
    document.getElementById('editPaModal').classList.add('open');
}
</script>
@endsection
