@extends('dashboard.layouts.app')

@section('content')
    <style>
        .list_div .list_number {
            /*width: auto;*/
            max-width: 6.8%;
        }

        .authName {
            font-weight: 500 !important;
        }

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
                <h2>كتيب الجودة</h2>
            </div>
        </div>
        <section id="procedure_section">
            <?php
            $companyName = Auth::user()->company_name;
            
            ?>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="procedure_div">
                        <h4>1. النطاق</h4>
                        <p>يتمثل الهدف من دليل الجودة هذا في تحديد نظام إدارة الجودة المطبّق على الأنشطة التي تؤديها
                            <b><span class="authName">{{ Auth::user()->company_name }}</span></b> وفقًا لمتطلبات شهادة
                            الأيزو: (ISO 9001:2015).</p>
                        <h4 class="m-t-20">2. المراجع المعيارية</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>2.1 -</p>
                                <p>2.1.1 -</p>
                                <p>2.1.2 -</p>
                                <p>2.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">تشير هذه الوثيقة إلى ما يلي:</p>
                                <p style="028px;"> الإجراءات</p>
                                <p style="025px;"> العمليات</p>
                                <p style="025px;">النماذج والسجلات</p>
                            </div>
                        </div>
                        <h4 class="m-t-20">3. المصطلحات والتعاريف</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="033px;">اتباع الشروط والأحكام المفصلة في شهادة الآيزو القياسية (ISO9001:2015).</p>
                            </div>
                        </div>
                        <h4 class="m-t-20">4. سياق المنظمة</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="033px;">فهم المنظمة وسياقها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="025px;">يستعرض هذا الدليل المتطلبات السياسية والإجرائية لنظام إدارة الجودة في
                                    <b><span class="authName">{{ Auth::user()->company_name }}</span></b>. يستوجب فهم السياق
                                    الخارجيّ مراعاة القضايا الناشئة عن البيئات القانونية والتكنولوجية والتنافسية والسوقية
                                    والثقافية والاجتماعية والاقتصادية، سواء كانت دولية أو وطنية أو إقليمية أو محلية. وفيما
                                    يخصّ فهم السياق الداخلي، يتم التركيز على القضايا المعنية بالقيم والثقافة والمعرفة
                                    والأداء في المنظمة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="021px;"><b><span class="authName">{{ Auth::user()->Company_overview }}</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">فهم احتياجات الأطراف المعنية وتوقعاتها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;"> انظر <a href="{{ url('/quality_policy') }}">سياسة الجودة</a></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;"> تأخذ <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> بعين الاعتبار أن
                                    الأطراف المعنية تشمل العملاء والالتزامات القانونية والموظفين والمقاولين والموردين
                                    والمنطقة المحيطة بالشركة. الشركة. كما تشمل قائمة الأطراف المعنية الجهات المتأثرة
                                    بالقانون العام لحماية البيانات. ويمكن توثيق احتياجاتهم وتوقعاتهم بشكل أكبر <a
                                        href="{{ url('interesting_parties') }}">هنا</a>.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">تحديد نطاق نظام إدارة الجودة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">يتناول نطاق نظام الجودة المحدد في هذا الدليل جميع الأنشطة التي تتطلبها
                                    شهادة الآيزو (ISO 9001:2015) وفقًا للنطاق المفصّل في البند 2.1.4، مع استثناء الجوانب
                                    المذكورة في الفقرة 3.3.4. وتتضمن حدود هذا النظام الإداري الموقع الكامل للشركة، وجميع
                                    الموظفين والمقاولين، والأنشطة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">نطاق <b><span class="authName">{{ Auth::user()->company_name }}</span></b>
                                    يتمثل في "{{ Auth::user()->scope }}"</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.3.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="016px;">تخفيض النطاق</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.3.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;">بنود نظام الجودة غير القابلة للتطبيق: المواصفات (ISO 9001) القسم 3.8،
                                    تصميم وتطوير المنتجات والخدمات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="
									07px;
								">4.3.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;"> يمكن تطبيق هذه الاستثناءات نظرًا لعدم ارتباطها بأنشطة <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> أو نطاق التسجيل
                                    المطلوب. لا يؤثر عدم القيام بهذا العنصر على المنتج أو الخدمة المقدمة للعملاء.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">نظام إدارة الجودة وعملياته.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.4.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;"> تستخدم <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> العمليات التالية،
                                    وتحددها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.4.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;"><a href="{{ url('sale_processes') }}"> سياسة الجودة 1 – عمليات البيع</a>
                                </p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.4.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;"><a href="{{ url('purchasing_processes') }}">سياسة الجودة 2 – عمليات
                                        الشراء</a></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.4.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;"><a href="{{ url('servicing_contract') }}">سياسة الجودة 3 – خدمات العقود
                                </p></a>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>4.4.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;"><a href="{{ url('competency_process') }}"> سياسة الجودة 4 – عمليات
                                        الكفاءة</a></p>
                            </div>
                        </div>
                        <h4 class="m-t-20">5. القيادة</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">القيادة والالتزام</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="023px;">متطلبات عامة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.1.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="015px;">تلتزم <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> بسياسة التحسين
                                    المستمر لمختلف جوانب عملياتها التجارية، مع التنفيذ الفعال والتحسين المستمر لنظامنا
                                    المعني بإدارة الجودة للارتقاء بسوية رضا العملاء والقيمة المضافة للأعمال. ستحرص الإدارة
                                    على إدراك الجميع في المنظمة لمدى أهمية تلبية احتياجات العملاء والمتطلبات التنظيمية
                                    والقانونية.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="021px;">التركيز على العميل</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.1.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="015px;">يدرك الجميع الأهمية القصوى التي ينبغي إيلاؤها لاحتياجات العميل وتوقعاته،
                                    وسيتم تحديدها بالكامل ضمانًا لتلبيتها والارتقاء بسوية ما نقدمه لعملائنا من جودة وخدمات
                                    وقيمة. يتحقق ذلك عبر الإدارة العليا من خلال ملاحظات العملاء بعد الانتهاء من تسليم
                                    المنتج.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;"><a href="{{ url('/quality_policy') }}">سياسة الجودة.</a></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="021px;">تلتزم إدارة <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> بمواصلة تقديم
                                    منتجات وخدمات تفوق احتياجات عملائنا وتوقعاتهم من حيث الجودة والقيمة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="019px;">سيتم استعراض <a href="{{ url('/quality_policy') }}">سياسة الجودة</a>
                                    بالتفصيل في<a href="{{ url('/quality_policy') }}">إدارة الجودة 102 </a> – <a
                                        href="{{ url('/quality_policy') }}">سياسة الجودة.</a>.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">الأدوار والمسؤوليات والسلطات التنظيمية.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">يحدد المخطط التنظيمي للإدارة الهيكل التنظيمي وعلاقات إعداد التقارير.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">تحدد الأوصاف الوظيفية الموثقة المسؤوليات والسلطات المحددة وعلاقات إعداد
                                    التقارير، ويتم الرجوع إليها أيضًا ضمن الإجراءات والتعليمات الموثقة وغيرها على النحو
                                    المطلوب</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>5.3.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="019px;"> يتحمل الممثل الإداري {{ Auth::user()->director }} مسؤولية ضمان إنشاء
                                    عمليات نظام إدارة الجودة وتنفيذها والحفاظ عليها، وإعداد التقارير عن مدى فعالية نظام
                                    الجودة، والتوعية بمتطلبات العملاء في مختلف مستويات المنظمة.</p>
                            </div>
                        </div>
                        <h4 class="m-t-20">6. التخطيط</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="032px;">إجراءات التعامل مع المخاطر والفرص.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="024px;"> يتم تنفيذ أشكال مختلفة لتخطيط الجودة، من بينها:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="017px;"> تحديد الموظفين المطلوبين وإسناد المهام لهم.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="015px;">تحديد المهارات المطلوبة والدورات التدريبية ذات الصلة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="015px;">تحديد أنشطة الاختبار والفحص و/أو التحقق المطلوبة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="015px;">تحديد السجلات المطلوبة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.1.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">- سيتم تقييم القدرة على تلبية توقعات العميل من حيث الجودة والتسليم
                                    والتكلفة عند مراجعة العقد.</p>
                                <p style="014px;">عند التخطيط لعملية قد تؤثر على التشغيل، تتم مراعاة التغيير ضمانًا لعدم
                                    المساس بسلامة العملية. وتتم مراجعة تأثير التغيير الرئيسي المعروف مسبقًا خلال اجتماعات
                                    مراجعة إدارة الجودة.</p>
                            </div>
                        </div>

                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;"> في إطار سياستنا للتحسين المستمر، وضعت <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> إجراءات موثقة
                                    لتوفير مراجعة وتحليل للمعلومات المستمدة من عمليات نظام إدارة الجودة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="021px;"> ستستخدم هذه المعلومات لتحديد مصادر عدم المطابقة المحتملة. وعند الضرورة،
                                    سيتم تحديد الحاجة إلى اتخاذ الإجراءات المناسبة وتنفيذها بفعالية. سيتم تسجيل جميع
                                    الإجراءات المتخذة لتشكل جزءًا من جدول أعمال مراجعة الإدارة وفقًا <a
                                        href="{{ url('/management_review') }}" target="blank">للسياسة 3.</a>.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">أهداف الجودة والتخطيط لتحقيقها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="021px;">جرى وضع أهداف جودة قابلة للقياس لجميع الوظائف ذات الصلة في المنظمة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="017px;">يجب تحديد الهدف خلال اجتماع مراجعة الإدارة على النحو المحدد في <a
                                        href="{{ url('/management_review') }}" target="blank">السياسة 3.</a>.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.2.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="019px;">تحقيقًا لتلك الأهداف المحددة خلال <a
                                        href="{{ url('/management_review') }}" target="blank">السياسة 3</a>, يتحمل المدير
                                    العام {{ Auth::user()->director }} مسؤولية تحقيق الأهداف المنصوص عليها في اجتماع مراجعة
                                    الإدارة. سيتم تحديد الهدف وموعد تحقيق كل هدف في اجتماع مراجعة الإدارة. من الناحية
                                    الافتراضية، يجب أن يكون التاريخ المستهدف لتحقيق الهدف بحلول الاجتماع التالي لمراجعة
                                    الإدارة.</p>
                            </div>

                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">التخطيط للتغييرات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">يتم تنفيذ أشكال مختلفة لتخطيط الجودة، من بينها:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.3.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;"> تحديد الموظفين المطلوبين، وإسناد المهام لهم.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.3.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="013px;">تحديد المهارات المطلوبة والدورات التدريبية ذات الصلة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.3.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;">تحديد أنشطة الاختبار والفحص و/أو التحقق المطلوبة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>6.3.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;">تحديد السجلات المطلوبة.</p>
                            </div>
                        </div>




                        <h4 class="m-t-20">7. الدعم</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="030px;">الموارد.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="025px;">- تضمن إدارة <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> تحديد الموارد
                                    المطلوبة وإتاحتها، من أجل ضمان التشغيل الفعال لنظام إدارة الجودة وتحقيق رضا العملاء
                                    وتعزيزه.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="024px;">سيكون جميع الموظفين مؤهلين بشكل مناسب لأداء المهام الموكلة إليهم، مع
                                    إجراء مراجعة سنوية لأهدافهم، بما فيها مراجعات التدريب. تحرص عملية التقييم والموضوعية على
                                    مواصلة التزام الموظفين للقيم، وهي:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">تحقيق الحد الأقصى من قدرة الموظفين على التسويق والإنجاز.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="011px;">النمو بشكل مربح.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.2.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="011px;">السعي الجاهد لتحقيق نجاح العملاء.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.2.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;">تقديم مستوى متميز من الكفاءة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.2.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;"> المراجع متاحة في القسمين 2.7 و3.7.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">البنية التحتية.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">تلتزم <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> بضمان وجود بنية
                                    تحتية مناسبة من حيث المباني؛ يتم تحديد المرافق والمعدات والحصول عليها وصيانتها بشكل
                                    مناسب.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">بيئة تشغيل العمليات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.4.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">تضمن إدارة <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> تحديد جميع جوانب
                                    بيئة العمل المؤثرة على توافق المنتج، وإدارتها بفعالية في جميع الأوقات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">مراقبة الموارد وقياسها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.5.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">ينبغي أن تحرص <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> على إجراء معايرة
                                    سنوية لأداة الاستقصاء المستخدمة وتسجيل تفاصيل المعايرة؛ وفي حال فشلت أداة الاستقصاء في
                                    معايرتها، سيتم تسجيل ذلك في وثائق اختبار المعايرة، ولفت انتباه مدير العمليات للحالة
                                    ريثما تتخذ الإدارة قرارًا بشأن مدى جاهزية الأداة لاستخدامها، وتحديد أي إجراءات يمكن
                                    اتخاذها في هذه الحال.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">المعرفة المؤسسية</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.1.6.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">ينبغي اعتبار التدريب جزءًا رئيسيًا من النمو والنجاح المستمر لشركة
                                    <b><span class="authName">{{ Auth::user()->company_name }}</span></b>. وقد حددت
                                    المنظمة الخطوات المطلوبة من الموظفين للحفاظ على توقعات أعمال مُرضِية. تمتلك المنظمة
                                    موظفين في المجالات الرئيسية للإنتاج والصيانة والإدارة، ممن يمتلكون القدرة على الاتصال
                                    بحرفية مع العملاء والموردين. ينبغي أن تمتلك الإدارة القدرة على تحقيق مستويات عمل مرضية
                                    ومقبولة لقاعدة عملائها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="030px;">الكفاءة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">سيتم تحديد المهارات أو المؤهلات أو الخبرات أو غيرها من معايير الكفاءة
                                    المطلوب توفرها لدى الموظفين الذين يقدمون جودة تؤثر على العمل؛ وسيتم توفير دورات التدريب،
                                    عند الاقتضاء، لضمان تلبية هذه الاحتياجات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">يتم تقييم مدى فعالية الدورات التدريبية المقدمة ضمانًا لتحقيق أهداف
                                    التدريب على النحو المشار إليه في البند 2.1.7.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">الوعي.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">يحرص الكادر الإداري في الشركة على تعريف جميع الموظفين بأهمية وملاءمة
                                    أنشطتهم وتأثيرها على الجودة ورضا العملاء عبر استخدام بيانات المنهجية.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">يتم الاحتفاظ بسجلات المهارات والمؤهلات والخبرة والتدريب المقدم، فضلًا عن
                                    سجل دوران الموظفين.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">الاتصالات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.4.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">ستعتمد <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> على طرائق اتصال
                                    مناسبة لضمان إرسال جميع المعلومات المعنية بأداء نظام إدارة الجودة إلى الموظفين ذوي الصلة
                                    والأطراف المعنية الخارجية؛ ويشمل ذلك اجتماعات المراجعة المطلوبة. يعتبر
                                    {{ Auth::user()->director }} الشخص المسؤول عن جميع الاتصالات الداخلية والخارجية.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">المعلومات الموثقة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.5.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;"> تتحكم <a href="{{ url('/documented_information') }}"
                                        target="blank">السياسة 1 </a>. بضبط المعلومات العامة الموثقة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.5.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;"> تتولى <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> تشغيل نظام إدارة
                                    الجودة استنادًا إلى متطلبات شهادة الآيزو (ISO 9001:2015)، والتي تم تنظيمها على النحو
                                    المفصل أدناه:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="04px;">7.5.1.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="07px;"><a href="{{ url('/quality_policy') }}"> سياسة الجودة.</a> - <a
                                        href="{{ url('/quality_policy') }}">سياسة الجودة.</a></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="07px;">7.5.1.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">أهداف الجودة - <a href="{{ url('/management_review') }}">مراجعة
                                        الإدارة</a></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="px;">7.5.1.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">دليل الجودة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="08px;">7.5.1.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="05px;">إجراءات تشغيل نظام الجودة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="07px;">7.5.1.1.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="05px;">وثائق تخطيط العمليات والتشغيل والرقابة / المخططات الانسيابية (بما فيها
                                    تلك ذات المنشأ الخارجي)</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="07px;">7.5.1.1.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="05px;">نماذج وسجلات الجودة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.5.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="017px;">الإنشاء والتحديث</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="08px;">7.5.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">تخضع جميع المستندات التي تشكل جزءًا من نظام إدارة الجودة لإجراءات موثقة
                                    ضمانًا لما يلي:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="08px;">7.5.2.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">توافق السلطات المختصة على المستندات قبل إصدارها</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="010px;">7.5.2.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">تتوفر فقط الإصدارات غير الخاضعة للرقابة من المستندات في المواقع المحددة
                                </p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="010px;">7.5.2.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">تتم إزالة المستندات القديمة من جميع نقاط الاستخدام</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="010px;">7.5.2.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">يتم تحديد المستندات القديمة المطلوبة للأغراض التاريخية بشكل مناسب</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="011px;">7.5.2.1.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">يتم تعريف كل وثيقة بشكل فريد</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="011px;">7.5.2.1.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">يحتفظ مندوب الجودة بالسجلات الرئيسية للمستندات خارج هذا النظام.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="011px;">7.5.2.1.7 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">تخضع المستندات للمراجعة والتحديث وإعادة الموافقة، حسب الضرورة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="011px;">7.5.2.1.8 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">يجب مراقبة الوثائق الأساسية ذات الطبيعة الخارجية وتكون من أحدث إصدار</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.5.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">الرقابة على المعلومات الموثقة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>7.5.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="011px;">يتم الاحتفاظ بسجلات الجودة لتوفير دليل موضوعي على التوافق مع المتطلبات
                                    المحددة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="
    09px;
