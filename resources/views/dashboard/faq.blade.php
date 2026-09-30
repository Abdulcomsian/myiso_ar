@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>الأسئلة الشائعة</h2>
        </div>
    </div>

    <div class="am-card">
        <div class="am-card__body" style="padding:24px;">
            <div class="row">
                {{-- Category Sidebar --}}
                <div class="col-3">
                    <div class="nav nav-pills flex-column" id="faq-tabs" role="tablist" aria-orientation="vertical">
                        @foreach ($all_cates as $cate)
                            <a href="#tab{{ $cate->id }}"
                               class="nav-link @if($loop->first) active @endif"
                               data-toggle="pill"
                               role="tab"
                               aria-controls="tab{{ $cate->id }}"
                               aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                               style="border-radius:6px; margin-bottom:4px; color:#4580c6; font-weight:500; text-align:right;">
                                <i class="fa fa-question-circle ml-2"></i> {{ $cate->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- FAQ Content --}}
                <div class="col-9">
                    <div class="tab-content" id="faq-tab-content">
                        <?php $x = 1; ?>
                        @foreach ($all_cates as $cate)
                            <div class="tab-pane {{ $x == 1 ? 'show active' : '' }}"
                                 id="tab{{ $cate->id }}"
                                 role="tabpanel"
                                 aria-labelledby="tab{{ $cate->id }}">

                                <div class="accordion" id="accordion-tab-{{ $cate->id }}">
                                    @foreach ($all_faqs as $faq)
                                        @if ($faq->category == $cate->id)
                                            <div class="am-card mb-2 category-{{ str_replace(' ', '-', $cate->name) }}">
                                                <div class="am-card__body" style="padding:0;">
                                                    <div id="accordion-tab-{{ $cate->id }}-heading-{{ $faq->id }}" style="padding:0;">
                                                        <button class="am-btn am-btn-outline w-100"
                                                                type="button"
                                                                data-toggle="collapse"
                                                                data-target="#accordion-tab-{{ $cate->id }}-content-{{ $faq->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="accordion-tab-{{ $cate->id }}-content-{{ $faq->id }}"
                                                                style="border-radius:6px; padding:14px 18px; font-weight:600; text-align:right;">{{ $faq->question }}</button>
                                                    </div>
                                                    <div class="collapse"
                                                         id="accordion-tab-{{ $cate->id }}-content-{{ $faq->id }}"
                                                         aria-labelledby="accordion-tab-{{ $cate->id }}-content-{{ $faq->id }}"
                                                         data-parent="#accordion-tab-{{ $cate->id }}">
                                                        <div style="padding:16px 18px; border-top:1px solid #eee;">
                                                            <!---<p>Category single:{{ $cate->id }}</p>
                                                            <p>Cate from faq: {{ $faq->category }}</p>--->
                                                            <p>   {!! $faq->answer !!} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <?php $x++; ?>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
