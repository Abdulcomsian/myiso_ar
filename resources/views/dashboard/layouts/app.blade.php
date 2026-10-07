@include('dashboard.includes.head')

<body class="am-body">

{{-- ============ Modern Sidebar ============ --}}
<aside class="am-sidebar" id="amSidebar">
    <div class="am-sidebar__brand">
        <a href="{{ url('/home') }}">
            <img src="{{ asset(Auth::user()->profile_image) }}" alt="Logo" style="max-height:50px;width:auto;max-width:160px;object-fit:contain;">
        </a>
        <button class="am-sidebar__close" id="amSidebarClose" aria-label="إغلاق القائمة">
            <i class="la la-close"></i>
        </button>
    </div>

    <nav class="am-sidebar__nav">

        <div class="am-nav-heading">نظرة عامة</div>

        <div class="am-nav-item">
            <a href="{{ url('/home') }}" class="am-nav-link {{ Request::is('home') ? 'active' : '' }}">
                <i class="fa fa-th-large"></i>
                <span>لوحة المتابعة</span>
            </a>
        </div>

        <div class="am-nav-heading">الوثائق</div>

        <div class="am-nav-item am-nav-group {{ Request::is('quality_manual') || Request::is('quality_policy') || Request::is('environment_policy') || Request::is('health_policy') || Request::is('management_organogram') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-lock"></i>
                <span>الأدلة والسياسات</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('quality_manual') }}" class="am-nav-link {{ Request::is('quality_manual') ? 'active' : '' }}">دليل الجودة</a>
                <a href="{{ url('quality_policy') }}" class="am-nav-link {{ Request::is('quality_policy') ? 'active' : '' }}">سياسة الجودة</a>
                <a href="{{ url('environment_policy') }}" class="am-nav-link {{ Request::is('environment_policy') ? 'active' : '' }}">السياسة البيئية</a>
                <a href="{{ url('health_policy') }}" class="am-nav-link {{ Request::is('health_policy') ? 'active' : '' }}">سياسة الصحة والسلامة</a>
                <a href="{{ url('management_organogram') }}" class="am-nav-link {{ Request::is('management_organogram') ? 'active' : '' }}">الهيكل التنظيمي للإدارة</a>
            </div>
        </div>

        <div class="am-nav-item am-nav-group {{ Request::is('sale_processes') || Request::is('purchasing_processes') || Request::is('servicing_contract') || Request::is('competency_process') || Request::is('process_interaction') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-spinner"></i>
                <span>مخططات سير العمليات</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('sale_processes') }}" class="am-nav-link {{ Request::is('sale_processes') ? 'active' : '' }}">إجراء الجودة 1 – عملية المبيعات</a>
                <a href="{{ url('purchasing_processes') }}" class="am-nav-link {{ Request::is('purchasing_processes') ? 'active' : '' }}">إجراء الجودة 2 – عملية الشراء</a>
                <a href="{{ url('servicing_contract') }}" class="am-nav-link {{ Request::is('servicing_contract') ? 'active' : '' }}">إجراء الجودة 3 – تنفيذ بنود العقد</a>
                <a href="{{ url('competency_process') }}" class="am-nav-link {{ Request::is('competency_process') ? 'active' : '' }}">إجراء الجودة 4 – عملية الكفاءة</a>
                <a href="{{ url('process_interaction') }}" class="am-nav-link {{ Request::is('process_interaction') ? 'active' : '' }}">تفاعل العمليات</a>
            </div>
        </div>

        <div class="am-nav-item am-nav-group {{ Request::is('documented_information') || Request::is('corrective_action') || Request::is('management_review') || Request::is('monitoring_measure') || Request::is('auidt') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-gear"></i>
                <span>الإجراءات</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('documented_information') }}" class="am-nav-link {{ Request::is('documented_information') ? 'active' : '' }}">الإجراء 1 – المعلومات الموثقة</a>
                <a href="{{ url('corrective_action') }}" class="am-nav-link {{ Request::is('corrective_action') ? 'active' : '' }}">الإجراء 2 – الإجراءات التصحيحية</a>
                <a href="{{ url('management_review') }}" class="am-nav-link {{ Request::is('management_review') ? 'active' : '' }}">الإجراء 3 – المراجعة الإدارية</a>
                <a href="{{ url('monitoring_measure') }}" class="am-nav-link {{ Request::is('monitoring_measure') ? 'active' : '' }}">الإجراء 4 – أدوات الرقابة والقياس</a>
                <a href="{{ url('auidt') }}" class="am-nav-link {{ Request::is('auidt') ? 'active' : '' }}">الإجراء 5 – عمليات التدقيق</a>
            </div>
        </div>

        <div class="am-nav-item am-nav-group {{ Request::is('requirements_aspect') || Request::is('environmental_impacts') || Request::is('process_audit') || Request::is('incidents') || Request::is('interesting_parties') || Request::is('hazards') || Request::is('qms_audit') || Request::is('non_confromities') || Request::is('customer') || Request::is('customer_review') || Request::is('supplier') || Request::is('supplier_review') || Request::is('calibration_record') || Request::is('employess') || Request::is('add_management_review') || Request::is('maintance_record') || Request::is('accident_risk') || Request::is('risk_assessment') || Request::is('chemical_control') || Request::is('work_instruction') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fab fa-wpforms"></i>
                <span>النماذج والسجلات</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('interesting_parties') }}" class="am-nav-link {{ Request::is('interesting_parties') ? 'active' : '' }}">الأطراف المعنية</a>
                <a href="{{ url('environmental_impacts') }}" class="am-nav-link {{ Request::is('environmental_impacts') ? 'active' : '' }}">التأثيرات البيئية</a>
                <a href="{{ url('chemical_control') }}" class="am-nav-link {{ Request::is('chemical_control') ? 'active' : '' }}">التحكم الكيميائي</a>
                <a href="{{ url('work_instruction') }}" class="am-nav-link {{ Request::is('work_instruction') ? 'active' : '' }}">تعليمات العمل</a>
                <a href="{{ url('incidents') }}" class="am-nav-link {{ Request::is('incidents') ? 'active' : '' }}">تقرير الحوادث</a>
                <a href="{{ url('risk_assessment') }}" class="am-nav-link {{ Request::is('risk_assessment') ? 'active' : '' }}">تقييمات المخاطر</a>
                <a href="{{ url('accident_risk') }}" class="am-nav-link {{ Request::is('accident_risk') ? 'active' : '' }}">تقييمات مخاطر الحوادث</a>
                <a href="{{ url('non_confromities') }}" class="am-nav-link {{ Request::is('non_confromities') ? 'active' : '' }}">حالات عدم المطابقة</a>
                <a href="{{ url('hazards') }}" class="am-nav-link {{ Request::is('hazards') ? 'active' : '' }}">سجل المخاطر</a>
                <a href="{{ url('maintance_record') }}" class="am-nav-link {{ Request::is('maintance_record') ? 'active' : '' }}">سجلات الصيانة</a>
                <a href="{{ url('customer') }}" class="am-nav-link {{ Request::is('customer') ? 'active' : '' }}">العملاء</a>
                <a href="{{ url('process_audit') }}" class="am-nav-link {{ Request::is('process_audit') ? 'active' : '' }}">عمليات التدقيق</a>
                <a href="{{ url('qms_audit') }}" class="am-nav-link {{ Request::is('qms_audit') ? 'active' : '' }}">عمليات تدقيق نظام إدارة الجودة</a>
                <a href="{{ url('requirements_aspect') }}" class="am-nav-link {{ Request::is('requirements_aspect') ? 'active' : '' }}">المتطلبات المطلوبة</a>
                <a href="{{ url('add_management_review') }}" class="am-nav-link {{ Request::is('add_management_review') ? 'active' : '' }}">المراجعات الإدارية</a>
                <a href="{{ url('customer_review') }}" class="am-nav-link {{ Request::is('customer_review') ? 'active' : '' }}">مراجعات العملاء</a>
                <a href="{{ url('supplier_review') }}" class="am-nav-link {{ Request::is('supplier_review') ? 'active' : '' }}">مراجعات الموردين</a>
                <a href="{{ url('calibration_record') }}" class="am-nav-link {{ Request::is('calibration_record') ? 'active' : '' }}">المعايرة</a>
                <a href="{{ url('supplier') }}" class="am-nav-link {{ Request::is('supplier') ? 'active' : '' }}">الموردون</a>
                <a href="{{ url('employess') }}" class="am-nav-link {{ Request::is('employess') ? 'active' : '' }}">الموظفون</a>
            </div>
        </div>

        <div class="am-nav-heading">الدعم</div>

        <div class="am-nav-item am-nav-group {{ Request::is('faq') || Request::is('explainer_videos') || Request::is('userDownload') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-life-ring"></i>
                <span>الدعم</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('faq') }}" class="am-nav-link {{ Request::is('faq') ? 'active' : '' }}">الأسئلة الشائعة</a>
                {{-- Training Videos: hidden on the client's request - may come back --}}
                {{-- <a href="{{ url('explainer_videos') }}" class="am-nav-link {{ Request::is('explainer_videos') ? 'active' : '' }}">فيديوهات التدريب</a> --}}
                <a href="{{ url('userDownload') }}" class="am-nav-link {{ Request::is('userDownload') ? 'active' : '' }}">التحميلات</a>
            </div>
        </div>

        <div class="am-nav-heading">التواصل</div>

        <div id="admin_notifications" class="am-nav-item am-nav-group {{ Request::is('createMessage') || Request::is('inboxMessages*') || Request::is('sentMessages*') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-envelope"></i>
                <span>الإخطارات</span>
                <span class="count_notifications am-badge" style="display:none;"></span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ route('storeMessage') }}" class="am-nav-link">إنشاء رسالة</a>
                <a href="{{ route('inboxMessages') }}" class="am-nav-link">صندوق الوارد</a>
                <a href="{{ route('sentMessages') }}" class="am-nav-link">المرسلة</a>
            </div>
        </div>

        <div class="am-nav-item am-nav-group">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-graduation-cap"></i>
                <span>دورات ISO المعتمدة</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%a2%d9%8a%d8%b2%d9%88-20159001-%d9%86%d8%b8%d8%a7%d9%85-%d8%a5%d8%af%d8%a7%d8%b1%d8%a9-%d8%a7%d9%84%d8%ac%d9%88%d8%af%d8%a9-%d8%af%d9%88%d8%b1%d8%a9-%d8%a7%d9%84%d9%85%d8%af%d9%82%d9%82-%d8%a7/" class="am-nav-link" target="_blank">نظام إدارة الجودة – ISO 9001:2015</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/iso-450012018-occupational-health-safety-management-system-internal-auditor-course/" class="am-nav-link" target="_blank">نظام إدارة الصحة والسلامة المهنية – ISO 45001:2018</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/iso-140012015-environmental-management-system-internal-auditor-course/" class="am-nav-link" target="_blank">نظام الإدارة البيئية – ISO 14001:2015</a>
            </div>
        </div>

        <div class="am-nav-item am-nav-group">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-book"></i>
                <span>دورات قصيرة</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <div class="am-nav-sub-label">ISO 9001:2015</div>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%a3%d9%87%d9%85%d9%8a%d8%a9-%d8%b5%d9%8a%d8%a7%d9%86%d8%a9-%d8%a7%d9%84%d9%85%d8%b9%d8%af%d8%a7%d8%aa-%d9%81%d9%8a-%d9%85%d9%83%d8%a7%d9%86-%d8%a7%d9%84%d8%b9%d9%85%d9%84/" class="am-nav-link" target="_blank">أهمية صيانة المعدات في مكان العمل</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%a5%d8%b9%d8%a7%d8%af%d8%a9-%d8%a7%d8%b3%d8%aa%d8%ae%d8%af%d8%a7%d9%85-%d8%a7%d9%84%d9%85%d9%88%d8%a7%d8%af-%d9%81%d9%8a-%d8%a7%d9%84%d8%a8%d9%86%d8%a7%d8%a1-%d9%88%d8%a7%d9%84%d9%85%d9%83%d8%a7/" class="am-nav-link" target="_blank">إعادة استخدام المواد في البناء والمكاتب</a>
                <div class="am-nav-sub-label">ISO 45001:2018</div>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%a3%d9%87%d9%85%d9%8a%d8%a9-%d8%aa%d8%ac%d9%86%d8%a8-%d8%a7%d9%84%d8%a7%d9%86%d8%b2%d9%84%d8%a7%d9%82%d8%a7%d8%aa-%d9%88%d8%a7%d9%84%d8%aa%d8%b9%d8%ab%d8%b1%d8%a7%d8%aa-%d9%88%d8%a7%d9%84%d8%ad/" class="am-nav-link" target="_blank">أهمية تجنب الانزلاقات والتعثرات والحوادث البسيطة</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%af%d9%88%d8%b1%d8%a9-%d8%a7%d9%84%d9%85%d8%b1%d8%a7%d9%82%d8%a8%d8%a9-%d9%84%d9%84%d8%b3%d9%84%d8%a7%d9%85%d8%a9-%d9%81%d9%8a-%d9%85%d9%88%d8%a7%d9%82%d8%b9-%d8%a7%d9%84%d8%a8%d9%86%d8%a7%d8%a1/" class="am-nav-link" target="_blank">دورة المراقبة للسلامة في مواقع البناء والمكاتب</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%a7%d9%84%d8%b1%d9%81%d8%b9%d8%8c-%d8%a7%d9%84%d8%ad%d9%85%d9%84%d8%8c-%d9%88%d8%a7%d9%84%d8%b9%d9%85%d9%84-%d8%a8%d8%a7%d9%84%d8%b7%d8%b1%d9%8a%d9%82%d8%a9-%d8%a7%d9%84%d8%b5%d8%ad%d9%8a%d8%ad/" class="am-nav-link" target="_blank">الرفع، الحمل، والعمل بالطريقة الصحيحة</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%af%d9%84%d9%8a%d9%84-%d8%a3%d9%81%d8%b6%d9%84-%d8%a7%d9%84%d9%85%d9%85%d8%a7%d8%b1%d8%b3%d8%a7%d8%aa-%d9%84%d8%aa%d8%ac%d9%86%d8%a8-%d8%a7%d9%84%d8%ad%d8%b1%d8%a7%d8%a6%d9%82-%d9%81%d9%8a-%d9%85/" class="am-nav-link" target="_blank">دليل أفضل الممارسات لتجنب الحرائق في مكان العمل</a>
                <div class="am-nav-sub-label">ISO 14001:2015</div>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%aa%d9%82%d9%84%d9%8a%d9%84-%d8%a7%d9%84%d9%86%d9%81%d8%a7%d9%8a%d8%a7%d8%aa-%d8%a7%d9%84%d8%b9%d9%85%d9%84%d9%8a%d8%a9-%d9%81%d9%8a-%d8%a7%d9%84%d8%a8%d9%86%d8%a7%d8%a1/" class="am-nav-link" target="_blank">تقليل النفايات العملية في البناء</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%ad%d9%85%d8%a7%d9%8a%d8%a9-%d8%a7%d9%84%d8%a8%d9%8a%d8%a6%d8%a9-%d9%81%d9%8a-%d9%85%d9%88%d8%a7%d9%82%d8%b9-%d8%a7%d9%84%d8%a8%d9%86%d8%a7%d8%a1/" class="am-nav-link" target="_blank">حماية البيئة في مواقع البناء</a>
                <a href="https://myisoonline.com/ar/public/lms/courses/%d8%aa%d9%82%d9%84%d9%8a%d9%84-%d8%a7%d9%84%d9%86%d9%81%d8%a7%d9%8a%d8%a7%d8%aa-%d9%88%d8%a5%d8%b9%d8%a7%d8%af%d8%a9-%d8%a7%d9%84%d8%aa%d8%af%d9%88%d9%8a%d8%b1-%d9%81%d9%8a-%d8%a8%d9%8a%d8%a6%d8%a9/" class="am-nav-link" target="_blank">تقليل النفايات وإعادة التدوير في بيئة العمل</a>
            </div>
        </div>

    </nav>