">7.5.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">تحدد الإجراءات الموثقة الطريقة والمسؤوليات للاحتفاظ بسجلات الجودة التي تم
                                    إنشاؤها داخل نظام الجودة وتخزينها ضمانًا لسهولة قراءة هذه السجلات وحفظها ومن ثم
                                    استرجاعها وتخزينها في بيئة مناسبة منعًا لضياعها أو تلفها (بما في ذلك السجلات المخزنة على
                                    الوسائط الإلكترونية). تكون فترة الاحتفاظ بسجلات الجودة على النحو المحدد في وثائق الجودة
                                    المعمول بها.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="
    09px;
">7.5.3.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">- حيثما يتم تحديد ذلك تعاقديًا، تتم إتاحة سجلات الجودة للمراجعة من قبل
                                    ممثل العميل، ويتم الاحتفاظ بها لفترة متفق عليها وفقًا<a
                                        href="{{ url('/documented_information') }}" target="blank">وفقًا للسياسة 1</a>.
                                </p>
                            </div>
                        </div>


                        <h4 class="m-t-20">8. التشغيل</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">الرقابة والتخطيط التشغيلي</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">سيتم تطوير وتخطيط جميع العمليات المتعلقة بتوفير منتجاتنا. وستشمل هذه
                                    الخطط، حسب الاقتضاء: </p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;"> تحديد أهداف المنتج ومتطلباته</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">توفير العمليات والوثائق والموارد المطلوبة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">أنشطة التحقق والمصادقة والتفتيش والاختبار المطلوبة، بما فيها معايير
                                    القبول</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="011px;">السجلات المطلوبة لإثبات المطابقة مع المتطلبات المحددة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.1.1.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">عندما يكون ذلك مطلوبًا تعاقديًا، بالنسبة لمنتج معين، قد تتم الإشارة إلى
                                    خطط تحقيق المنتج باسم خطط الجودة، ويتم تقديمها بتنسيق متفق عليه مع العميل المعني.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">متطلبات المنتجات والخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">التواصل مع العميل</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">جميع نقاط الاتصال والتواصل مع عملائنا فيما يخص الاستفسارات المعنية
                                    بالمبيعات والطلبات وتعليقات العملاء، محددة بوضوح على موقعنا الإلكتروني.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">تحديد المتطلبات المتعلقة بالمنتجات والخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">بعد الاستفسار أو طلب المبيعات، يتم تحديد متطلبات العميل بما فيها، حسب
                                    الاقتضاء:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="09px;">8.2.2.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">المتطلبات التي يحددها العميل ومن بينها أنشطة التسليم.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="010px;">8.2.2.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">المتطلبات التي لم يحددها العميل، ولكنها مطلوبة للاستخدام المعروف أو
                                    المقصود.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="011px;">8.2.2.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">- أي متطلبات قانونية أو تنظيمية تتعلق بالمنتج.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="012px;">8.2.2.1.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;"> المتطلبات الإضافية التي تحددها <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="017px;">مراجعة المتطلبات المتعلقة بالمنتجات والخدمات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.2.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="09px;">تتم مراجعة جميع استفسارات وطلبات العملاء للتأكد من امتلاك <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> للقدرة على تلبية
                                    متطلبات العميل المحددة فيما يخص الجودة والتسليم والتكلفة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="
    07px;
