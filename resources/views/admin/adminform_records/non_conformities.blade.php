@extends('admin.dashboard.layouts.app')

@section('content')
@php $urlparam = request()->route()->parameters; @endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>حالات عدم المطابقة</h2>
            <p>تتبع الحالات التي لا تفي فيها المنتجات أو الخدمات أو العمليات بالمواصفات.</p>
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
                يحدث عدم المطابقة عندما لا يفي شيء ما بالمواصفات — في الخدمات أو المنتجات أو العمليات أو البضائع من المورد أو سلوك الموظفين. صغرى (مثل خطأ في الفواتير) مقابل كبرى (مثل سوء سلوك موظف).
            </div>
        </div>
    </div>

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amNcSearch" placeholder="ابحث في حالات عدم المطابقة…" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="toggleNcForm">
                <i class="fa fa-plus"></i> إضافة حالة عدم مطابقة
            </button>
        </div>

        <div class="am-inline-form" id="newNcForm" style="margin:16px 20px;">
            <form action="{{ route('nonConfromForm') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                <div class="form-row">
                    <div>
                        <label>النوع</label>
                        <select name="minor_major" required>
                            <option value="">اختر</option>
                            <option value="Minor">صغرى</option>
                            <option value="Major">كبرى</option>
                        </select>
                    </div>
                    <div><label>اسم المورد</label><input type="text" class="supplier_name" name="supplier_data" placeholder="اسم المورد"></div>
                    <div>
                        <label>رقم هوية المورد</label>
                        <select onchange="get_customer(this)" required name="customerID" id="customer_id">
                            <option value="" disabled selected>اختر رقم هوية المورد</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->idnumber }}">{{ $customer->idnumber }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div><label>الموظف الذي أبلغ عن NCR</label><input type="text" class="Employee_name" name="employee_name" placeholder="اسم الموظف"></div>
                    <div>
                        <label>معرف الموظف</label>
                        <select onchange="get_employee(this)" required name="employee_id" id="employee_id">
                            <option value="" disabled selected>اختر معرف الموظف</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->empNumber }}">{{ $employee->empNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>فئة السبب الجذري</label>
                        <select name="root_cause_category">
                            <option value="Other">أخرى</option>
                            <option value="Planning">التخطيط</option>
                            <option value="Production">الإنتاج</option>
                            <option value="Non-liable">غير مسؤول</option>
                            <option value="Training">التدريب</option>
                            <option value="Management">الإدارة</option>
                            <option value="Human Factor">العامل البشري</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div><label>وصف NCR</label><input type="text" name="description" placeholder="وصف الخطأ"></div>
                    <div><label>السبب الجذري</label><input type="text" name="rootCause" placeholder="السبب الجذري"></div>
                </div>
                <div class="form-row">
                    <div><label>الإجراء التصحيحي الفوري</label><input type="text" name="immediateCorp"></div>
                    <div><label>إجراء لمنع التكرار</label><input type="text" name="actionPrevent"></div>
                </div>
                <div class="form-row">
                    <div><label>فعالية الإجراء</label><input type="text" name="ActionRecurnce"></div>
                    <div><label>تاريخ مراجعة الفعالية</label><input type="date" name="effectiveDate"></div>
                </div>
                <div class="form-row">
                    <div><label>تمت المراجعة بواسطة</label><input type="text" name="reviewdBy"></div>
                    <div><label>تاريخ معالجة NC</label><input type="date" name="dateNcP"></div>
                    <div><label>تاريخ استلام NC</label><input type="date" name="dateNcR"></div>
                </div>
                <div class="form-row">
                    <div><label>وقت استجابة العميل (أيام)</label><input type="number" min="0" name="CRE"></div>
                    <div>
                        <label>تأثير على المنتج</label>
                        <select name="PI">
                            <option value=""></option>
                            <option value="Yes">نعم</option>
                            <option value="No">لا</option>
                        </select>
                    </div>
                    <div>
                        <label>NCR مغلق</label>
                        <select name="NCR_closed">
                            <option value=""></option>
                            <option value="Yes">نعم</option>
                            <option value="No">لا</option>
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelNcForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ NCR</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="amNcTable">
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>النوع</th>
                        <th>المورد</th>
                        <th>أبلغ بواسطة</th>
                        <th>الوصف</th>
                        <th>الفئة</th>
                        <th>تاريخ المعالجة</th>
                        <th style="text-align:right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers_nonconform as $index => $data)
                        <tr data-search="{{ strtolower($data->supplier_data . ' ' . $data->description . ' ' . $data->employee_name . ' ' . $data->non_confirm_status) }}">
                            <td><span class="am-cell-sub">#{{ $index + 1 }}</span></td>
                            <td>
                                @if ($data->non_confirm_status === 'Major')
                                    <span class="am-chip danger">كبرى</span>
                                @elseif ($data->non_confirm_status === 'Minor')
                                    <span class="am-chip warning">صغرى</span>
                                @else
                                    <span class="am-cell-sub">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="am-cell-primary">{{ $data->supplier_data ?? '—' }}</span>
                                <span class="am-cell-sub">المعرف: {{ $data->customerID }}</span>
                            </td>
                            <td>
                                <span class="am-cell-primary">{{ $data->employee_name }}</span>
                                <span class="am-cell-sub">موظف: {{ $data->employee_id }}</span>
                            </td>
                            <td>{{ Str::limit($data->description, 50) }}</td>
                            <td><span class="am-chip info">{{ $data->root_cause_category }}</span></td>
                            <td>{{ $data->dateNcR ? date('d M Y', strtotime($data->dateNcR)) : '—' }}</td>
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amNcView(@json($data))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amNcEdit(@json($data))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route('deleteNonConfrm') }}"
                                            data-id="{{ $data->noid }}"
                                            data-label="NCR #{{ $index + 1 }}"
                                            data-type="حالة عدم مطابقة">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8"><div class="am-empty"><i class="fa fa-exclamation-triangle"></i><p>لم يتم تسجيل أي حالات عدم مطابقة بعد.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amNcPagination"></div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="viewNcModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل عدم المطابقة</h4>
        </div>
        <div class="am-modal__body">
            @php $vf = [
                'non_confirm_status' => 'النوع', 'supplier_data' => 'اسم المورد', 'customerID' => 'رقم هوية المورد',
                'employee_name' => 'أبلغ بواسطة', 'employee_id' => 'معرف الموظف', 'root_cause_category' => 'فئة السبب الجذري',
                'description' => 'الوصف', 'rootCause' => 'السبب الجذري',
                'immediateCorp' => 'الإجراء التصحيحي الفوري', 'actionPrevent' => 'منع التكرار',
                'ActionRecurnce' => 'فعالية الإجراء', 'effectiveDate' => 'تاريخ مراجعة الفعالية',
                'reviewdBy' => 'تمت المراجعة بواسطة', 'dateNcP' => 'تاريخ معالجة NC', 'dateNcR' => 'تاريخ استلام NC',
                'CRE' => 'وقت استجابة العميل', 'PI' => 'تأثير على المنتج', 'NCR_closed' => 'NCR مغلق',
            ]; @endphp
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                @foreach($vf as $k => $lb)
                    <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">{{ $lb }}</div><div id="vnc-{{ $k }}">—</div></div>
                @endforeach
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editNcModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:1000px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل حالة عدم المطابقة</h4>
        </div>
        <form action="{{ route('editnonConfirm') }}" method="POST" style="display:contents;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
            <input type="hidden" name="noid" id="enc-id">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-4"><label>النوع</label>
                        <select class="form-control" name="minor_major">
                            <option value="">اختر</option>
                            <option value="Minor">صغرى</option>
                            <option value="Major">كبرى</option>
                        </select>
                    </div>
                    <div class="col-lg-4"><label>اسم المورد</label><input type="text" class="form-control" name="supplier_data"></div>
                    <div class="col-lg-4"><label>رقم هوية المورد</label>
                        <select class="form-control" name="customerID">
                            <option value="">اختر</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->idnumber }}">{{ $customer->idnumber }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>اسم الموظف</label><input type="text" class="form-control" name="employee_name"></div>
                    <div class="col-lg-4"><label>معرف الموظف</label>
                        <select class="form-control" name="employee_id">
                            <option value="">اختر</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->empNumber }}">{{ $employee->empNumber }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4"><label>فئة السبب الجذري</label>
                        <select class="form-control" name="root_cause_category">
                            <option value="Other">أخرى</option><option value="Planning">التخطيط</option><option value="Production">الإنتاج</option><option value="Non-liable">غير مسؤول</option><option value="Training">التدريب</option><option value="Management">الإدارة</option><option value="Human Factor">العامل البشري</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>الوصف</label><input type="text" class="form-control" name="description"></div>
                    <div class="col-lg-6"><label>السبب الجذري</label><input type="text" class="form-control" name="rootCause"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>الإجراء التصحيحي الفوري</label><input type="text" class="form-control" name="immediateCorp"></div>
                    <div class="col-lg-6"><label>منع التكرار</label><input type="text" class="form-control" name="actionPrevent"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>فعالية الإجراء</label><input type="text" class="form-control" name="ActionRecurnce"></div>
                    <div class="col-lg-6"><label>تاريخ مراجعة الفعالية</label><input type="date" class="form-control" name="effectiveDate"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>تمت المراجعة بواسطة</label><input type="text" class="form-control" name="reviewdBy"></div>
                    <div class="col-lg-4"><label>تاريخ معالجة NC</label><input type="date" class="form-control" name="dateNcP"></div>
                    <div class="col-lg-4"><label>تاريخ استلام NC</label><input type="date" class="form-control" name="dateNcR"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4"><label>وقت استجابة العميل</label><input type="number" min="0" class="form-control" name="CRE"></div>
                    <div class="col-lg-4"><label>تأثير على المنتج</label>
                        <select class="form-control" name="PI"><option value=""></option><option value="Yes">نعم</option><option value="No">لا</option></select>
                    </div>
                    <div class="col-lg-4"><label>NCR مغلق</label>
                        <select class="form-control" name="NCR_closed"><option value=""></option><option value="Yes">نعم</option><option value="No">لا</option></select>
                    </div>
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
    var t=document.getElementById('toggleNcForm'),f=document.getElementById('newNcForm'),c=document.getElementById('cancelNcForm');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amNcSearch'),tb=document.querySelector('#amNcTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amNcPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();
