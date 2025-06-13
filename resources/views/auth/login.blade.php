<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>SCAISO - TAQEEM | ISO Portal</title> --}}
	 <title>MyISOArabia.com</title>
    <meta name="description" content="Tailwind CSS Saas HTML Template Is A Multi Purpose Landing Page Template, Corporate, Authentication, Launching Web, Agency or Business Startup, Clean, Modern, Creative, Multipurpose and Tailwind CSS Tailwind v3 etc."/>
    <meta name="author" content="Zoyothemes"/>
    <!-- Main Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="{{asset("assets/style.css")}}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- =========== Main Section Start =========== -->
    <section class="relative h-screen w-full flex items-center justify-center bg-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-[#ccf9df] to-[#d1d6ff]">
        <div class="relative max-w-lg md:mx-auto mx-6 w-full flex flex-col justify-center bg-white rounded-lg p-6">
            <div class="text-start mb-7">
                <a href="#" class="grow block mb-8">
                     <img class=" mx-auto" src="{{asset("assets/media/logos/MyISOArbiaLogo.png")}}" alt="images"  style="width: 450px">
                </a>

            </div>
			@if($errors->any())
				<div class="alert" style="background: red !important;color:#fff !important;">
					{{ implode('', $errors->all(':message')) }}
				</div>
			@endif
            <form class="text-start w-full" action="{{route('login')}}" method="POST">
				@csrf
                    <div class="flex md:justify-between justify-center items-center mb-8 md:gap-9 gap-2">
                        <a href="https://en.myisoarabia.com/" class="w-full inline-flex items-center justify-center px-6 gap-4 py-2.5 font-medium backdrop-blur-2xl border border-gray-300 bg-white text-dark rounded-md transition-all duration-500">
                            <img src="{{asset("assets/img/google.png")}}" alt="" class="max-w-5 h-5 text-dark ">English
                        </a>
                        <a  href="javascript:;" lang="ar" dir="rtl" class="w-full inline-flex items-center justify-center px-6 gap-4 py-2.5 font-medium backdrop-blur-2xl border border-gray-300  bg-primary text-white  rounded-md transition-all duration-500 group"><img src="{{asset("assets/img/facebook.png")}}" alt="" class="max-w-5 h-5 text-dark">العربية</a>
                    </div>   

                    <div class="mb-4">
                        
                        <input id="email-addon" class="block w-full rounded-md py-2.5 px-4 text-dark text-base font-medium border-gray-300 focus:gray-300 focus:border-primary focus:outline-0 focus:ring-0 placeholder:text-light placeholder:text-base" type="email" name="email" placeholder="عنوان البريد الإلكتروني">
                    </div>

                    <div class="mb-4">
                       
                        <div class="flex">
                            <input type="password" id="password-addon" class="form-password text-dark text-base font-medium block w-full rounded-s-md py-2.5 px-4 border border-gray-300 focus:gray-300 focus:border-primary focus:outline-0 focus:ring-0 placeholder:text-light placeholder:text-base" placeholder="كلمة المرور" name="password">
                            <button type="button" data-hs-toggle-password='{"target": "#password-addon"}' class="inline-flex items-center justify-center py-2.5 px-4 border rounded-e-md -ms-px border-gray-300">
                                <i class="hs-password-active:hidden h-5 w-5 text-dark" data-lucide="eye"></i>
                                <i data-lucide="eye-off" class="hidden hs-password-active:block h-5 w-5 text-dark"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex justify-between items-center flex-wrap gap-x-1 gap-y-2 mb-6 mt-3">
                       <div class="inline-flex items-center">
                            <input type="checkbox" id="firstCheckbox" class="h-4 w-4 text-base rounded border-gray-300 text-dark focus:ring focus:ring-default-950/30 focus:ring-offset-0">
                            {{-- <label class="text-base ms-2 text-light font-medium align-middle select-none" id="firstCheckbox" for="checkbox-signin">Remember me</label> --}}
                            {{-- <input class="form-check-input agreeInput mt-0 mr-1" id="firstCheckbox" type="checkbox" value=""> --}}
                            <button type="button" class="btn p-0 modal_btn" data-toggle="modal" data-target="#exampleModal" style="position: absolute;left:42px;">
														<label class=" text-base ms-2 text-light font-medium align-middle select-none" style="cursor: pointer; padding-top: 7px !important;">
															<small>أوافق على الشروط والأحكام.</small>
														</label>
													</button>
                        </div>
                        <a href="{{route('password.request')}}" class="text-base text-dark"><small>هل نسيت كلمة المرور؟</small></a>
                    </div>

                    <div class="text-center mb-7">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-2.5 bg-primary font-bold text-base text-white rounded-md transition-all duration-500 btn-brand" type="submit" id="SignIN" disabled>تسجيل الدخول</button>
                    </div>

                   
                </form>
        </div>
		
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-scrollable">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">الشروط والأحكام الخاصة بشركة </h5>
												<a data-dismiss="modal" aria-label="Close">
													<i class="fa fa-times" aria-hidden="true"></i>
												</a>
											</div>
											<div class="modal-body">
												<h6><strong>الموافقة على الشروط</strong></h6>
												<p>تنظم هذه الوثيقة العلاقة بينك وبين موقع "ماي آيزو أونلاين" (MyisoArabia™) الإلكتروني. تملُك شركة  هذا الموقع الإلكتروني وتعمل على تشغيله وإدارته. إن وصولك إلى هذا الموقع واستخدامه، بالإضافة إلى المنتجات والخدمات المقدمة من خلاله (يشار إليها مجتمعة باسم "الخدمات")، تحكمه الشروط والأحكام والإشعارات اللاحقة، والتي يشار إليها باسم ("شروط الخدمة"). من خلال تأكيد موافقتك على "الشروط والأحكام"، أنت تقرّ بأنك تفهم هذه الشروط والأحكام وتوافق على الالتزام بها. وباستخدامك لهذه الخدمات، فإنك توافق بموجب هذا على الالتزام بجميع شروط الخدمة، والتي قد نقوم بمراجعتها وتحديثها بشكل دوري. يُنصح بمراجعة هذه الصفحة والعودة إليها بشكل روتيني للبقاء على اطلاع بأي تعديلات قد أجريناها على شروط الخدمة. يرجى العلم أننا لن نتحمل المسؤولية إذا أصبح هذا الموقع غير متاح في أي وقت ولأي سبب من الأسباب. بالإضافة إلى ذلك، قد تكون هناك حالات عرضية حيث نقوم بتقييد الوصول إلى أقسام معينة أو الموقع بأكمله.</p>
												<h6><strong> المحظورات</strong></h6>
												<p>يُمنع منعًا باتًا استخدام هذا الموقع الإلكتروني بشكلٍ غير لائق؛ وهذا يعني أنه يجب عليك الامتناع عن ارتكاب الأنشطة الإجرامية أو الترويج لها، أو نقل أو نشر الفيروسات أو أي محتوى آخر ضار من منظور تكنولوجي، أو ينتهك السرية، أو مسيء أو فاحش بأي شكل من الأشكال. سيُنظر إلى أي انتهاك لهذا الشرط على أنه جريمة جنائية، وتحتفظ شركة  بالحق في الإبلاغ عن مثل هذه الانتهاكات إلى جهات إنفاذ القانون المناسبة والكشف عن هويتك لهم.</p>
													<h6><strong>الملكية الفكرية والبرامج والمحتوى</strong></h6>
													<p>تظل حقوق الملكية الفكرية لجميع البرامج والمحتوى، بما في ذلك الصور الفوتوغرافية، المقدمة لك عبر هذا الموقع، ملكية حصرية لشركة ، وهي محمية بموجب قوانين حقوق الطبع والنشر والمعاهدات الدولية. يحق لك تخزين وطباعة وعرض المحتوى المقدم حصريًا للاستخدام الشخصي. ومع ذلك، يُمنع منعًا باتًا نشر أو تغيير أو توزيع أو إعادة إنتاج، بأي شكل من الأشكال، أي من المحتوى أو النسخ المكررة من المحتوى المقدم لك من خلال هذا الموقع الإلكتروني. بالإضافة إلى ذلك، لا يجوز لك استخدام هذا المحتوى في أي عمل أو نشاط تجاري.</p>
													<h6><strong>شروط الخدمة</strong></h6>
													<p>نحن نعمل بالشراكة مع مدققين خارجيين مستقلين وهيئات إصدار الشهادات التي يمكنها إصدار شهادة المنظمة الدولية للمعايير (الآيزو) لمستخدمي موقع MyisoArabia™ عند الانتهاء بنجاح من عملية التدقيق. من المهم ملاحظة أن موقع MyisoArabia™ ليس لديه صلاحية إصدار الشهادات لأنه ليس هيئة اعتماد ولا هيئة لإصدار الشهادات. يكون كل ترخيص لبرنامج MyisoArabia™ صالحًا لمدة ثلاث سنوات، ويتوقف ذلك على إكمال ثلاث عمليات تدقيق سنوية بنجاح. إذا قمت بشراء نظامنا وتنوي الحصول على شهادة الآيزو، فيجب عليك مواصلة استخدام البرنامج وإثبات ذلك من خلال اجتياز عمليات التدقيق السنوية الثلاث. قد يؤدي عدم القيام بذلك إلى إلغاء شهادتك، وفي مثل هذه الحالات، لا يمكن أن يكون MyisoArabia™ مسؤولاً عن ذلك.</p>
													<h6><strong> لإرجاع</strong>
													<p>نظرًا لكوننا متخصصين في خدمات التصديق عبر الإنترنت، والتي تعد خدمة رقمية، فإننا نقوم برد الأموال خلال أول 7 أيام من شراء خدماتنا. نوصي بشدة بالاستفادة من الموارد المتاحة على موقعنا الإلكتروني، مثل الفيديو التوضيحي أو المدونات الإعلامية أو خيار المشاركة في محادثة مع أحد وكلائنا..</p>
													<h6><strong> الاسترداد (إذا كان ينطبق)</strong></h6>
													<p>نظرًا للطبيعة الرقمية لمنتجاتنا وخدماتنا، يرجى العلم أننا لا نقبل طلبات استرداد الأموال بعد انقضاء الأيام السبعة الأولى من شراء خدماتنا.</p>
													<h6><strong> إخلاء المسؤولية</strong></h6>
													<p>تقدم المعلومات المعروضة على هذا الموقع الإلكتروني دون أي ضمانات أو شروط فيما يتعلق بدقتها. ما لم ينص صراحة على خلاف ذلك، وإلى الحد الأقصى الذي يسمح به القانون، فإن شركة ، جنبًا إلى جنب مع مورديها ومزودي المحتوى والجهات الإعلانية، تخلي مسؤوليتها صراحة عن جميع الشروط الضمنية والضمانات والشروط الأخرى، سواء بموجب القانون أو القانون العام أو قانون حقوق الملكية. ولن تكون مسؤولة عن أي أضرار من أي نوع، بما في ذلك على سبيل المثال لا الحصر، أي أضرار مباشرة أو غير مباشرة أو خاصة أو تبعية أو عقابية أو عرضية، أو الأضرار الناجمة عن فقدان الاستخدام أو الأرباح أو البيانات أو غيرها من الأصول غير الملموسة، أو الضرر الذي يلحق بالشهرة أو السمعة، أو تكلفة شراء السلع والخدمات البديلة، الناشئة عن أو المرتبطة باستخدام أو عدم القدرة على الاستخدام أو الأداء أو فشل هذا الموقع أو المواقع المرتبطة وأي مواد منشورة عليه، بغض النظر عما إذا كانت هذه الأضرار متوقعة أو نشأت في تكوين العقد أو نتيجة خطأ أو تقصير أو كرد حق أو التعويض بموجب القانون أو القانون العام أو غير ذلك.</p>
													<h6><strong> إخلاء المسؤولية فيما يخص ملكية العلامات التجارية وصور الأفراد والمحتوى المحمي بحقوق الطبع والنشر لجهة خارجية</strong></h6>
													<p>ما لم تتم الإشارة إلى خلاف ذلك صراحةً، فإن أي أفراد (بما في ذلك أسماؤهم وصورهم) وعلامات تجارية ومحتوى وخدمات ومواقع تابعة لجهات خارجية، والمعروضة على هذا الموقع، ليس لديهم ارتباط مباشر أو اتصال أو انتماء مع شركة ، ولا ينبغي افتراض وجود مثل هذا الارتباط. كما أن العلامات التجارية والأسماء الواردة في هذا الموقع الإلكتروني هي ملك لأصحاب تلك العلامات التجارية. وعند ذكر علامة تجارية أو اسم علامة تجارية، يكون ذلك فقط لأغراض وصفية أو تعريفية فيما يتعلق بالمنتجات والخدمات، ولا يعني أي تأييد أو اتصال بشركة .</p>
													<h6><strong> التعويض</strong></h6>
													<p>تلتزم بتعويض شركة  وحمايتها وإبراء ذمتها، إلى جانب مديريها ومسؤوليها وموظفيها ومستشاريها ووكلائها والشركات التابعة لها، ضد أي مطالبات ومسؤوليات وخسائر ونفقات مرتبطة بأطراف خارجية (والتي قد تشمل النفقات القانونية) الناجمة عن استخدامك لهذا الموقع الإلكتروني أو أي انتهاكات لشروط الخدمة.</p>
													<h6><strong> التعديلات والتغييرات</strong></h6>
													<p>يحق لشركة ، وفقًا لتقديرها المطلق، وفي أي وقت ودون إشعار مسبق، تعديل أو إزالة أو تغيير الخدمات وأي صفحة على هذا الموقع الإلكتروني.</p>
													<h6><strong> استقلالية بنود الاتفاقية</strong></h6>
													<p>إذا أصبح أي جزء من شروط الخدمة غير قابل للتنفيذ (بما في ذلك أي حكم يحد من مسؤوليتنا تجاهك)، فلن تتأثر صحة وقابلية تنفيذ الأجزاء المتبقية من شروط الخدمة، وستظل جميع البنود الأخرى سارية بالكامل. وبقدر الإمكان، عندما يمكن فصل أي بند/بند فرعي أو جزء من بند/بند فرعي لجعل الجزء المتبقي صالحًا، يجب تفسير البند وفقًا لذلك. وبدلاً من ذلك، فإنك توافق على تصحيح البند وتفسيره بطريقة تشبه إلى حد كبير المعنى الأصلي للبند/ البند الفرعي على النحو الذي يسمح به القانون المعمول به.</p>
													<h6><strong> القانون الحاكم/ الولاية القضائية</strong></h6>
													<p>تخضع هذه الشروط والأحكام، وكذلك المعاملات الموضحة هنا، لقوانين دولة الإمارات العربية المتحدة وتفسر وفقًا لها. أي دعوى قضائية تسعى إلى الحصول على تعويضات قانونية أو عادلة تنشأ عن هذه الشروط أو ترتبط بها يجب رفعها حصريًا في المحاكم الواقعة ضمن الولاية القضائية لدولة الإمارات العربية المتحدة.</p>
													<h6><strong> كامل الاتفاقية</strong></h6>
													<p>تشكل شروط الخدمة المذكورة أعلاه الاتفاقية الكاملة بين الطرفين وتلغي أي اتفاقيات سابقة أو متزامنة بينك وبين شركة . ولن يكون أي تنازل عن أي شرط في شروط الخدمة ساريًا إلا إذا كان خطيًا وموقعًا من قبل مدير شركة .</p>
													<h6><strong> التواصل معنا</strong></h6>
													<p>إذا كانت لديك أسئلة أو تعليقات حول هذه الشروط والأحكام، يرجى التواصل معنا على العنوان التالي:<br>
														شركة <br>
														يو جي 13-5 إيه، مركز المرافق - مناطق رأس الخيمة الاقتصادية (راكز) <br>
													منطقة الحمرا الصناعية – منطقة حرة ،<br>
													الإمارات العربية المتحدة
													<!-- <div class="ml-2">
															<input class="form-check-input agreeInput" type="checkbox" value="" id="TermConditions">
															<label class="form-check-label" for="TermConditions">
																	I agree to the Terms and Conditions.
															</label>
													</div> -->
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">يغلق</button>
											</div>
											</div>
										</div>
									</div>
    </section>
    <!-- =========== Main Section End =========== -->
     <script>
    $('#firstCheckbox').on("change",function(){
			// $('#firstCheckbox').prop('checked', false);
			if(this.checked){
				document.querySelector('#SignIN').removeAttribute('disabled');
			}else{
				document.querySelector('#SignIN').setAttribute('disabled', '');
			}
		});    
    </script>
    <!-- Preline Js -->
    <script src="{{asset("js/ar/js/preline.js")}}" ></script>

    <!-- Lucide Js -->
    <script src="{{asset("js/ar/js/lucide.min.js")}}" ></script>

    <!-- Main App Js -->
    <script src="{{asset("js/ar/js/app.js")}}" ></script>

    </body>
</html>