">8.2.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="013px;">يتم إجراء المراجعة بناءً على المنتج المطلوب، ومدى شبهه بالمنتجات
                                    المستخدمة سابقًا، مع الحرص على:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="010px;">8.2.3.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">التحديد المناسب لمتطلبات المنتج.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="012px;">8.2.3.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">امتلاك <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> للقدرة على تلبية
                                    هذه المتطلبات.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="012px;">8.2.3.2.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">حل أي خلافات أو غموض ينشأ مع العميل.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="013px;">8.2.3.2.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">- إرسال جميع المعلومات المعنية إلى الموظفين المسؤولين عن التنفيذ.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="013px;">8.2.3.2.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">تأكيد المتطلبات الشفهية قبل الموافقة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="013px;">8.2.3.2.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">تحديد جميع التغييرات في المتطلبات المتعاقد عليها وتوثيقها وإبلاغها إلى
                                    الموظفين المعنيين للتنفيذ.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">تصميم وتطوير المنتجات والخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">تم استبعاد هذا القسم.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">ضبط المنتجات والخدمات المقدمة خارجيًا</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">متطلبات عامة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="013px;"> تتمثل سياسة <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> في الحرص على قدرة
                                    جميع المنتجات المشتراة من الموردين على تلبية المتطلبات المحددة. وبناءً عليه، يتم تأهيل
                                    الموردين وفقًا لمعايير محددة، حيث تعتمد طبيعة ومدى التأهيل الذي يتم إجراؤه على مدى أهمية
                                    المنتج الذي سيتم تقديمه. يجب الاحتفاظ بسجلات الموردين "المعتمدين". انظر <a
                                        href="{{ url('/purchasing_processes') }}">سياسة الجودة 2.</a></p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">نوع ومدى الرقابة على التقديم الخارجي</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="013px;">يتم التحقق من المنتجات المشتراة عند استلامها وفقًا للترتيبات المخطط لها.
                                    ويعتمد مستوى وطبيعة التفتيش على مدى أهمية المنتج المعني، والقدرة المثبتة للمورد، بما في
                                    ذلك ترتيبات نظام الجودة، والأداء السابق، والأدلة الموثقة للامتثال. يجب توثيق التحقق من
                                    المواد والمنتجات في مقر المورد عبر <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> بشكل واضح ضمن
                                    وثائق الشراء المرتبطة، ويتم الاتفاق عليها مع المورد المعني.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">معلومات لمقدمي الخدمات الخارجيين</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">يجب مراجعة أداء الموردين وتسجيله بشكل دوري، وفقًا للإجراءات الموثقة. ويجب
                                    استخدام نتائج هذه المراجعات لتحديث سجلات الموردين "المعتمدين".</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">يجب تحديد وتوثيق جميع متطلبات الشراء (وأي تعديلات لاحقة) بشكل واضح، وتخضع
                                    للمراجعة والموافقة قبل الإصدار.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">تتضمن متطلبات الشراء جميع المعلومات ذات الصلة المتعلقة بالمنتج، وستشمل -
                                    حسب الاقتضاء:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">معايير الموافقة على المنتجات/الإجراءات/العمليات والمعدات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="margin-left: 14-px;">تأهيل الموظفين والموافقة عليهم</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.4.3.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">متطلبات نظام إدارة الجودة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="029px;">الإنتاج وتقديم الخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="022px;">ضبط الإنتاج وتقديم الخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="014px;">يتم تخطيط جميع العمليات المرتبطة بتوفير منتجاتنا وتشغيلها في ظل ظروف
                                    خاضعة للرقابة عبر نظام ملفات الموقع وبيانات المنهجية، بما في ذلك:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="05px;">8.5.1.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="017px;">مدى توفر المعلومات ذات الصلة التي تصف خواص المنتج المطلوب</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="06px;">8.5.1.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;">توافر واستخدام أجهزة المراقبة والقياس</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p style="06px;">8.5.1.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="06px;">تنفيذ القياس والرصد، بما في ذلك أثناء أنشطة التسليم</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">التحديد والتتبع</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.2.1 -</p>
                            </div>

                            <div class="list_content">
                                <p style="014px;"> يتم تحديد جميع المنتجات بشكل مناسب طوال دورة حياتها داخل <span
                                        style="color: #000;font-weight: 500;">{{ $user->company_name != '' ? $user->company_name : 'Your Company' }}</span>
                                    وأثناء التسليم إلى العميل.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">عندما تكون إمكانية التتبع متطلبًا محددًا، سيتم تعيين رقم تعريف فريد
                                    واستخدامه لتحديد كل منتج. وسيسجّل رقم التعريف هذا في جميع وثائق العملية المتأثرة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">الممتلكات العائدة للعملاء أو مقدمي الخدمات الخارجيين</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="013px;">ستبذل <span
                                        style="color: #000;font-weight: 500;">{{ $user->company_name != '' ? $user->company_name : 'Your Company' }}</span>
                                    جهدها للعناية بممتلكات العميل بما فيها من مواد أو منتجات أو أجهزة أو برامج أو "ملكيات
                                    فكرية"، مع توفير القدر المناسب من الاعتناء والصيانة ومنع أي خسائر أو سوء استخدام أو نشر
                                    غير مصرّح به.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;">فيما يخص الأحداث غير المتوقعة التي يحتمل تعرّض ممتلكات العميل فيها
                                    للخسائر أو التلف أو التدهور، سيتم تحديد ذلك على الفور والإبلاغ عنه رسميًا إلى العميل أو
                                    ممثله.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;"> الحفظ</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.4.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;">ينبغي أن تضمن<b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> تحديد جميع
                                    المنتجات التي يتم تسليمها إلى الموقع ومعالجتها وحمايتها من التلف والتحكم فيها بيئيًا عند
                                    الحاجة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">أنشطة ما بعد التسليم</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.5.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;">يجري تخطيط جميع عمليات ما بعد التسليم المرتبطة بتوفير منتجاتنا وتشغيلها
                                    في ظل ظروف خاضعة للرقابة مع مراعاة المتطلبات القانونية والتنظيمية؛ والعواقب المحتملة غير
                                    المرغوب فيها والمرتبطة بمنتجاتها وخدماتها؛ وطبيعة المنتجات والخدمات واستخدامها وفترة
                                    ديمومتها المقصودة؛ بما في ذلك:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.5.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">مدى توفر المعلومات المعنية التي تصف خواص المنتج المطلوب التي تلبي متطلبات
                                    العميل والتعاقد.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.5.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">توافر واستخدام أجهزة المراقبة والقياس التي تمت معايرتها، والمستخدمة في
                                    أنشطة ما بعد التسليم.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.5.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">تنفيذ مطالبات الضمان المطلوبة والمحددة أثناء أنشطة ما بعد التسليم، وتقييم
                                    ملاحظات العملاء.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">ضبط التغييرات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.5.6.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="012px;"> يجب أن تعمل المنظمة على مراجعة وضبط التغييرات في الإنتاج أو تقديم
                                    الخدمة، وبالقدر اللازم لضمان استمرار التوافق مع المتطلبات. كما ينبغي عليها الاحتفاظ
                                    بالمعلومات الموثقة التي تصف نتائج مراجعة التغييرات، والشخص المخوّل بمنح تصاريح التغيير،
                                    وأي إجراءات ضرورية ناشئة عن المراجعة. يجب توثيق أي تغييرات مطلوبة في مراجعة الإدارة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">إطلاق المنتجات والخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.6.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">يتم تطبيق الضوابط لتوفير مراقبة وقياس خصائص المنتج، في مراحل محددة من
                                    عملية التنفيذ، مع الحفاظ على دليل المطابقة للمتطلبات المحددة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.6.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">عند الحاجة إلى إصدار منتج قبل إكمال أنشطة المراقبة والقياس المحددة، ستتم
                                    الموافقة على هذا الإصدار من قبل الموظفين المعتمدين، بما في ذلك العميل، حيثما ينطبق ذلك،
                                    وتسجيل هذه الموافقة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.6.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;"> يتم التحقق من المنتجات المشتراة عند استلامها وفقًا للترتيبات المخطط لها.
                                    ويعتمد مستوى وطبيعة التفتيش على مدى أهمية المنتج، والقدرة المثبتة للمورد، بما في ذلك
                                    ترتيبات نظام الجودة، والأداء السابق، والأدلة الموثقة عن الامتثال.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.6.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">ينبغي أن تعمد<b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> إلى توثيق عمليات
                                    التحقق من المواد والمنتجات في مقر المورد، وبشكل واضح في وثائق الشراء المرتبطة، ويتم
                                    الاتفاق عليها مع المورد المعني.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.7 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">ضبط عدم مطابقة مخرجات العمليات والمنتجات والخدمات</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.7.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">يتم تحديد أي حالات تمت مواجهتها لمنتج غير مطابق وعزلها لمنع الاستخدام أو
                                    التسليم غير المقصود.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.7.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">يجري موظفون معتمدون المراجعة ويتخلصون من أي منتج غير مطابق وفقًا
                                    للإجراءات الموثقة، وقد تشمل، حسب الاقتضاء:</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.7.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">الإجراءات المتخذة لإزالة عدم المطابقة. تصريح الاستخدام أو الإفراج أو
                                    القبول من قبل الموظفين المعتمدين والعميل (حيثما ينطبق ذلك). الإجراء المتخذ لمنع
                                    الاستخدام أو التطبيق الأصلي المقصود.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.7.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">عند اعتبار أن عدم المطابقة يؤثر على المنتجات المسلّمة بالفعل أو قيد
                                    الاستخدام، ستتخذ التدابير المناسبة لتحديد آثار عدم المطابقة وتنفيذ أي إجراءات تصحيحية
                                    لازمة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>8.7.2.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">سيُحتفظ بسجلات حالات عدم المطابقة وإجراءات التخلص المتخذة وفقًا <a
                                        href="{{ url('/corrective_action') }}">لعملية الجودة 2.</a>.</p>
                            </div>
                        </div>

                        <h4 class="m-t-20">9. تقييم الأداء</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="028px;">المراقبة والقياس والتحليل والتقييم</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">متطلبات عامة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">عملت <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> على تخطيط وتنفيذ
                                    عمليات مراقبة وقياس المؤشرات الرئيسية المعنية بالعملية والمنتج وأداء نظام الجودة، فضلًا
                                    عن تحليل البيانات باستخدام المنهجية الإحصائية المناسبة، لتحديد فرص التحسين المستمر
                                    وتعزيز رضا العملاء.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">رضا العملاء</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">أنشأت <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> نموذجًا لاستبيان
                                    رضا العملاء، وجمع البيانات من عملائنا وتحليلها لتحديد مستوى تلبية احتياجاتهم وتوقعاتهم
                                    المتعلقة بمنتجاتنا، والوقوف على فرص التحسين الممكنة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">التحليل والتقييم</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.1.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="010px;">ستخضع جميع البيانات التي تم جمعها من نظام إدارة الجودة وعمليات المراقبة
                                    والقياس المنفذة داخل <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> إلى المراجعة
                                    والتحليل، وسيصار إلى استخدامها كأساس لتحديد فعالية نظام الجودة، وتوفيرًا لقاعدة برنامجنا
                                    للتحسين المستمر. انظر<a href="{{ url('/competency_process') }}">سياسة الجودة 104.</a>
                                </p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">التدقيق الداخلي</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">تدرك إدارة <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> أن <a
                                        href="{{ url('/auidt') }}">عمليات التدقيق الداخلي </a> تلعب دورًا أساسيًا في
                                    التحكم في نظام إدارة الجودة وتحسينه.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">– ستُجرى عمليات <a href="{{ url('/auidt') }}"> التدقيق</a> الداخلية
                                    للجودة وفقًا لعمليات <a href="{{ url('/auidt') }}">التدقيق</a>, بما يضمن تدقيق مختلف
                                    جوانب نظام الجودة الموثق، وعلى فترات لا تزيد عن 12 شهرًا.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;"> ستتم جدولة عمليات <a href="{{ url('/auidt') }}"> التدقيق </a>تبعًا
                                    لأهمية المجال أو النشاط الذي تم التدقيق فيه، وما تم الحصول عليه من نتائج عمليات<a
                                        href="{{ url('/auidt') }}">التدقيق</a> السابقة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">سيخضع المدققون لدورات تدريبية مناسبة، ولن يقوموا بتدقيق أعمالهم.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2.5 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">ستحدد إجراءات التدقيق الداخلي أسلوب ومسؤوليات تخطيط وإجراء عمليات<a
                                        href="{{ url('/auidt') }}"> التدقيق</a>, الداخلي للجودة، وإعداد تقارير بنتائج
                                    التدقيق وتنفيذ الإجراءات والتحقق من فعالية الإجراءات المتخذة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.2.6 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">ستراجع الإدارة نتائج عمليات <a href="{{ url('/auidt') }}">التدقيق</a>,
                                    الداخلي في كل اجتماع<a href="{{ url('/add_management_review') }}">لمراجعة الإدارة.</a>
                                </p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="021px;">مراجعة الإدارة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.3.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">ستُجرى مراجعات الإدارة سنويًا ووفقًا لتقدير الإدارة، ضمانًا لاستمرار
                                    فعالية وملاءمة وكفاية نظام إدارة الجودة.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.3.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">يتم تحديد مدخلات مراجعة الإدارة، وتتضمن معلومات عن أداء وفعالية نظام
                                    إدارة الجودة، والمنتجات والعمليات، فضلًا عن فرص التحسين.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>9.3.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="018px;">ستحدد مخرجات مراجعة الإدارة بوضوح إجراءات التحسين وأي احتياجات من الموارد
                                    تنشأ عن مراجعات الإدارة.</p>
                            </div>
                        </div>




                        <h4 class="m-t-20">10. التحسين</h4>
                        <div class="list_div">
                            <div class="list_number">
                                <p>10.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="027px;">متطلبات عامة</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>10.1.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">تلتزم <b><span
                                            class="authName">{{ Auth::user()->company_name }}</span></b> بسياسة التحسين
                                    المستمر لجميع جوانب أعمالنا. ويساهم نظام إدارة الجودة بشكل فعال في تحقيق سياسات الجودة
                                    وأهدافنا.</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>10.2 -</p>
                            </div>
                            <div class="list_content">
                                <p style="020px;">عدم المطابقة والإجراءات التصحيحية</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>10.2.1 -</p>
                            </div>
                            <div class="list_content">
                                <p style="017px;">عدم المطابقة والإجراءات التصحيحية
                                    1.2.10 - ستخضع حالات عدم المطابقة المعنية بنظام الجودة والعمليات وشكاوى العملاء لإجراءات
                                    موثقة تحدد أساليب ومسؤوليات التسجيل والتحليل والتحقيق، فضلًا عن التنفيذ والتحقق من مدى
                                    فعالية الإجراءات التصحيحية المتخذة. انظر
                                    <a href="{{ url('/corrective_action') }}">السياسة 2.</a>
                                </p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>10.3 -</p>
                            </div>
                            <div class="list_content">
                                <p style="025px;">التحسين المستمر</p>
                            </div>
                        </div>
                        <div class="list_div">
                            <div class="list_number">
                                <p>10.4 -</p>
                            </div>
                            <div class="list_content">
                                <p style=""> المراجع متوفرة في القسم 1.10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End::Section-->
    </div>
@endsection
<!-- end:: Content -->
