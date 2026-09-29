@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>السياسة البيئية</h2>
        </div>
        <div>
            <button type="button" onclick="qualityshowpolicy()" class="am-btn am-btn-primary"><i class="fa fa-plus"></i> إضافة السياسة البيئية</button>
        </div>
    </div>

    <?php
        $companyName=Auth::user()->company_name;
    ?>

    {{-- Add Policy Form Card --}}
    <div class="am-card quality_add_div" style="display:none;">
        <div class="am-card__body am-form">
            <h6 class="dash-section-title">إضافة السياسة البيئية</h6>
            <form action="{{ route('environment_policy') }}" id="addcust" method="post">
                @csrf
                <div class="mb-3">
                    <label>يرجى إدخال سياسات بيئية إضافية خاصة ببيئة عملك وأنشطة شركتك </label>
                    <textarea name="message" class="form-control mt-2" placeholder="تعيين الحد الأقصى لعدد الأحرف التي يمكن إدخالها إلى 10000."></textarea>
                    @error('message')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status" value="2" />
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> يُقدِّم</button>
                <button type="reset" onclick="qualityshowpolicy()" class="am-btn am-btn-outline" style="margin-right:7px;">يلغي</button>
            </form>
        </div>
    </div>

    {{-- Policy Content Card --}}
    <div class="am-card">
        <div class="am-card__body" style="padding:32px; line-height:1.8;">
            <p>لكل دولة أنظمتها وقوانينها الخاصة المعنية بالتشريعات البيئية داخل مكان العمل. ويتعيّن على صاحب العمل وموظفيه الالتزام بهذه التشريعات. ويجب أن تحرص الشركة على التأكد من درايتهم وفهمهم لمسؤولياتهم والتحقق بانتظام من التحديثات والتغييرات.</p>
            <p>{{ $companyName }} يعمل على تطوير واحترام اتباع إجراءات من شأنها تحديد ودعم عمليات الحد من التأثيرات السلبية على البيئة، وتحديد الضوابط ثم تنفيذها. تتم مراجعة هذه الضوابط ومراقبتها بشكل منتظم. وتتخذ الشركة جميع الخطوات المعقولة لتقليص مدى التأثيرات البيئية داخل مكان العمل، وتقديم التوجيه بشأن التدابير التي ينبغي تطبيقها ضمن التسلسل الهرمي للرقابة.</p>
            <p>{{ $companyName }} يكون بالإجراء المستمر لعمليات المراقبة وتحسين الأداء البيئي للشركة. وسيتم قياس مدى تأثيرها على البيئة بانتظام وتحديد الأهداف لضمان التحسين المستمر. </p>
            <p>تتمثل سياسة {{ $companyName }} في:</p>
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

            <h6 class="mt-4" style="color:var(--am-primary);font-weight:600;">سياسات إضافية:</h6>
            @forelse ($userAddPolicy as $policy)
                <div style="{{ $loop->first ? '' : 'border-top:1px solid #e6e8f0;margin-top:16px;' }}padding-top:{{ $loop->first ? '4' : '16' }}px;">
                    <p class="mb-2" style="white-space:pre-wrap;">{{ $policy->message }}</p>
                    <div style="line-height:1.5;">
                        <div><strong style="font-weight:600;">بالنيابة عن:</strong>  {{ $companyName }}</div>
                        <div><strong style="font-weight:600;">الاسم:</strong> {{ Auth::user()->director }}</div>
                        <div><strong style="font-weight:600;">التاريخ:</strong> {{ $policy->created_at->format('d/m/Y g:i') }} {{ $policy->created_at->format('A') === 'AM' ? 'ص' : 'م' }}</div>
                    </div>
                </div>
            @empty
                <div style="margin-right: 25px; line-height:1.5;">
                    <div><strong style="font-weight:600;">بالنيابة عن:</strong>  {{ $companyName }}</div>
                    <div><strong style="font-weight:600;">الاسم:</strong> {{ Auth::user()->director }}</div>
                </div>
            @endforelse
        </div>
    </div>

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
