{{-- The English site's booking page, in Arabic.

     The page itself is a Calendly embed, so the booking form inside the frame
     is Calendly's own and stays left to right in English - Calendly has no
     right-to-left support. Everything around it follows the page.

     The sidebar link to this page is hidden for now; the route and the page
     are here so that showing it is only a matter of taking the style attribute
     off the link in the layout. --}}
@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>جدولة التدريب</h2>
            <p>اختر اليوم والوقت المناسبين لحجز جلسة التدريب الخاصة بك.</p>
        </div>
    </div>

    <div class="am-card">
        <div class="am-card__body" style="padding:32px;">
            <div class="calendly-inline-widget"
                 data-url="https://calendly.com/isoonline/30min?name={{ urlencode(Auth::check() ? Auth::user()->name : '') }}&email={{ urlencode(Auth::check() ? Auth::user()->email : '') }}"
                 style="min-width:320px; height:750px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
        </div>
    </div>

</div>
@endsection
