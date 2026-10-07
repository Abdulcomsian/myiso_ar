@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>سياسة الصحة والسلامة</h2>
        </div>
        <div>
            <button type="button" onclick="qualityshowpolicy()" class="am-btn am-btn-primary"><i class="fa fa-plus"></i> إضافة سياسة الصحة والسلامة</button>
        </div>
    </div>

    <?php
        $companyName=Auth::user()->company_name;

    ?>

    {{-- Add Policy Form Card --}}
    <div class="am-card quality_add_div" style="display:none;">
        <div class="am-card__body am-form">
            <h6 class="dash-section-title">إضافة سياسة الصحة والسلامة</h6>
            <form action="{{ route('health_policy') }}" id="addcust" method="post">
                @csrf
                <div class="mb-3">
                    <label>يرجى إدخال مزيد من سياسات الصحة والسلامة الخاصة ببيئة عملك وأنشطة شركتك </label>
                    <textarea name="message" class="form-control mt-2" placeholder="تعيين الحد الأقصى لعدد الأحرف التي يمكن إدخالها إلى 10000."></textarea>
                    @error('message')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="status" value="3" />
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> يُقدِّم</button>
                <button type="reset" onclick="qualityshowpolicy()" class="am-btn am-btn-outline" style="margin-right:7px;">يلغي</button>
            </form>
        </div>
    </div>

    {{-- Policy Content Card --}}
    <div class="am-card">
        <div class="am-card__body" style="padding:32px; line-height:1.8;">
            <p>لكل دولة أنظمتها وقوانينها الخاصة المعنية بالصحة والسلامة في العمل، والتي يجب على الموظفين وصاحب العمل الالتزام بها. يتعيّن على الشركة التأكد من درايتهم وفهمهم لمسؤولياتهم، والتحقق بانتظام من التحديثات والتغييرات.</p>
            <p>{{ $companyName }}  على تطوير واحترام اتباع إجراءات من شأنها تحديد المخاطر وتقييمها، وتحديد الضوابط ثم تنفيذها. وستجري مراجعة هذه الضوابط ومراقبتها بشكل منتظم؛ وستتخذ الشركة جميع الخطوات المعقولة للحد من المخاطر داخل مكان العمل، مع تقديم التوجيهات بشأن التدابير التي ينبغي تطبيقها ضمن التسلسل الهرمي للرقابة. عند تعذّر إزالة المخاطر، ستتخذ الشركة الخطوات اللازمة لضمان إزالة المخاطر الصحية أو مخاطر الإصابة، أو الحد منها.</p>
            <p class="mt-4">واجبات أصحاب العمل:</p>
            <p>يجب على أصحاب العمل بذل أقصى جهد ممكن عمليًا لضمان معايير الصحة والسلامة والرفاهية في العمل لجميع الموظفين وغير الموظفين. يجب على أصحاب العمل إجراء التقييمات المناسبة والكافية للمخاطر المهدِّدة لصحة وسلامة الموظفين في العمل وغير الموظفين ممن يتأثرون بالأعمال التجارية. ينبغي أن يحدد التقييم التدابير الواجب اتخاذها للامتثال للأحكام القانونية؛ ويجب أن يتضمن الأنشطة الروتينية وغير الروتينية، ويتعيّن مراجعته في حال إجراء أي تعديلات كبيرة، أو عند الاعتقاد بأنه لم يعد صالحًا.</p>
            <p>بالإضافة إلى ذلك، يجب أن يضمن أصحاب تنفيذ التدابير الوقائية والحمائية واتخاذ الترتيبات اللازمة لتنظيم أعمال التخطيط الفعال والرقابة والرصد ومراجعة التدابير الوقائية والحمائية المقدمة.</p>
            <p>من واجب صاحب العمل تزويد الموظفين بمعلومات شاملة وذات صلة بالمخاطر المهدِّدة لصحتهم وسلامتهم والتي حددها التقييم وتدابير الوقاية والحماية المقدمة.</p>
            <h6 class="mt-4" style="color:var(--am-primary);font-weight:600;">واجبات الموظفين:</h6>
            <p>يقع على عاتق الموظفين واجب العناية المعقولة بصحتهم وسلامتهم وصحة الأشخاص الآخرين الذين قد يتأثرون بعملهم أو تصرفاتهم. ويتحتّم عليهم التعاون مع صاحب العمل امتثالًا لالتزاماتهم المتعلقة بالصحة والسلامة بموجب لوائح الصحة والسلامة في العمل ذات الصلة في بلدهم.</p>
            <p>تقع على عاتق الموظف مسؤولية ضمان الاستخدام الصحيح للآلات أو المعدات أو وسائل الإنتاج أو أجهزة السلامة التي يوفرها صاحب العمل وفقًا لأي تعليمات أو تدريب أو توجيهات يتم تلقيها بموجب اللوائح ذات الصلة.</p>
            <h6 class="mt-4" style="color:var(--am-primary);font-weight:600;">سياسات إضافية — الغاية:</h6>
            <p>تحدد هذه الوثيقة السياسة والممارسات التي سيتم اعتمادها ضمانًا لإجراء تقييمات مناسبة وكافية للمخاطر وفقًا لمتطلبات الأنظمة المعمول بها ذات الصلة. وتصف الوثيقة نظام إجراء تقييمات المخاطر العامة في {{ $companyName }} في إطار برنامج إدارة السلامة والصحة والبيئة. لا يشمل هذا الإجراء تقييمات المخاطر التي جرت في إطار مراقبة المعادن الخطرة والمواد الكيميائية والمواد الأخرى، أو التعامل معها، أو استخدام شاشات العرض والإجراءات المتكررة.</p>
            @forelse ($userAddPolicy as $policy)
                <div style="{{ $loop->first ? '' : 'border-top:1px solid #e6e8f0;margin-top:16px;' }}padding-top:{{ $loop->first ? '4' : '16' }}px;">
                    <p class="mb-2" style="white-space:pre-wrap;">{{ $policy->message }}</p>
                    <div style="line-height:1.5;">
                        <div><strong style="font-weight:600;">تمت الإضافة بواسطة:</strong> {{ $companyName }}</div>
                        <div><strong style="font-weight:600;">الاسم:</strong> {{ Auth::user()->director }}</div>
                        <div><strong style="font-weight:600;">التاريخ:</strong> {{ $policy->created_at->format('d/m/Y g:i') }} {{ $policy->created_at->format('A') === 'AM' ? 'ص' : 'م' }}</div>
                    </div>
                </div>
            @empty
                <div style="line-height:1.5;">
                    <div><strong style="font-weight:600;">تمت الإضافة بواسطة:</strong> {{ $companyName }}</div>
                    <div><strong style="font-weight:600;">الاسم:</strong> {{ Auth::user()->director }}</div>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
