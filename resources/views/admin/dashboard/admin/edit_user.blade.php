@extends('admin.dashboard.layouts.app')

@section('content')
@php
    $userId = request()->route('id');
    $forms = [
        ['title' => 'المتطلبات المطلوبة',              'url' => '/requiremntCheck/'.$userId,     'icon' => 'fa-tasks',              'group' => 'الامتثال'],
        ['title' => 'عمليات تدقيق العمليات',            'url' => '/ProcessCheck/'.$userId,        'icon' => 'fa-clipboard-list',     'group' => 'التدقيق'],
        ['title' => 'الأطراف المهتمة',                  'url' => '/interested_parties/'.$userId,  'icon' => 'fa-users',              'group' => 'الامتثال'],
        ['title' => 'عمليات تدقيق نظام إدارة الجودة',   'url' => '/AuditsCheck/'.$userId,         'icon' => 'fa-shield-alt',         'group' => 'التدقيق'],
        ['title' => 'عدم المطابقة',                    'url' => '/nonConformCheck/'.$userId,     'icon' => 'fa-exclamation-triangle','group' => 'التدقيق'],
        ['title' => 'عملاء',                          'url' => '/customerCheck/'.$userId,       'icon' => 'fa-user-friends',       'group' => 'الأعمال'],
        ['title' => 'رأي العميل',                      'url' => '/customerReviewad/'.$userId,    'icon' => 'fa-star',               'group' => 'الأعمال'],
        ['title' => 'الموردين',                        'url' => '/supplierCheck/'.$userId,       'icon' => 'fa-truck',              'group' => 'الأعمال'],
        ['title' => 'معايرة',                          'url' => '/calibrationcheck/'.$userId,    'icon' => 'fa-tachometer-alt',     'group' => 'العمليات'],
        ['title' => 'موظفين',                          'url' => '/EmployeCheck/'.$userId,        'icon' => 'fa-id-badge',           'group' => 'الموارد البشرية'],
        ['title' => 'مراجعات الإدارة',                  'url' => '/managementCheck/'.$userId,     'icon' => 'fa-chart-line',         'group' => 'الإدارة'],
        ['title' => 'سجلات الصيانة',                   'url' => '/maintainRecCheck/'.$userId,    'icon' => 'fa-wrench',             'group' => 'العمليات'],
        ['title' => 'تقييمات مخاطر الحوادث',            'url' => '/AccidentCheck/'.$userId,       'icon' => 'fa-first-aid',          'group' => 'السلامة'],
        ['title' => 'تقييم المخاطر',                   'url' => '/riskAssesmntCheck/'.$userId,   'icon' => 'fa-user-shield',        'group' => 'السلامة'],
        ['title' => 'التحكم الكيميائي',                'url' => '/chemicalcheck/'.$userId,       'icon' => 'fa-flask',              'group' => 'السلامة'],
        ['title' => 'تعليمات العمل',                    'url' => '/workinstructionCheck/'.$userId,'icon' => 'fa-file-alt',           'group' => 'الوثائق'],
        ['title' => 'سياسات إضافية',                   'url' => '/additionalpolicies/'.$userId,  'icon' => 'fa-book',               'group' => 'الوثائق'],
    ];
@endphp

<style>
    .am-forms-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 14px;
    }
    .am-form-card {
        background: #fff;
        border: 1px solid var(--am-border);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        text-decoration: none;
        color: inherit;
        transition: transform 0.18s, box-shadow 0.18s, border-color 0.18s;
        position: relative;
        overflow: hidden;
    }
    .am-form-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px rgba(46, 59, 154, 0.12);
        border-color: var(--am-primary-soft);
        text-decoration: none;
        color: inherit;
    }
    .am-form-card__icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--am-primary-tint);
        color: var(--am-primary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }
    .am-form-card__title {
        font-size: 14px;
        font-weight: 600;
        color: var(--am-text);
        margin: 0;
        line-height: 1.3;
    }
    .am-form-card__group {
        font-size: 10.5px;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: var(--am-text-muted);
        font-weight: 600;
    }
    .am-form-card__arrow {
        position: absolute;
        top: 20px;
        right: 20px;
        color: var(--am-text-soft);
        font-size: 12px;
        transition: transform 0.18s, color 0.18s;
    }
    .am-form-card:hover .am-form-card__arrow {
        color: var(--am-primary);
        transform: translateX(-3px);
    }
    .am-form-search-wrap {
        max-width: 360px;
        flex: 1;
        min-width: 220px;
    }
