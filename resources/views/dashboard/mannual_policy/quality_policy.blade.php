@extends('dashboard.layouts.app')

@section('content')
<style>
	.text-right{
		text-align: right;
	}
</style>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

	<!--Begin::Dashboard 1-->


	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12 text-right">
			<h2>سياسة الجودة</h2>
		</div>
	</div>
	<section id="procedure_section">
		<?php
			$companyName=Auth::user()->company_name;
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div">
					<div class="row">
						<div class="col-lg-12 text-right">
							<a onclick="qualityshowpolicy()" class="addBtn">إضافة سياسة الجودة</a>
						</div>
					</div>

					<div class="quality_add_div text-right">
						<form action="{{ route('add_quality') }}" id="addcust" method="post">
							@csrf
							<h3>إضافة سياسة الجودة</h3>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>يرجى إدخال سياسات جودة إضافية خاصة ببيئة عملك وأنشطة شركتك </label><br>
										<textarea name="message" class="form-control" placeholder="تعيين الحد الأقصى لعدد الأحرف التي يمكن إدخالها إلى 10000.">{{ $previousPolicy ? $previousPolicy->message : '' }}</textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="status" value="1" />
							<button type="submit" class="submitBtn">يُقدِّم</button>
							<button type="reset" onclick="qualityshowpolicy()" class="btn btn-secondary submitBtn" style="margin-right:7px;">يلغي</button>
						</form>
					</div>
				</div>

				<div class="procedure_div text-right">
					<p>تلتزم إدارة <b><span class="authName">{{ $companyName}}</span></b> بتقديم المنتجات والخدمات التي تفوق دومًا احتياجات عملائنا من حيث الجودة والقيمة، فضلًا عن تلبية توقعات الجهات المعنيّة.</p>
					<p>تستند مثل هذه المنتجات على ركائز كفاءتنا المتمثلة في إدارة العملاء، وإدارة الإيرادات، والالتزام بالامتثال لجميع القواعد والمصادقة المعمول بها.</p>
					<p>بناء عليه، جرى وضع السياسات التالية ضمانًا لتطوير أعمال مربحة تعمّ فوائدها على جميع أصحاب المصلحة، بما في ذلك الجهات المعنية:</p>
					<p>تنفيذ نظام رسميّ لإدارة الجودة والالتزام به تبعًا لمتطلبات الشهادة ISO 9001:2015.<br>
						الحرص على تحديد أهداف يمكن قياسها، مع التركيز على احتياجات العمل ورضا العملاء والتحسين المستمر لجميع المستويات والوظائف.</p>
					<p>السعي إلى التحسين المستمر للمنتجات التي نقدمها للعملاء ونظام إدارة الجودة المستخدم، ضمانًا لتعزيز تصورات عملائنا في  <b><span class="authName">{{ $companyName}}</span></b></p>
					<p>تطوير علاقات متبادلة المصلحة مع المورّدين والعملاء والجيران وغيرهم من الأطراف المعنية، والحفاظ على هذه العلاقات.</p>
					<p>تعزيز روح العمل الجماعي، والاعتراف بمدى أهمية دور جميع الموظفين لتحقيق النجاح المستمرّ لـ  <b><span class="authName">{{ $companyName}}</span></b></p>
					<p>ضمان الاستفادة القصوى من أهم مواردنا، أي موظفينا، عبر التدريب المستمر والتطوير الوظيفي.</p>
					<p>الفهم المستمر لاحتياجات وتوقعات الأطراف المعنية، والاستجابة لها.</p>
					<!-- Display the previous policy -->
					<h5 class="m-t-10">سياسات إضافية:</h5>
					@if ($previousPolicy)
						<pre style="font-size: 13px;color: #040404 !important;font-family: inherit;font-weight: normal; white-space: pre-wrap; overflow: hidden;">{{ $previousPolicy->message }}</pre>
					@endif  
						{{-- @foreach ($useraddpolicy as $policy)
                        <p>{{$policy->message}}</p>
                        @endforeach --}}
					<p>بصفتي المدير العام، أوافق على تحمّل المسؤولية النهائية عن الجودة. ومن خلال توجيهاتها واعتبارها مثلًا يحتذى به، تضمن الإدارة التشغيلية فهم هذه السياسة وتنفيذها والحفاظ عليها في جميع مستويات  <b><span class="authName">{{ $companyName}}</span></b></p>
					<p>المدير العام:  <span class="authName">{{Auth::user()->director}}</span></p>
					<p>التاريخ:  {{$date}}</p>
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>@endsection
<!-- end:: Content -->