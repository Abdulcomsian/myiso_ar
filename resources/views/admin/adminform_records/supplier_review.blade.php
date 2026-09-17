@extends('admin.dashboard.layouts.app')

@section('content')
@php
    $urlparam = request()->route()->parameters;
    // One lookup for all rows instead of a query per row
    $supplierNames = \App\Supplier::where('user_id', $request)->pluck('suppliername', 'idnumber');
@endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>مراجعات الموردين</h2>
            <p>تقييم الموردين من حيث الجودة والسعر والتسليم والأداء العام.</p>
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
                تقييمات الموردين أداة لمراقبة وتصنيف أداء الموردين عبر جميع نقاط التعامل معهم — جودة المنتجات والخدمات، وموثوقية التسليم، وتنافسية الأسعار، والامتثال وسرعة الاستجابة.
            </div>
        </div>
    </div>

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amSrSearch" placeholder="ابحث في التقييمات…" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="toggleSrForm">
                <i class="fa fa-plus"></i> إضافة تقييم مورد
            </button>
        </div>

        <div class="am-inline-form" id="newSrForm" style="margin:16px 20px;">
            <form method="POST" action="{{ route('supplier_review_store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                <div class="form-row">
                    <div>
                        <label>رقم تعريف المورد</label>
                        <select name="sup_id" required>
                            <option value="" selected disabled>اختر المورد…</option>
                            @foreach($all_suppliers as $supplier)
                                <option value="{{ $supplier->idnumber }}">{{ $supplier->idnumber }} — {{ $supplier->suppliername }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div><label>المنتج / النشاط / المنطقة</label><input type="text" name="product_activity_area" placeholder="قيد المراجعة" required></div>
                    <div><label>تاريخ التقييم</label><input type="date" max="2999-12-31" name="AssesmentDate" required></div>
                </div>
                <div class="form-row">
                    <div><label>تقييم الجودة (0-10)</label><input type="number" min="0" max="10" name="qualityScore" placeholder="0-10" required></div>
                    <div><label>تقييم السعر (0-10)</label><input type="number" min="0" max="10" name="priceScore" placeholder="0-10" required></div>
                    <div><label>تقييم التسليم (0-10)</label><input type="number" min="0" max="10" name="DScore" placeholder="0-10" required></div>
                    <div><label>التقييم الإجمالي (0-10)</label><input type="number" min="0" max="10" name="OveralScore" placeholder="0-10" required></div>
                </div>
                <div class="form-row">
                    <div style="grid-column:span 2;"><label>أي مشكلات أخرى</label><input type="text" name="other_issue" placeholder="ملاحظات" required></div>
                    <div style="grid-column:span 2;"><label>إرفاق الدليل</label><input type="file" name="attach_evidence" required></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelSrForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ التقييم</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="amSrTable">
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>المورد</th>
                        <th>المنتج / المنطقة</th>
                        <th>الجودة</th>
                        <th>السعر</th>
                        <th>التسليم</th>
                        <th>الإجمالي</th>
                        <th>تاريخ التقييم</th>
                        <th>الدليل</th>
                        <th style="text-align:right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supplier_review as $data)
                        @php
                            $supplierLabel = $supplierNames[$data->sup_id] ?? 'المورد #'.$data->sup_id;
                            $overall = (int) $data->OveralScore;
                            $chipCls = $overall >= 8 ? 'success' : ($overall >= 5 ? 'warning' : 'danger');
                        @endphp
                        <tr data-search="{{ strtolower($supplierLabel . ' ' . $data->product_activity_area . ' ' . $data->other_issues) }}">
                            <td><span class="am-cell-sub">#{{ $loop->index + 1 }}</span></td>
                            <td>
                                <div class="am-user-cell">
                                    <span class="am-avatar">{{ mb_strtoupper(mb_substr($supplierLabel, 0, 1)) }}</span>
                                    <div>
                                        <span class="am-cell-primary">{{ $supplierLabel }}</span>
                                        <span class="am-cell-sub">المعرف: {{ $data->sup_id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $data->product_activity_area }}</td>
                            <td>{{ $data->qualityScore }}</td>
                            <td>{{ $data->priceScore }}</td>
                            <td>{{ $data->DScore }}</td>
                            <td><span class="am-chip {{ $chipCls }}">{{ $data->OveralScore }}/10</span></td>
                            <td>{{ date('d M Y', strtotime($data->AssesmentDate)) }}</td>
                            <td>
                                @if ($data->attach_evidence)
                                    <a href="{{ asset('supplier_review_evidence/'.$data->attach_evidence) }}" target="_blank" style="color:var(--am-primary);"><i class="fa fa-paperclip"></i> عرض</a>
                                @endif
                            </td>
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amSrView(@json($data), @json($supplierLabel))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amSrEdit(@json($data))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route('deleteSupplierReviewAdmin') }}"
                                            data-id="{{ $data->id }}"
                                            data-label="تقييم {{ $supplierLabel }}"
                                            data-type="تقييم مورد">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="10"><div class="am-empty"><i class="fa fa-star"></i><p>لم تتم إضافة أي تقييمات موردين بعد.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amSrPagination"></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="editsupplier_rev" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل تقييم المورد</h4>
        </div>
        <form method="POST" action="{{ route('editSupplierReview') }}" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="id" id="srEditId">
            <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>معرف المورد</label>
                        <select class="form-control" name="sup_id" required>
                            <option value="" selected disabled>اختر المورد…</option>
                            @foreach($all_suppliers as $supplier)
                                <option value="{{ $supplier->idnumber }}">{{ $supplier->idnumber }} — {{ $supplier->suppliername }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6"><label>المنتج / النشاط / المنطقة</label><input class="form-control" type="text" name="product_activity_area_edit"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3"><label>الجودة (0-10)</label><input type="number" min="0" max="10" class="form-control" name="qualityScore" required></div>
                    <div class="col-lg-3"><label>السعر (0-10)</label><input type="number" min="0" max="10" class="form-control" name="priceScore" required></div>
                    <div class="col-lg-3"><label>التسليم (0-10)</label><input type="number" min="0" max="10" class="form-control" name="DScore" required></div>
                    <div class="col-lg-3"><label>الإجمالي (0-10)</label><input type="number" min="0" max="10" class="form-control" name="OveralScore" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6"><label>تاريخ التقييم</label><input type="date" max="2999-12-31" class="form-control" name="AssesmentDate" required></div>
                    <div class="col-lg-6"><label>أي مشكلات أخرى</label><input type="text" class="form-control" name="other_issue" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>إرفاق الدليل</label><input type="file" class="form-control" name="attach_evidence"></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="viewSupplierRev" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:720px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل التقييم</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:14px;font-size:13px;">
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">المورد</div><div id="v-sr-sup"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">المنتج / المنطقة</div><div id="v-sr-prod"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الجودة</div><div id="v-sr-q"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">السعر</div><div id="v-sr-p"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">التسليم</div><div id="v-sr-d"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الإجمالي</div><div id="v-sr-o"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">تاريخ التقييم</div><div id="v-sr-date"></div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الدليل</div><div id="v-sr-ev"></div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">مشكلات أخرى</div><div id="v-sr-oi"></div></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

<script>
(function(){
    var t=document.getElementById('toggleSrForm'),f=document.getElementById('newSrForm'),c=document.getElementById('cancelSrForm');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amSrSearch'),tb=document.querySelector('#amSrTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amSrPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();
function amSrView(d, label) {
    document.getElementById('v-sr-sup').textContent = label + ' (المعرف ' + d.sup_id + ')';
    document.getElementById('v-sr-prod').textContent = d.product_activity_area || '—';
    document.getElementById('v-sr-q').textContent = d.qualityScore + '/10';
    document.getElementById('v-sr-p').textContent = d.priceScore + '/10';
    document.getElementById('v-sr-d').textContent = d.DScore + '/10';
    document.getElementById('v-sr-o').textContent = d.OveralScore + '/10';
    document.getElementById('v-sr-date').textContent = d.AssesmentDate ? new Date(d.AssesmentDate).toLocaleDateString() : '—';
    document.getElementById('v-sr-oi').textContent = d.other_issues || '—';
    var ev = document.getElementById('v-sr-ev');
    if (d.attach_evidence) {
        ev.innerHTML = '<a href="{{ asset("supplier_review_evidence") }}/' + d.attach_evidence + '" target="_blank" style="color:var(--am-primary);"><i class="fa fa-external-link-alt"></i> عرض الملف</a>';
    } else { ev.textContent = '—'; }
    document.getElementById('viewSupplierRev').classList.add('open');
}
function amSrEdit(d) {
    $("#srEditId").val(d.id);
    $("#editsupplier_rev input[name='AssesmentDate']").val(d.AssesmentDate);
    $("#editsupplier_rev input[name='DScore']").val(d.DScore);
    $("#editsupplier_rev input[name='OveralScore']").val(d.OveralScore);
    $("#editsupplier_rev select[name='sup_id']").val(d.sup_id);
    $("#editsupplier_rev input[name='priceScore']").val(d.priceScore);
    $("#editsupplier_rev input[name='qualityScore']").val(d.qualityScore);
    $("#editsupplier_rev input[name='product_activity_area_edit']").val(d.product_activity_area);
    $("#editsupplier_rev input[name='other_issue']").val(d.other_issues);
    document.getElementById('editsupplier_rev').classList.add('open');
}
</script>
@endsection