</aside>

{{-- ============ Top Header ============ --}}
<header class="am-header">
    <button class="am-header__toggle" id="amSidebarToggle" aria-label="فتح القائمة">
        <i class="fa fa-bars"></i>
    </button>
    <div>
        <h1 class="am-header__title">{{ Auth::user()->company_name }}</h1>
        <p class="am-header__crumb">
            هوية الشركة: {{ Auth::user()->order_number }}
            @php
                $iso9001 = Auth::user()->iso9001_expirydate;
                $iso14001 = Auth::user()->iso14001_expirydate;
                $iso45001 = Auth::user()->iso45001_expirydate;
                $x = $iso9001 ? strtotime($iso9001) : null;
                $y = $iso14001 ? strtotime($iso14001) : null;
                $z = $iso45001 ? strtotime($iso45001) : null;
                $vals = array_filter([$x, $y, $z]);
                $minStamp = $vals ? min($vals) : strtotime('+3 years');
                $expiryLabel = date('d/m/Y', $minStamp);
            @endphp
            &nbsp;·&nbsp; تاريخ انتهاء الصلاحية: {{ $expiryLabel }}
        </p>
    </div>

    <div class="am-header__right">
        @if (Auth::user()->member_scaiso == 1)
            <img src="{{ asset('assets/media/logos/sca-iso-final-logo.png') }}" style="height:32px;width:auto;" alt="SCA ISO">
        @endif

        @auth
        <div class="am-user-wrap">
            <button type="button" class="am-user" id="amUserToggle" aria-haspopup="true" aria-expanded="false">
                <span class="am-user__avatar">{{ mb_strtoupper(mb_substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                <span class="am-user__name">{{ Auth::user()->name ?? 'الحساب' }}</span>
                <i class="fa fa-chevron-down am-user__caret"></i>
            </button>
            <div class="am-user-menu" id="amUserMenu">
                <div class="am-user-menu__header">
                    <div class="am-user-menu__name">{{ Auth::user()->name ?? '' }}</div>
                    <div class="am-user-menu__email">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <a href="{{ route('userprofile') }}" class="am-user-menu__item">
                    <i class="fa fa-user"></i> حسابي
                </a>
                <div class="am-user-menu__divider"></div>
                <a href="{{ route('logout') }}" class="am-user-menu__item danger">
                    <i class="fa fa-sign-out-alt"></i> تسجيل الخروج
                </a>
            </div>
        </div>
        @endauth
    </div>
</header>

{{-- ============ Main content ============ --}}
<div class="am-backdrop" id="amBackdrop" style="display:none;"></div>
<main class="am-main">
    @yield('content')
</main>

@include('dashboard.includes.foot')

<script>
(function() {
    var sidebar  = document.getElementById('amSidebar');
    var toggle   = document.getElementById('amSidebarToggle');
    var closeBtn = document.getElementById('amSidebarClose');
    var backdrop = document.getElementById('amBackdrop');
    function openSidebar()  { sidebar.classList.add('open'); backdrop.style.display = 'block'; }
    function closeSidebar() { sidebar.classList.remove('open'); backdrop.style.display = 'none'; }
    toggle   && toggle.addEventListener('click', openSidebar);
    closeBtn && closeBtn.addEventListener('click', closeSidebar);
    backdrop && backdrop.addEventListener('click', closeSidebar);
})();

document.querySelectorAll('.am-nav-group__toggle').forEach(function(el) {
    el.addEventListener('click', function(e) {
        e.preventDefault();
        el.closest('.am-nav-group').classList.toggle('open');
    });
});

(function() {
    var toggle = document.getElementById('amUserToggle');
    var menu   = document.getElementById('amUserMenu');
    if (!toggle || !menu) return;
    toggle.addEventListener('click', function(e) {
        e.stopPropagation();
        menu.classList.toggle('open');
        toggle.setAttribute('aria-expanded', menu.classList.contains('open'));
    });
    document.addEventListener('click', function(e) {
        if (!menu.contains(e.target) && !toggle.contains(e.target)) {
            menu.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });
})();
</script>

</body>
</html>
