@extends('admin.dashboard.layouts.app')

@section('content')
@php $urlparam = request()->route()->parameters; @endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    {{-- Page header --}}
    <div class="am-page-header">
        <div>
            <h2>سياسات إضافية</h2>
            <p>سياسات الجودة والبيئة والصحة والسلامة المقدمة من العميل.</p>
        </div>
        <div>
            <a href="{{ url('/edit_user/'.($urlparam['userid'] ?? '')) }}" class="am-btn am-btn-outline">
                <i class="fa fa-arrow-left"></i> العودة إلى النماذج
            </a>
        </div>
    </div>

    <div class="row" style="margin:0;">
        {{-- Quality Policy --}}
        <div class="col-md-4" style="padding:0 8px 16px 0;">
            <div class="am-card" style="height:100%;">
                <div class="am-card__header">
                    <h3><i class="fa fa-award" style="color:var(--am-primary);margin-right:8px;"></i> سياسة الجودة</h3>
                </div>
                <div class="am-card__body">
                    @if ($qualityPolicy && !empty($qualityPolicy->message))
                        <pre style="font-size:13px;color:var(--am-text);font-family:inherit;font-weight:normal;white-space:pre-wrap;word-wrap:break-word;margin:0;">{{ $qualityPolicy->message }}</pre>
                    @else
                        <div class="am-empty">
                            <i class="fa fa-file-alt"></i>
                            <p>لا توجد سياسة جودة مسجلة.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Environmental Policy --}}
        <div class="col-md-4" style="padding:0 8px 16px 8px;">
            <div class="am-card" style="height:100%;">
                <div class="am-card__header">
                    <h3><i class="fa fa-leaf" style="color:#26c281;margin-right:8px;"></i> السياسة البيئية</h3>
                </div>
                <div class="am-card__body">
                    @if ($environmentalPolicy && !empty($environmentalPolicy->message))
                        <pre style="font-size:13px;color:var(--am-text);font-family:inherit;font-weight:normal;white-space:pre-wrap;word-wrap:break-word;margin:0;">{{ $environmentalPolicy->message }}</pre>
                    @else
                        <div class="am-empty">
                            <i class="fa fa-file-alt"></i>
                            <p>لا توجد سياسة بيئية مسجلة.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Health & Safety Policy --}}
        <div class="col-md-4" style="padding:0 0 16px 8px;">
            <div class="am-card" style="height:100%;">
                <div class="am-card__header">
                    <h3><i class="fa fa-first-aid" style="color:#eb4d4b;margin-right:8px;"></i> سياسة الصحة والسلامة</h3>
                </div>
                <div class="am-card__body">
                    @if ($healthSafetyPolicy && !empty($healthSafetyPolicy->message))
                        <pre style="font-size:13px;color:var(--am-text);font-family:inherit;font-weight:normal;white-space:pre-wrap;word-wrap:break-word;margin:0;">{{ $healthSafetyPolicy->message }}</pre>
                    @else
                        <div class="am-empty">
                            <i class="fa fa-file-alt"></i>
                            <p>لا توجد سياسة صحة وسلامة مسجلة.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
