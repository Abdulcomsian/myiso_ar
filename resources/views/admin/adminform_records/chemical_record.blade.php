@extends('admin.dashboard.layouts.app')

@section('content')
@php $urlparam = request()->route()->parameters; @endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>التحكم الكيميائي (COSHH)</h2>
            <p>تسجيل المواد الخطرة المستخدمة في مكان العمل لحماية الموظفين والامتثال للوائح.</p>
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
                نظام الرقابة على المواد الخطرة على الصحة (COSHH) يساعد على منع أو تقليل تعرّض العمال للمواد الخطرة من خلال الاحتفاظ بسجل معلومات مُحدَّث.
            </div>
        </div>
    </div>

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amChSearch" placeholder="ابحث في المواد الكيميائية…" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="toggleChForm">
                <i class="fa fa-plus"></i> إضافة COSHH
            </button>
        </div>

        <div class="am-inline-form" id="newChForm" style="margin:16px 20px;">
            <form action="{{ route('chemicalform') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                <input type="hidden" name="is_admin" value="admin">
                <div class="form-row">
                    <div><label>الاسم الكيميائي</label><input type="text" name="chemicalname" required></div>
                    <div><label>النوع الكيميائي</label><input type="text" name="chemical_type" placeholder="غاز / سائل / صلب" required></div>
                    <div><label>موقع الاستخدام</label><input type="text" name="location" placeholder="المنطقة / القسم" required></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;"><label>الوصف الكيميائي (المكونات الرئيسية)</label><input type="text" name="chemical_desc" required></div>
                </div>
                <div class="form-row">
                    <div><label>الخطر المترتب على النشاط</label><input type="text" name="activity_hazard" required></div>
                    <div><label>الخطر الكيميائي المحدد</label><input type="text" name="identified_chazard" placeholder="آكِل / سام / مؤكسد" required></div>
                    <div><label>الخطر المحدد</label><input type="text" name="identified_hazard" placeholder="بقع / استنشاق بخار" required></div>
                </div>
                <div class="form-row">
                    <div><label>الأعضاء المستهدفة</label><input type="text" name="target_organs" required></div>
                    <div><label>الفئات المعرضة للخطر</label><input type="text" name="who_risk" required></div>
                    <div><label>الحماية المطلوبة</label><input type="text" name="protection_required" placeholder="قفازات / نظارات / لباس عمل" required></div>
                </div>
                <div class="form-row">
                    <div>
                        <label>لا تزال مستخدمة في الإنتاج؟</label>
                        <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;">
                            <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" required value="Yes" name="still_used"> نعم، لا تزال مستخدمة</label>
                            <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" required value="No" name="still_used"> لا، توقف استخدامها</label>
                        </div>
                    </div>
                    <div><label>إرفاق الدليل</label><input name="attach_evidence" type="file"></div>
                    <div><label>أي مشاكل أخرى</label><textarea name="any_issues" placeholder="ملاحظات" rows="2"></textarea></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelChForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ سجل COSHH</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="amChTable">
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>المادة الكيميائية</th>
                        <th>الموقع</th>
                        <th>النشاط</th>
                        <th>الحالة</th>
                        <th style="text-align:right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($chemical as $index => $data)
                        <tr data-search="{{ strtolower(($data->chemical_name ?? '') . ' ' . ($data->chemical_desc ?? '') . ' ' . ($data->location_used ?? '')) }}">
                            <td><span class="am-cell-sub">#{{ $index + 1 }}</span></td>
                            <td>
                                <span class="am-cell-primary">{{ $data->chemical_name }}</span>
                                <span class="am-cell-sub">{{ Str::limit($data->chemical_desc, 50) }}</span>
                            </td>
                            <td>{{ $data->location_used }}</td>
                            <td>{{ Str::limit($data->activity_hazard, 60) }}</td>
                            <td>
                                @if ($data->still_used == 'Yes')
                                    <span class="am-chip warning">قيد الاستخدام</span>
                                @else
                                    <span class="am-chip success">توقف استخدامها</span>
                                @endif
                            </td>
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amChView(@json($data))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amChEdit(@json($data))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route('deleteChemical2') }}"
                                            data-id="{{ $data->id }}"
                                            data-label="{{ $data->chemical_name }}"
                                            data-type="سجل كيميائي">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6"><div class="am-empty"><i class="fa fa-flask"></i><p>لم تتم إضافة أي سجلات كيميائية بعد.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amChPagination"></div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="viewChModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:820px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل المادة الكيميائية</h4>
        </div>
        <div class="am-modal__body">
            @php
                $fields = [
                    'chemical_name' => 'الاسم الكيميائي',
                    'chemical_desc' => 'الوصف',
                    'chemical_type' => 'النوع',
                    'location_used' => 'الموقع',
                    'activity_hazard' => 'الخطر المترتب على النشاط',
                    'identified_chazard' => 'الخطر الكيميائي',
                    'identified_hazard' => 'الخطر المحدد',
                    'target_organs' => 'الأعضاء المستهدفة',
                    'who_risk' => 'الفئات المعرضة للخطر',
                    'protection_required' => 'الحماية المطلوبة',
                    'still_used' => 'الحالة',
                    'any_issues' => 'ملاحظات',
                ];
            @endphp
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                @foreach($fields as $k => $lb)
                    <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">{{ $lb }}</div><div id="vch-{{ $k }}">—</div></div>
                @endforeach
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الدليل</div><div id="vch-ev">—</div></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editChModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل السجل الكيميائي</h4>
        </div>
        <form action="{{ route('chemicalUpdate') }}" method="POST" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
            <input type="hidden" name="id" id="ech-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>الاسم الكيميائي</label><input type="text" class="form-control" name="chemicalname" required></div>
                    <div class="col-lg-6"><label>النوع الكيميائي</label><input type="text" class="form-control" name="chemical_type" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>الوصف</label><input type="text" class="form-control" name="chemical_desc" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>الموقع</label><input type="text" class="form-control" name="location" required></div>
                    <div class="col-lg-6"><label>الخطر المترتب على النشاط</label><input type="text" class="form-control" name="activity_hazard" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>الخطر الكيميائي</label><input type="text" class="form-control" name="identified_chazard" required></div>
                    <div class="col-lg-6"><label>الخطر المحدد</label><input type="text" class="form-control" name="identified_hazard" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>الأعضاء المستهدفة</label><input type="text" class="form-control" name="target_organs" required></div>
                    <div class="col-lg-6"><label>الفئات المعرضة للخطر</label><input type="text" class="form-control" name="who_risk" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>الحماية المطلوبة</label><input type="text" class="form-control" name="protection_required" required></div>
                    <div class="col-lg-6">
                        <label>لا تزال مستخدمة؟</label>
                        <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;">
                            <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="Yes" name="still_used"> نعم</label>
                            <label style="display:inline-flex;gap:4px;align-items:center;"><input type="radio" value="No" name="still_used"> لا</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>إرفاق الدليل</label><input name="attach_evidence" type="file" class="form-control"></div>
                    <div class="col-lg-6"><label>أي مشاكل أخرى</label><textarea class="form-control" name="any_issues"></textarea></div>
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
    var t=document.getElementById('toggleChForm'),f=document.getElementById('newChForm'),c=document.getElementById('cancelChForm');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amChSearch'),tb=document.querySelector('#amChTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amChPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();