function amNcView(d){
    ['non_confirm_status','supplier_data','customerID','employee_name','employee_id','root_cause_category','description','rootCause','immediateCorp','actionPrevent','ActionRecurnce','effectiveDate','reviewdBy','dateNcP','dateNcR','CRE','PI','NCR_closed'].forEach(function(k){
        var el = document.getElementById('vnc-'+k);
        if (el) el.textContent = d[k] || '—';
    });
    document.getElementById('viewNcModal').classList.add('open');
}
function amNcEdit(d){
    $("#enc-id").val(d.noid);
    ['minor_major','supplier_data','employee_name','description','rootCause','immediateCorp','actionPrevent','ActionRecurnce','effectiveDate','reviewdBy','dateNcP','dateNcR','CRE'].forEach(function(k){ $("#editNcModal input[name='"+k+"'], #editNcModal textarea[name='"+k+"'], #editNcModal select[name='"+k+"']").val(d[k]||''); });
    $("#editNcModal select[name='minor_major']").val(d.non_confirm_status||'');
    $("#editNcModal select[name='customerID']").val(d.customerID||'');
    $("#editNcModal select[name='employee_id']").val(d.employee_id||'');
    $("#editNcModal select[name='root_cause_category']").val(d.root_cause_category||'');
    $("#editNcModal select[name='PI']").val(d.PI||'');
    $("#editNcModal select[name='NCR_closed']").val(d.NCR_closed||'');
    document.getElementById('editNcModal').classList.add('open');
}
</script>
@endsection
