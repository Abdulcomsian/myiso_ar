<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('admin.dashboard.includes.head')

<body class="am-body kt-page--loading">

{{-- ============ Modern Sidebar ============ --}}
<aside class="am-sidebar" id="amSidebar">
    <div class="am-sidebar__brand">
        <a href="{{ url('admin') }}">
            <img src="{{ asset('assets/media/logos/MyISOOnline-Logo.png') }}" alt="MyISOOnline">
        </a>
        <button class="am-sidebar__close" id="amSidebarClose" aria-label="إغلاق">
            <i class="la la-close"></i>
        </button>
    </div>

    <nav class="am-sidebar__nav">

        <div class="am-nav-heading">نظرة عامة</div>

        <div class="am-nav-item">
            <a href="{{ url('admin') }}" class="am-nav-link {{ Request::is('admin') ? 'active' : '' }}">
                <i class="fa fa-th-large"></i>
                <span>لوحة المتابعة</span>
            </a>
        </div>

        <div class="am-nav-heading">إدارة المستخدمين</div>

        <div class="am-nav-item">
            <a href="{{ url('/view_user') }}" class="am-nav-link {{ Request::is('view_user') ? 'active' : '' }}">
                <i class="fa fa-users"></i>
                <span>عرض قائمة المستخدمين</span>
            </a>
        </div>

        <div class="am-nav-item">
            <a href="{{ url('/add_user') }}" class="am-nav-link {{ Request::is('add_user') ? 'active' : '' }}">
                <i class="fa fa-user-plus"></i>
                <span>إضافة مستخدم</span>
            </a>
        </div>

        <div class="am-nav-heading">التواصل</div>

        <div class="am-nav-item am-nav-group {{ Request::is('send_message*') || Request::is('received_Notification*') || Request::is('receive_notifications*') || Request::is('sent_notification*') || Request::is('message*') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-envelope"></i>
                <span>الإخطارات</span>
                <span class="am-badge count_notifications" style="display:none;"></span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('/send_message') }}" class="am-nav-link {{ Request::is('send_message*') ? 'active' : '' }}">إنشاء رسالة</a>
                <a href="{{ route('receiveNotification') }}" class="am-nav-link {{ Request::is('received_Notification*') || Request::is('receive_notifications*') || Request::is('message*') ? 'active' : '' }}">صندوق الرسائل</a>
                <a href="{{ route('sentNotification') }}" class="am-nav-link {{ Request::is('sent_notification*') ? 'active' : '' }}"> تم الإرسال</a>
            </div>
        </div>

        <div class="am-nav-heading">الموارد</div>

        <div class="am-nav-item am-nav-group {{ Request::is('all_faqs*') || Request::is('all_videos*') || Request::is('downloads*') || Request::is('view_downloads*') ? 'open' : '' }}">
            <a href="javascript:;" class="am-nav-link am-nav-group__toggle">
                <i class="fa fa-info-circle"></i>
                <span>معلومات خاصة بالمستخدمين</span>
                <i class="fa fa-chevron-right am-chevron"></i>
            </a>
            <div class="am-nav-group__children">
                <a href="{{ url('/all_faqs') }}" class="am-nav-link {{ Request::is('all_faqs*') ? 'active' : '' }}">الأسئلة الشائعة</a>
                <a href="{{ url('/all_videos') }}" class="am-nav-link {{ Request::is('all_videos*') ? 'active' : '' }}">مقاطع الفيديو</a>
                <a href="{{ url('/downloads') }}" class="am-nav-link {{ Request::is('downloads*') ? 'active' : '' }}"> التحميلات</a>
            </div>
        </div>

    </nav>
</aside>