function amChView(d){
    ['chemical_name','chemical_desc','chemical_type','location_used','activity_hazard','identified_chazard','identified_hazard','target_organs','who_risk','protection_required','still_used','any_issues'].forEach(function(k){
        var el = document.getElementById('vch-'+k);
        if (el) el.textContent = d[k] || '—';
    });
    var ev = document.getElementById('vch-ev');
    if (d.attach_evidence) { ev.innerHTML = '<a href="'+d.attach_evidence+'" target="_blank" style="color:var(--am-primary);"><i class="fa fa-external-link-alt"></i> عرض</a>'; } else ev.textContent = '—';
    document.getElementById('viewChModal').classList.add('open');
}
function amChEdit(d){
    $("#ech-id").val(d.id);
    $("#editChModal input[name='chemicalname']").val(d.chemical_name || '');
    ['chemical_type','chemical_desc','location','activity_hazard','identified_chazard','identified_hazard','target_organs','who_risk','protection_required'].forEach(function(k){
        var mapped = k === 'location' ? 'location_used' : k;
        $("#editChModal input[name='"+k+"']").val(d[mapped] || d[k] || '');
    });
    $("#editChModal textarea[name='any_issues']").val(d.any_issues || '');
    $("#editChModal input[name='still_used']").prop('checked', false);
    $("#editChModal input[name='still_used'][value='"+d.still_used+"']").prop('checked', true);
    document.getElementById('editChModal').classList.add('open');
}
</script>
@endsection
