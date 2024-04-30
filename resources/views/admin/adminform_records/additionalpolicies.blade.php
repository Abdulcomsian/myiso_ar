@extends('admin.dashboard.layouts.app')

@section('content')
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid text-right" id="kt_content">

	<!--Begin::Dashboard 1-->


	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12 d-flex justify-content-between">
			<h2>سياسات إضافية</h2>
			@php
			$urlparam = request()->route()->parameters;
		@endphp

			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<a href="/edit_user/{{ $urlparam['userid'] }}" class="btn btn-clean btn-icon-sm mb-2 back_icon col-1" style="float: right;">
						خلف
						<i class="la la-long-arrow-left"></i>
					</a>
					&nbsp;
					
				</div>
			</div>
		</div>
	</div>
	<section id="procedure_section">
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div">
					<!-- Display Quality Policy -->
					<h5 class="m-t-10">سياسة الجودة:</h5>
					@if ($qualityPolicy)
						<pre style="font-size: 13px;color: #040404 !important;font-family: inherit;font-weight: normal;">{{ $qualityPolicy->message }}</pre>
					@endif
				</div>
				<div class="procedure_div">
					<!-- Display Environmental Policy -->
					<h5 class="m-t-10">السياسة البيئية:</h5>
					@if ($environmentalPolicy)
						<pre style="font-size: 13px;color: #040404 !important;font-family: inherit;font-weight: normal;">{{ $environmentalPolicy->message }}</pre>
					@endif
				</div>
				<div class="procedure_div">
					<!-- Display Health and Safety Policy -->
					<h5 class="m-t-10">سياسة الصحة والسلامة:</h5>
					@if ($healthSafetyPolicy)
						<pre style="font-size: 13px;color: #040404 !important;font-family: inherit;font-weight: normal;">{{ $healthSafetyPolicy->message }}</pre>
					@endif
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>
@endsection
<!-- end:: Content -->
