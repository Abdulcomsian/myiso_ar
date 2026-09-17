@extends('admin.dashboard.layouts.app')

@section('content')
<style>
    .am-register-grid { display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:12px 16px; margin-bottom:12px; }
    .am-register-grid .wide { grid-column:1 / -1; }
    @media (max-width: 768px) { .am-register-grid { grid-template-columns:1fr; } }
    .am-register-info ul { margin:6px 0 0; padding-right:18px; padding-left:0; }
</style>

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>{{ $module['title'] }}</h2>
            <p>{{ $module['subtitle'] }}</p>
        </div>
        <div>
            <a href="{{ url('/edit_user/'.$ownerId) }}" class="am-btn am-btn-outline">
                <i class="fa fa-arrow-left"></i> العودة إلى النماذج
            </a>
        </div>
    </div>

    @if (session('msg'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ session('msg') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#b83432;background:rgba(235,77,75,0.08);">
            @foreach ($errors->all() as $error)
                <div><i class="fa fa-exclamation-circle"></i> {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="am-card am-register-info" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
        <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;"><i class="fa fa-info-circle"></i></span>
            <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                <strong>{{ $module['info_title'] }}</strong>
                <ul>
                    @foreach ($module['info_items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <div class="am-search" style="flex:1;max-width:340px;">
                <i class="fa fa-search"></i>
                <input type="text" id="amRegSearch" placeholder="{{ $module['search_placeholder'] }}" autocomplete="off">
            </div>
            <button type="button" class="am-btn am-btn-primary" id="amRegToggle">
                <i class="fa fa-plus"></i> {{ $module['add_label'] }}
            </button>
        </div>

        <div class="am-inline-form {{ old('_form') === 'add' ? 'open' : '' }}" id="amRegAddForm" style="margin:16px 20px;">
            <form method="POST" action="{{ route($module['key'].'.store') }}">
                @csrf
                <input type="hidden" name="_form" value="add">
                <input type="hidden" name="user_id" value="{{ $ownerId }}">
                @include('dashboard.form_records.partials.register_fields', ['mode' => 'add', 'bootstrap' => false])
                <div class="form-actions">
                    <button type="button" class="am-btn am-btn-outline am-btn-sm" id="amRegCancel">إلغاء</button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ</button>
                </div>
            </form>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="amRegTable">
                <thead>
                    <tr>
                        <th style="width:60px;">#</th>
                        @foreach ($module['columns'] as $label)
                            <th>{{ $label }}</th>
                        @endforeach
                        <th style="text-align:right;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $row)
                        @php
                            $searchText = '';
                            foreach (array_keys($module['fields']) as $f) { $searchText .= ' '.$row->getRawOriginal($f); }
                        @endphp
                        <tr data-search="{{ mb_strtolower($searchText) }}">
                            <td><span class="am-cell-sub">#{{ $loop->iteration }}</span></td>
                            @foreach ($module['columns'] as $col => $label)
                                @php
                                    $field = $module['fields'][$col];
                                    $raw = $row->getRawOriginal($col);
                                @endphp
                                <td>
                                    @if ($raw === null || $raw === '')
                                        <span class="am-cell-sub">—</span>
                                    @elseif ($field['type'] === 'date')
                                        <span class="am-chip info">{{ \Carbon\Carbon::parse($raw)->format('d/m/Y') }}</span>
                                    @elseif ($field['type'] === 'select')
                                        @php $chip = $module['chips'][$col][$raw] ?? null; @endphp
                                        @if ($chip)
                                            <span class="am-chip {{ $chip }}">{{ $field['options'][$raw] ?? $raw }}</span>
                                        @else
                                            {{ $field['options'][$raw] ?? $raw }}
                                        @endif
                                    @elseif ($loop->first)
                                        <span class="am-cell-primary">{{ \Illuminate\Support\Str::limit($raw, 60) }}</span>
                                    @else
                                        {{ \Illuminate\Support\Str::limit($raw, 60) }}
                                    @endif
                                </td>
                            @endforeach
                            <td style="text-align:right;white-space:nowrap;">
                                <div class="am-actions">
                                    <button type="button" class="am-icon-btn" title="عرض" onclick='amRegView(@json($row))'><i class="fa fa-eye"></i></button>
                                    <button type="button" class="am-icon-btn" title="تعديل" onclick='amRegEdit(@json($row))'><i class="fa fa-pen"></i></button>
                                    <button type="button" class="am-icon-btn danger am-confirm-delete"
                                            title="حذف"
                                            data-action="{{ route($module['key'].'.destroy') }}"
                                            data-id="{{ $row->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="{{ count($module['columns']) + 2 }}"><div class="am-empty"><i class="fa {{ $module['icon'] }}"></i><p>{{ $module['empty'] }}</p></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="am-pagination" id="amRegPagination"></div>
    </div>
</div>

{{-- View modal --}}
<div class="am-modal" id="amRegViewModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:760px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل {{ $module['item_name'] }}</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                @foreach ($module['fields'] as $name => $field)
                    <div style="{{ (!empty($field['wide']) || $field['type'] === 'textarea') ? 'grid-column:1/-1;' : '' }}">
                        <div style="font-size:11px;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">{{ $field['label'] }}</div>
                        <div id="v-reg-{{ $name }}" style="color:var(--am-text);line-height:1.45;white-space:pre-wrap;">—</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit modal --}}
<div class="am-modal" id="amRegEditModal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">{{ $module['edit_title'] }}</h4>
        </div>
        <form method="POST" action="{{ route($module['key'].'.update') }}" style="display:contents;">
            @csrf
            <input type="hidden" name="id">
            <div class="am-modal__body" style="padding:20px;">
                @include('dashboard.form_records.partials.register_fields', ['mode' => 'edit', 'bootstrap' => false])
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- Delete confirmation modal and modal close handlers come from the admin layout --}}
<script>
var AM_REG_FIELDS = @json($module['fields']);
(function(){
    var t=document.getElementById('amRegToggle'),f=document.getElementById('amRegAddForm'),c=document.getElementById('amRegCancel');
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
    function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
    var per=10,i=document.getElementById('amRegSearch'),tb=document.querySelector('#amRegTable tbody');
    if(!tb)return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),p=document.getElementById('amRegPagination'),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    i&&i.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
})();
function amRegDisplay(field, value) {
    if (value === null || value === undefined || value === '') return '—';
    if (field.type === 'select') return field.options[value] || value;
    if (field.type === 'date') { var p = String(value).substring(0, 10).split('-'); return p.length === 3 ? p[2] + '/' + p[1] + '/' + p[0] : value; }
    return value;
}
function amRegView(d) {
    Object.keys(AM_REG_FIELDS).forEach(function(k) {
        var el = document.getElementById('v-reg-' + k);
        if (el) el.textContent = amRegDisplay(AM_REG_FIELDS[k], d[k]);
    });
    document.getElementById('amRegViewModal').classList.add('open');
}
function amRegEdit(d) {
    var m = document.getElementById('amRegEditModal');
    m.querySelector("input[name='id']").value = d.id;
    Object.keys(AM_REG_FIELDS).forEach(function(k) {
        var el = m.querySelector("[name='" + k + "']");
        if (!el) return;
        var v = d[k] === null || d[k] === undefined ? '' : String(d[k]);
        el.value = AM_REG_FIELDS[k].type === 'date' ? v.substring(0, 10) : v;
    });
    m.classList.add('open');
}
</script>
@endsection