</style>

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    {{-- Page header --}}
    <div class="am-page-header">
        <div>
            <h2>نماذج المستخدم</h2>
            <p>جميع النماذج والشهادات والسجلات لهذا العميل. اضغط على أي فئة للفتح.</p>
        </div>
        <div>
            <a href="{{ url('/view_user') }}" class="am-btn am-btn-outline">
                <i class="fa fa-arrow-left"></i> خلف
            </a>
        </div>
    </div>

    {{-- Stat card --}}
    <div class="am-stats" style="margin-bottom:22px;">
        <div class="am-stat">
            <span class="am-stat__icon blue"><i class="fa fa-folder-open"></i></span>
            <div>
                <p class="am-stat__label">إجمالي الفئات</p>
                <div class="am-stat__value">{{ count($forms) }}</div>
            </div>
        </div>
        <div class="am-stat">
            <span class="am-stat__icon green"><i class="fa fa-shield-alt"></i></span>
            <div>
                <p class="am-stat__label">الامتثال والتدقيق</p>
                <div class="am-stat__value">{{ collect($forms)->whereIn('group', ['الامتثال', 'التدقيق'])->count() }}</div>
            </div>
        </div>
        <div class="am-stat">
            <span class="am-stat__icon orange"><i class="fa fa-user-shield"></i></span>
            <div>
                <p class="am-stat__label">السلامة</p>
                <div class="am-stat__value">{{ collect($forms)->where('group', 'السلامة')->count() }}</div>
            </div>
        </div>
        <div class="am-stat">
            <span class="am-stat__icon cyan"><i class="fa fa-briefcase"></i></span>
            <div>
                <p class="am-stat__label">الأعمال والعمليات</p>
                <div class="am-stat__value">{{ collect($forms)->whereIn('group', ['الأعمال', 'العمليات'])->count() }}</div>
            </div>
        </div>
    </div>

    {{-- Search + grid card --}}
    <div class="am-card">
        <div class="am-card__toolbar">
            <div class="am-form-search-wrap am-search">
                <i class="fa fa-search"></i>
                <input type="text" id="amFormsSearch" placeholder="ابحث عن الفئات…" autocomplete="off">
            </div>
            <div style="margin-right:auto;font-size:12.5px;color:var(--am-text-muted);">
                <strong>{{ count($forms) }}</strong> فئة
            </div>
        </div>

        <div style="padding:20px;">
            <div class="am-forms-grid" id="amFormsGrid">
                @foreach ($forms as $index => $form)
                    <a href="{{ $form['url'] }}" class="am-form-card" data-name="{{ strtolower($form['title'] . ' ' . $form['group']) }}">
                        <span class="am-form-card__icon"><i class="fa {{ $form['icon'] }}"></i></span>
                        <span class="am-form-card__arrow"><i class="fa fa-arrow-left"></i></span>
                        <div>
                            <span class="am-form-card__group">{{ $form['group'] }}</span>
                            <h3 class="am-form-card__title">{{ $form['title'] }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
            <div id="amFormsEmpty" style="display:none;padding:40px 20px;text-align:center;color:var(--am-text-muted);">
                <i class="fa fa-search" style="font-size:32px;color:var(--am-text-soft);margin-bottom:10px;"></i>
                <p style="margin:0;">لا توجد فئات تطابق بحثك.</p>
            </div>
        </div>
    </div>

</div>

<script>
(function() {
    var input = document.getElementById('amFormsSearch');
    var cards = document.querySelectorAll('#amFormsGrid .am-form-card');
    var empty = document.getElementById('amFormsEmpty');
    var grid  = document.getElementById('amFormsGrid');

    function debounce(fn, wait) {
        var t;
        return function() {
            var ctx = this, args = arguments;
            clearTimeout(t);
            t = setTimeout(function(){ fn.apply(ctx, args); }, wait);
        };
    }

    input && input.addEventListener('input', debounce(function() {
        var q = this.value.trim().toLowerCase();
        var visible = 0;
        cards.forEach(function(card) {
            var name = card.getAttribute('data-name') || '';
            var show = q === '' || name.indexOf(q) !== -1;
            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        empty.style.display = visible === 0 ? 'block' : 'none';
        grid.style.display  = visible === 0 ? 'none' : '';
    }, 250));
})();
</script>

@endsection
