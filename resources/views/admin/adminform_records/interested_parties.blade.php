@extends('admin.dashboard.layouts.app')

@section('content')
@php $urlparam = request()->route()->parameters; @endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div style="display:flex;align-items:center;gap:12px;">
            <button type="button" class="am-page-guide-btn"
                onclick="document.getElementById('amPageGuide').classList.add('open')"
                title="الأطراف المعنية" aria-label="الأطراف المعنية">
                <i class="fa fa-info-circle"></i>
            </button>
            <div>
                <h2>الأطراف المهتمة</h2>
            </div>
        </div>
        <div>
            <a href="{{ url('/edit_user/'.$urlparam['id']) }}" class="am-btn am-btn-outline">
                <i class="fa fa-arrow-left"></i> العودة إلى النماذج
            </a>
        </div>
    </div>

    @if ($message = Session::get('msg'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amIpSearch" placeholder="ابحث في الأطراف المهتمة…" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="toggleIpForm">
                <i class="fa fa-plus"></i> إضافة طرف مهتم
            </button>
        </div>

        <div class="am-inline-form" id="newIpForm" style="margin:16px 20px;">
            <form action="{{ route('interestedform') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $urlparam['id'] }}">
                <div class="form-row">
                    <div><label>الطرف المهتم</label><input type="text" name="interestedparty" placeholder="مثال: العملاء، الموردين، الموظفين" required></div>
                    <div><label>الاحتياجات والتوقعات</label><input type="text" name="needs" placeholder="مثال: التسليم في الوقت المحدد" required></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelIpForm">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="amIpTable">
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        <th>الطرف المهتم</th>
                        <th>الاحتياجات والتوقعات</th>
                        <th>أنشئت في</th>
                        <th style="text-align:right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($interested as $index => $data)
                        <tr data-search="{{ strtolower($data->interested_party . ' ' . $data->needs) }}">
                            <td><span class="am-cell-sub">#{{ $index + 1 }}</span></td>
                            <td><span class="am-cell-primary">{{ $data->interested_party }}</span></td>
                            <td>{{ $data->needs }}</td>
                            <td><span class="am-chip info">{{ date('d M Y', strtotime($data->created_at)) }}</span></td>
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amIpView(@json($data))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amIpEdit(@json($data))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route('deleteInterested') }}"
                                            data-id="{{ $data->id }}"
                                            data-label="{{ $data->interested_party }}"
                                            data-type="طرف مهتم">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="am-empty"><i class="fa fa-users"></i><p>لم تتم إضافة أي أطراف مهتمة بعد.</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amIpPagination"></div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="amIpViewModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:560px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">الطرف المهتم</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px 18px;">
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الطرف المهتم</div><div id="v-ip-party">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الاحتياجات والتوقعات</div><div id="v-ip-needs">—</div></div>
            </div>
            {{-- the same history block the client page shows --}}
            <div style="border-top:1px solid var(--am-border);padding-top:14px;margin-top:18px;">
                <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;margin-bottom:10px;">السجل</div>
                <div id="vIpHistory"></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="amIpEditModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:600px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل الطرف المهتم</h4>
        </div>
        <form action="{{ route('interestedUpdate') }}" method="POST" style="display:contents;">
            @csrf
            <input type="hidden" name="user_id" value="{{ $urlparam['id'] }}">
            <input type="hidden" name="id" id="e-ip-id">
            <div class="am-modal__body" style="padding:22px;">
                <div class="form-group row"><div class="col-lg-12"><label>الطرف المهتم</label><input type="text" class="form-control" name="interestedparty" id="e-ip-party" required></div></div>
                <div class="form-group row"><div class="col-lg-12"><label>الاحتياجات والتوقعات</label><input type="text" class="form-control" name="needs" id="e-ip-needs" required></div></div>
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
    var t=document.getElementById('toggleIpForm'),f=document.getElementById('newIpForm'),c=document.getElementById('cancelIpForm');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amIpSearch'),tb=document.querySelector('#amIpTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amIpPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();
    // the same timeline the client page draws, from the same wording
    function amIpWhen(stamp, who) {
        var m = /^(\d{4})-(\d{2})-(\d{2})[ T](\d{2}):(\d{2})/.exec(stamp || '');
        if (!m) return '—';
        var h = parseInt(m[4], 10);
        var half = h < 12 ? 'ص' : 'م';
        var h12 = h % 12 === 0 ? 12 : h % 12;
        var when = m[3] + '/' + m[2] + '/' + m[1] + '، ' + h12 + ':' + m[5] + ' ' + half;
        return when;
    }

    function amIpHistory(data) {
        var box = document.getElementById('vIpHistory');
        if (!box) return;
        box.innerHTML = '';

        var events = [
            ['تم الإنشاء', data.created_at_raw, data.created_by_name],
            ['آخر تحديث', data.updated_at_raw, data.updated_by_name],
        ].filter(function (e) { return e[1]; });

        if (!events.length) {
            box.innerHTML = '<div style="font-size:13px;color:var(--am-text-muted);">لا يوجد سجل بعد.</div>';
            return;
        }

        events.forEach(function (e, i) {
            var row = document.createElement('div');
            row.style.cssText = 'display:grid;grid-template-columns:120px minmax(0,1fr) minmax(0,160px);'
                + 'gap:12px;align-items:start;padding:10px 0;font-size:13px;'
                + (i < events.length - 1 ? 'border-bottom:1px solid var(--am-border);' : '');
            row.appendChild(amIpCell(e[0], true));
            row.appendChild(amIpCell(amIpWhen(e[1]), false));
            row.appendChild(amIpCell(e[2] || '—', false));
            box.appendChild(row);
        });
    }

    // built as text, never as markup: a name is whatever someone typed
    function amIpCell(text, muted) {
        var d = document.createElement('div');
        if (muted) d.style.color = 'var(--am-text-muted)';
        d.style.minWidth = '0';
        d.style.overflowWrap = 'anywhere';
        d.textContent = text;
        return d;
    }

function amIpView(d){document.getElementById('v-ip-party').textContent=d.interested_party||'—';document.getElementById('v-ip-needs').textContent=d.needs||'—';amIpHistory(d);document.getElementById('amIpViewModal').classList.add('open');}
function amIpEdit(d){document.getElementById('e-ip-id').value=d.id||'';document.getElementById('e-ip-party').value=d.interested_party||'';document.getElementById('e-ip-needs').value=d.needs||'';document.getElementById('amIpEditModal').classList.add('open');}
</script>
{{-- The guide behind the "i" beside the title --}}
@include('dashboard.form_records.partials.guides.interested_parties')

@endsection
