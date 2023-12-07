@extends('dashboard.layouts.app')

@section('content')
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

	<!--Begin::Dashboard 1-->


	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12 text-right">
			<h2>سجل الوثيقة</h2>
		</div>
	</div>
	<section id="procedure_section" class="text-right">
		
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div">
					<h4>1.0 - الإجراءات والنماذج الرئيسية</h4>
					<ul>
						<li><a href="{{ url('/quality_manual') }}">دليل الجودة</a></li>
						<li><a href="{{ url('/quality_policy') }}">سياسة الجودة</a></li>
						<li><a href="{{ url('/enviornment_policy') }}">السياسة البيئية</a></li>
						<li><a href="{{ url('/health_policy') }}"> سياسة الصحة والسلامة</a></li>
						<li><a href="{{ url('/management_organogram') }}"> الهيكل التنظيمي للإدارة</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="procedure_div">
					<h4>العمليات</h4>
					<ul>
						<li><a href="{{ url('/sale_processes') }}">إجراء الجودة 1 - عملية المبيعات</a></li>
						<li><a href="{{ url('/purchasing_processes') }}">إجراء الجودة 2 - عملية الشراء</a></li>
						<li><a href="{{ url('/servicing_contract') }}">إجراء الجودة 3 - تنفيذ بنود العقد</a></li>
						<li><a href="{{ url('/competency_process') }}">إجراء الجودة 4 - عملية الكفاءة</a></li>
						<li><a href="{{ url('/process_interaction') }}">تفاعل العملية</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="procedure_div">
					<h4>الإجراءات</h4>
					<ul>
						<li><a href="{{ url('/documented_information') }}"> الإجراء 1 - المعلومات الموثقة</a></li>
						<li><a href="{{ url('/corrective_action') }}">الإجراء 2 - الإجراءات التصحيحية بما في ذلك حالات عدم المطابقة</a></li>
						<li><a href="{{ url('/management_review') }}">الإجراء 3 - المراجعة الإدارية</a></li>
						<li><a href="{{ url('/monitoring_measure') }}">الإجراء 4 - أدوات الرقابة والقياس</li>
						<li><a href="{{url('auidt')}}"> الإجراء 5 - عمليات التدقيق</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="procedure_div">
					<h4>النماذج والسجلات</h4>
					<div class="list_display">
						<ul>
							<li><a href="{{ url('/requirements_aspect') }}"> المتطلبات المطلوبة</a></li>
							<li><a href="{{ url('/process_audit') }}"> عمليات التدقيق</a></li>
							<li><a href="{{ url('/interesting_parties')}}">الأطراف المعنية</a></li>
							<li><a href="{{ url('/qms_audit') }}">عمليات تدقيق نظام إدارة الجودة</a></li>
							<li><a href="{{ url('/non_confromities') }}">حالات عدم المطابقة</a></li>
							<li><a href="{{ url('/customer') }}">العملاء</a></li>
						</ul>
						<ul>
							<li><a href="{{ url('/customer_review') }}">مراجعة العملاء</a></li>
							<li><a href="{{ url('/supplier') }}">الموردون</a></li>
							<li><a href="{{ url('/calibration_record') }}">المعايرة</a></li>
							<li><a href="{{ url('/employess') }}">الموظفون</a></li>
							<li><a href="{{ url('/add_management_review') }}">المراجعات الإدارية</a></li>
						</ul>
						<ul>
							<li><a href="{{ url('/maintance_record') }}">سجلات الصيانة</a></li>
							<li><a href="{{ url('/accident_risk') }}">تقييمات مخاطر الحوادث</a></li>
							<li><a href="{{ url('chemical_control') }}">التحكم الكيميائي</a></li>
							<li><a href="{{ url('/risk_assessment') }}">تقييمات المخاطر</a></li>
							<li><a href="{{ url('/work_instruction') }}">تعليمات العمل</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div">
					<h4>2.0 - تعليمات العمل المحلية</h4>

					    <div class="list_display">
						<ul>
					        @foreach($work as $item)						    
							<li><a href="{{ url('/work_instruction') }}">{{ $item->workinstruction}}</a></li>
                            @endforeach;
						</ul>
						</div>
						
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">حذف المتطلبات المستحقة</h5>
				<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
				</a>
			</div>
			<div class="modal-body">
				<p>هل أنت متأكد؟ هل تريد حقًا حذف هذا؟.</p>
			</div>
			<div class="modal-footer">
				<form action="" method="POST">
				@csrf
				@method('DELETE')
				<button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
				<button type="submit" class="btn btn-danger">نعم</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- end:: Content -->