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
			<h2>سياسة الصحة والسلامة</h2>
		</div>
	</div>
	<section id="procedure_section">
		<?php
			$companyName=Auth::user()->company_name;
			
		?>
		<div class="row">
			<div class="col-lg-12 text-right">

				<div class="procedure_div">
					<div class="row">
						<div class="col-lg-12 text-right">
							<a onclick="qualityshowpolicy()" class="addBtn">إضافة سياسة الصحة والسلامة</a>
						</div>
					</div>

					<div class="quality_add_div">
						<form action="{{ route('health_policy') }}" id="addcust" method="post">
							@csrf
							<h3>إضافة سياسة الصحة والسلامة</h3>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>يرجى إدخال مزيد من سياسات الصحة والسلامة الخاصة ببيئة عملك وأنشطة شركتك </label><br>
										<textarea name="message" class="form-control" placeholder="تعيين الحد الأقصى لعدد الأحرف التي يمكن إدخالها إلى 10000.">{{ $previousPolicy ? $previousPolicy->message : '' }}</textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="status" value="3" />
							<button type="submit" class="submitBtn">يُقدِّم</button>
							<button type="reset" onclick="qualityshowpolicy()" class="btn btn-secondary submitBtn" style="margin-right:7px;">يلغي</button>
						</form>
					</div>
				</div>

				<div class="procedure_div">
					<p>لكل دولة أنظمتها وقوانينها الخاصة المعنية بالصحة والسلامة في العمل، والتي يجب على الموظفين وصاحب العمل الالتزام بها. يتعيّن على الشركة التأكد من درايتهم وفهمهم لمسؤولياتهم، والتحقق بانتظام من التحديثات والتغييرات.</p>
					<p><b><span class="authName">{{ $companyName}}</span></b>  على تطوير واحترام اتباع إجراءات من شأنها تحديد المخاطر وتقييمها، وتحديد الضوابط ثم تنفيذها. وستجري مراجعة هذه الضوابط ومراقبتها بشكل منتظم؛ وستتخذ الشركة جميع الخطوات المعقولة للحد من المخاطر داخل مكان العمل، مع تقديم التوجيهات بشأن التدابير التي ينبغي تطبيقها ضمن التسلسل الهرمي للرقابة. عند تعذّر إزالة المخاطر، ستتخذ الشركة الخطوات اللازمة لضمان إزالة المخاطر الصحية أو مخاطر الإصابة، أو الحد منها.</p>
					<h5 class="m-t-30">واجبات أصحاب العمل:</h5>
					<p>يجب على أصحاب العمل بذل أقصى جهد ممكن عمليًا لضمان معايير الصحة والسلامة والرفاهية في العمل لجميع الموظفين وغير الموظفين. يجب على أصحاب العمل إجراء التقييمات المناسبة والكافية للمخاطر المهدِّدة لصحة وسلامة الموظفين في العمل وغير الموظفين ممن يتأثرون بالأعمال التجارية. ينبغي أن يحدد التقييم التدابير الواجب اتخاذها للامتثال للأحكام القانونية؛ ويجب أن يتضمن الأنشطة الروتينية وغير الروتينية، ويتعيّن مراجعته في حال إجراء أي تعديلات كبيرة، أو عند الاعتقاد بأنه لم يعد صالحًا.</p>
					<p>بالإضافة إلى ذلك، يجب أن يضمن أصحاب تنفيذ التدابير الوقائية والحمائية واتخاذ الترتيبات اللازمة لتنظيم أعمال التخطيط الفعال والرقابة والرصد ومراجعة التدابير الوقائية والحمائية المقدمة.</p>
					<p>من واجب صاحب العمل تزويد الموظفين بمعلومات شاملة وذات صلة بالمخاطر المهدِّدة لصحتهم وسلامتهم والتي حددها التقييم وتدابير الوقاية والحماية المقدمة.</p>
					<h5 class="m-t-30">واجبات الموظفين:</h5>
					<p>يقع على عاتق الموظفين واجب العناية المعقولة بصحتهم وسلامتهم وصحة الأشخاص الآخرين الذين قد يتأثرون بعملهم أو تصرفاتهم. ويتحتّم عليهم التعاون مع صاحب العمل امتثالًا لالتزاماتهم المتعلقة بالصحة والسلامة بموجب لوائح الصحة والسلامة في العمل ذات الصلة في بلدهم.</p>
					<p>تقع على عاتق الموظف مسؤولية ضمان الاستخدام الصحيح للآلات أو المعدات أو وسائل الإنتاج أو أجهزة السلامة التي يوفرها صاحب العمل وفقًا لأي تعليمات أو تدريب أو توجيهات يتم تلقيها بموجب اللوائح ذات الصلة.</p>
					<h5 class="m-t-10">سياسات إضافية:</h5>
					<h5 class="m-t-10">الغاية:</h5>
					<p>تحدد هذه الوثيقة السياسة والممارسات التي سيتم اعتمادها ضمانًا لإجراء تقييمات مناسبة وكافية للمخاطر وفقًا لمتطلبات الأنظمة المعمول بها ذات الصلة. وتصف الوثيقة نظام إجراء تقييمات المخاطر العامة في <b><span class="authName">{{ $companyName}}</span></b> في إطار برنامج إدارة السلامة والصحة والبيئة. لا يشمل هذا الإجراء تقييمات المخاطر التي جرت في إطار مراقبة المعادن الخطرة والمواد الكيميائية والمواد الأخرى، أو التعامل معها، أو استخدام شاشات العرض والإجراءات المتكررة.</p>
					@if ($previousPolicy)
					<pre style="font-size: 13px;color: #040404 !important;font-family: inherit;font-weight: normal; white-space: pre-wrap; overflow:hidden;">{{ $previousPolicy->message }}</pre>
					@endif  
					{{-- @foreach ($useraddpolicy as $health)
						<p>{{$health->message}}</p>
						@endforeach --}}
					<p>بالنيابة عن : <b><span class="authName">{{ $companyName}}</span></b></p>
					<p>الاسم: <span class="authName">{{Auth::user()->director}}</span></p>
					<p>التاريخ: {{$date}}</p>
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>
@endsection
<!-- end:: Content -->