{{-- ============ Top Header ============ --}}
<header class="am-header">
    <button class="am-header__toggle" id="amSidebarToggle" aria-label="القائمة">
        <i class="fa fa-bars"></i>
    </button>
    <div>
        <h1 class="am-header__title">@yield('page_title', 'لوحة الإدارة')</h1>
        <p class="am-header__crumb">@yield('page_crumb', 'MyISOOnline')</p>
    </div>

    <div class="am-header__right">
        @auth
        <div class="am-user-wrap">
            <button type="button" class="am-user" id="amUserToggle" aria-haspopup="true" aria-expanded="false">
                <span class="am-user__avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                <span class="am-user__name">{{ Auth::user()->name ?? '' }}</span>
                <i class="fa fa-chevron-down am-user__caret"></i>
            </button>
            <div class="am-user-menu" id="amUserMenu">
                <div class="am-user-menu__header">
                    <div class="am-user-menu__name">{{ Auth::user()->name ?? '' }}</div>
                    <div class="am-user-menu__email">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <a href="{{ url('/admin') }}" class="am-user-menu__item">
                    <i class="fa fa-th-large"></i> لوحة المتابعة
                </a>
                <a href="{{ url('/view_user') }}" class="am-user-menu__item">
                    <i class="fa fa-cog"></i> عرض قائمة المستخدمين
                </a>
                <div class="am-user-menu__divider"></div>
                <a href="{{ url('/logout') }}" class="am-user-menu__item danger">
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

{{-- ============ Shared delete confirmation modal ============ --}}
<div class="am-modal" id="amConfirmDelete" role="dialog" aria-modal="true">
    <div class="am-modal__box">
        <div class="am-modal__header">
            <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
            <h4 class="am-modal__title">حذف؟</h4>
        </div>
        <div class="am-modal__body">
            هل أنت متأكد من الحذف؟ لا يمكن التراجع عن هذا الإجراء.
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
            <form id="amConfirmForm" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="id" id="amConfirmId">
                <div id="amConfirmExtras"></div>
                <button type="submit" class="am-btn" style="background:var(--am-danger);color:#fff;">
                    <i class="fa fa-trash"></i> نعم، احذف
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Metronic scripts + DataTables etc. --}}
@include('admin.dashboard.includes.foot')

<script>
    (function() {
        var sidebar = document.getElementById('amSidebar');
        var toggle = document.getElementById('amSidebarToggle');
        var closeBtn = document.getElementById('amSidebarClose');
        var backdrop = document.getElementById('amBackdrop');
        function open()  { sidebar.classList.add('open'); backdrop.style.display = 'block'; }
        function close() { sidebar.classList.remove('open'); backdrop.style.display = 'none'; }
        toggle   && toggle.addEventListener('click', open);
        closeBtn && closeBtn.addEventListener('click', close);
        backdrop && backdrop.addEventListener('click', close);
    })();

    document.querySelectorAll('.am-nav-group__toggle').forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            el.closest('.am-nav-group').classList.toggle('open');
        });
    });

    (function() {
        var toggle = document.getElementById('amUserToggle');
        var menu = document.getElementById('amUserMenu');
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

    (function() {
        var modal      = document.getElementById('amConfirmDelete');
        var form       = document.getElementById('amConfirmForm');
        var idInput    = document.getElementById('amConfirmId');
        var extrasWrap = document.getElementById('amConfirmExtras');

        document.addEventListener('click', function(e) {
            var btn = e.target.closest('.am-confirm-delete');
            if (!btn) return;
            e.preventDefault();
            form.setAttribute('action', btn.getAttribute('data-action') || '');
            idInput.value = btn.getAttribute('data-id') || '';

            extrasWrap.innerHTML = '';
            var extra = btn.getAttribute('data-extra');
            if (extra) {
                extra.split('&').forEach(function(kv) {
                    var parts = kv.split('=');
                    if (parts.length === 2) {
                        var i = document.createElement('input');
                        i.type = 'hidden'; i.name = parts[0]; i.value = decodeURIComponent(parts[1]);
                        extrasWrap.appendChild(i);
                    }
                });
            }
            modal.classList.add('open');
        });
    })();

    (function() {
        document.addEventListener('click', function(e) {
            var closeBtn = e.target.closest('.am-modal-close');
            if (closeBtn) {
                var m = closeBtn.closest('.am-modal');
                if (m) m.classList.remove('open');
                return;
            }
            if (e.target.classList && e.target.classList.contains('am-modal')) {
                e.target.classList.remove('open');
            }
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.am-modal.open').forEach(function(m){ m.classList.remove('open'); });
            }
        });
    })();
</script>

</body>
</html>
