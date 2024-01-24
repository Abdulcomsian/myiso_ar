@extends('dashboard.layouts.app')
@section('css')
	<style>
		.text-right{
			text-align: right;
		}
	</style>
@endsection
@section('content')
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

	<!--Begin::Dashboard 1-->


	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12 text-right">
			<h2>السياسة البيئية</h2>
		</div>
	</div>
	<section id="procedure_section">
		<?php
			$companyName=Auth::user()->company_name;
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div text-right">
					<div class="row">
						<div class="col-lg-12">
							<a onclick="qualityshowpolicy()" class="addBtn">إضافة السياسة البيئية</a>
						</div>
					</div>

					<div class="quality_add_div">
						<form action="{{ route('environment_policy') }}" id="addcust" method="post">
							@csrf
							<h3>إضافة السياسة البيئية</h3>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>يرجى إدخال سياسات بيئية إضافية خاصة ببيئة عملك وأنشطة شركتك </label><br>
										<textarea name="message" class="form-control" placeholder="تعيين الحد الأقصى لعدد الأحرف التي يمكن إدخالها إلى 10000.">{{ $previousPolicy ? $previousPolicy->message : '' }}</textarea>
									</div>
								</div>
							</div>

							<input type="hidden" name="status" value="2" />
							<button type="submit" class="submitBtn">يُقدِّم</button>
							<button type="reset" onclick="qualityshowpolicy()" class="btn btn-secondary submitBtn" style="margin-right:7px;">يلغي</button>
						</form>
					</div>
				</div>

				<div class="procedure_div text-right">
				    <p>لكل دولة أنظمتها وقوانينها الخاصة المعنية بالتشريعات البيئية داخل مكان العمل. ويتعيّن على صاحب العمل وموظفيه الالتزام بهذه التشريعات. ويجب أن تحرص الشركة على التأكد من درايتهم وفهمهم لمسؤولياتهم والتحقق بانتظام من التحديثات والتغييرات.</p>
				    <p>{{ $companyName}} يعمل على تطوير واحترام اتباع إجراءات من شأنها تحديد ودعم عمليات الحد من التأثيرات السلبية على البيئة، وتحديد الضوابط ثم تنفيذها. تتم مراجعة هذه الضوابط ومراقبتها بشكل منتظم. وتتخذ الشركة جميع الخطوات المعقولة لتقليص مدى التأثيرات البيئية داخل مكان العمل، وتقديم التوجيه بشأن التدابير التي ينبغي تطبيقها ضمن التسلسل الهرمي للرقابة.</p>
					<p><b><span class="authName">{{ $companyName}}</span></b> يكون بالإجراء المستمر لعمليات المراقبة وتحسين الأداء البيئي للشركة. وسيتم قياس مدى تأثيرها على البيئة بانتظام وتحديد الأهداف لضمان التحسين المستمر. </p>
					<p>تتمثل سياسة <b><span class="authName">{{ $companyName}}</span></b> في:</p>
					<ol>
						<li class="list-items-ar">السعي جاهدًا لمنع التلوث في عملياتها ومرافقها.</li>
						<li class="list-items-ar">الالتزام بجميع التشريعات الحالية ذات الصلة بالقضايا البيئية.</li>
						<li class="list-items-ar">تشجيع مورّدي الشركة على اعتماد مبادئ مماثلة حيثما أمكن ذلك.</li>
						<li class="list-items-ar">تحديد ومراقبة ومراجعة الأداء البيئي والأهداف والغايات.</li>
						<li class="list-items-ar">التأكد من فهم موظفي الشركة لمدى أهمية حماية البيئة وحشد دعمهم لرفع مستوى التوعية، والسعي لتحسين أداء الشركة.</li>
						<li class="list-items-ar">التحسين المستمر للأداء البيئي للشركة.</li>
						<li class="list-items-ar">الترويج بنشاط لإعادة التدوير داخل الشركة ومورديها حيثما أمكن ذلك.</li>
						<li class="list-items-ar">السعي إلى تقليل الانبعاثات الضارة لأسطولها واستخدام الطاقة.</li>
						<li class="list-items-ar">تقليل الهدر عبر التقييم الدوري للعمليات والكفاءة.</li>
						<li class="list-items-ar">الحصول على مجموعة منتجات أو خدمات توريد من شأنها تقليل التأثير البيئي لتوزيع الشركة وإنتاجها.</li>
					</ol>
					<h5 class="mt-3">سياسات إضافية: </h5>
					@if ($previousPolicy)
					<pre style="font-size: 13px;color: #040404 !important;font-family: inherit;font-weight: normal; white-space: pre-wrap; overflow:hidden; margin-right: 25px;">{{ $previousPolicy->message }}</pre>
					@endif  
					<div style="margin-right: 25px;">
						<p>بالنيابة عن:  <b><span class="authName">{{ $companyName}}</span></b></p>
						<p>الاسم: <span class="authName">{{Auth::user()->director}}</span> </p>
						<p>التاريخ: {{$date}}</p>
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
				<h5 class="modal-title" id="exampleModalLabel">Deleting Requirements Due</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure?Do you really want to delete this?.</p>
			</div>
			<div class="modal-footer">
				<form action="" method="POST">
				@csrf
				@method('DELETE')
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-danger">Yes</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- end:: Content -->