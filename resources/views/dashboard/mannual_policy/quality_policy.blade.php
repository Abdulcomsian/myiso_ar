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
										<textarea name="message" class="form-control" placeholder="تعيين الحد الأقصى لعدد الأحرف التي يمكن إدخالها إلى 10000."></textarea>
										@error('message')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
							<input type="hidden" name="status" value="1" />
							<button type="submit" class="submitBtn">يُقدِّم</button>
							<button type="reset" onclick="qualityshowpolicy()" class="btn btn-secondary submitBtn" style="margin-right:7px;">يلغي</button>
						</form>
					</div>
				</div>

				<div class="procedure_div text-right">
					<p>تلتزم إدارة {{ $companyName }} بتقديم المنتجات والخدمات التي تفوق دومًا احتياجات عملائنا من حيث الجودة والقيمة، فضلًا عن تلبية توقعات الجهات المعنيّة.</p>
					<p>تستند مثل هذه المنتجات على ركائز كفاءتنا المتمثلة في إدارة العملاء، وإدارة الإيرادات، والالتزام بالامتثال لجميع القواعد والمصادقة المعمول بها.</p>
					<p>بناء عليه، جرى وضع السياسات التالية ضمانًا لتطوير أعمال مربحة تعمّ فوائدها على جميع أصحاب المصلحة، بما في ذلك الجهات المعنية:</p>
					<p>تنفيذ نظام رسميّ لإدارة الجودة والالتزام به تبعًا لمتطلبات الشهادة ISO 9001:2015.<br>
						الحرص على تحديد أهداف يمكن قياسها، مع التركيز على احتياجات العمل ورضا العملاء والتحسين المستمر لجميع المستويات والوظائف.</p>
					<p>السعي إلى التحسين المستمر للمنتجات التي نقدمها للعملاء ونظام إدارة الجودة المستخدم، ضمانًا لتعزيز تصورات عملائنا في  {{ $companyName }}</p>
					<p>تطوير علاقات متبادلة المصلحة مع المورّدين والعملاء والجيران وغيرهم من الأطراف المعنية، والحفاظ على هذه العلاقات.</p>
					<p>تعزيز روح العمل الجماعي، والاعتراف بمدى أهمية دور جميع الموظفين لتحقيق النجاح المستمرّ لـ  {{ $companyName }}</p>
					<p>ضمان الاستفادة القصوى من أهم مواردنا، أي موظفينا، عبر التدريب المستمر والتطوير الوظيفي.</p>
					<p>الفهم المستمر لاحتياجات وتوقعات الأطراف المعنية، والاستجابة لها.</p>
					<p>بصفتي المدير العام، أوافق على تحمّل المسؤولية النهائية عن الجودة. ومن خلال توجيهاتها واعتبارها مثلًا يحتذى به، تضمن الإدارة التشغيلية فهم هذه السياسة وتنفيذها والحفاظ عليها في جميع مستويات  {{ $companyName }}</p>
					<h6 class="mt-4" style="color:#2E3B9A;font-weight:600;">سياسات إضافية:</h6>
					@forelse ($userAddPolicy as $policy)
					<div style="{{ $loop->first ? '' : 'border-top:1px solid #e6e8f0;margin-top:16px;' }}padding-top:{{ $loop->first ? '4' : '16' }}px;">
						<p class="mb-2" style="white-space:pre-wrap;">{{ $policy->message }}</p>
						<div style="line-height:1.5;">
							<div><strong style="font-weight:600;">المدير العام:</strong>  {{ Auth::user()->director }}</div>
							<div><strong style="font-weight:600;">التاريخ:</strong>  {{ $policy->created_at->format('d/m/Y g:i') }} {{ $policy->created_at->format('A') === 'AM' ? 'ص' : 'م' }}</div>
						</div>
					</div>
					@empty
					<div style="line-height:1.5;">
						<div><strong style="font-weight:600;">المدير العام:</strong>  {{ Auth::user()->director }}</div>
					</div>
					@endforelse
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>@endsection
<!-- end:: Content -->
