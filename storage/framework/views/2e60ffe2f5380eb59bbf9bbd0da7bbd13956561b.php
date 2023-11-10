<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->

<html lang="en">
<style>
	/* This is will change the direction from Right to LEFT  */
	*{
		direction: rtl;
		text-align: right;
		font-family: 'Noto Naskh Arabic', serif;
		font-size: 15px;
	}
    .kt-checkbox > input:checked ~ span {
    border: 1px solid #000;
	}
	.kt-checkbox > span:after {
		border: 1px solid black;
	}
	button['disabled']{
		cursor: disable;
	}
	#TermConditions{
		transform: scale(1.2);
	}
	label[for="TermConditions"]{
		margin-left: 6px;
		font-size:15px;
	}
	#kt_login_forgot{
		color: #6d728b;
	}
	.AgreeUl{
		margin-left: 18px;
	}
	@media  screen and (max-width: 1300px){
		.modal_btn{
			left:-10px !important;
		}
		#kt_login_forgot{
			font-size:14px !important;
		}
		#login_box{
			left: 10px;position: relative;
		}
	}
	@media  screen and (max-width: 480px){
		#firstCheckoxDev{
			margin-top:30px !important;
        }
	}
	@media  screen and (min-width: 1300px){
		#firstCheckboxDev{
			transform: translate(-10px,-46px);
		}
		.kt-form{
			width: 456px;
		}
		.form-check-label{
			font-size: 15px;
			cursor: pointer;
		}
		.form-check-label:hover{
			text-decoration: underline;
		}
		.agreeInput{
			margin-left: -2px !important;
			position: relative !important;
		}
	}
	/* this styling is for model btn */
	.modal_btn{
		color: #a7abc3 !important;
		font-size: 14px !important;
		font-weight: 300 !important;
		cursor: pointer;
	}
	.agreeInput{
		transform: scale(1.2);
	}
	.form-check-label{
		color: #6d728b;
		opacity: 1;
	}
	.form-check-label:hover {
		text-decoration: underline;
		cursor: pointer;
    	color: #5867dd
	}

   

</style>
	<?php echo $__env->make('auth.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- begin::Body -->
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background:#fff" >
				<!-- style="background-image: url(../assets/media/bg/bg-2.jpg);" -->
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="#">
									<img src="../assets/media/logos/ISOOnline Arabic Logo.jpg" class="img-fluid">
								</a>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									
									
								</div>
								
									<?php if($errors->any()): ?>
										<div class="alert" style="background: red !important;color:#fff !important;">
											<?php echo e(implode('', $errors->all(':message'))); ?>

										</div>
									<?php endif; ?>
								
								<form class="kt-form" method="POST" action="<?php echo e(route('login')); ?>">
									<?php echo csrf_field(); ?>
									<div class="input-group">
										<input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email"  placeholder="Email Address" name="email" autocomplete="off" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
									</div>
									<div class="d-flex justify-content-between kt-login__extra pl-0 ml-0 mt-3" id="login_box">
										<div class="">

											<div class="form-check AgreeUl pl-0 ml-2 mt-4 d-flex align-items-center" id="firstCheckoxDev">
													<!-- Button trigger modal -->
													<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
													<input class="form-check-input agreeInput mt-0 mr-1" id="firstCheckbox" type="checkbox" value="">
													<button type="button" style="margin-right: 10px;" class="btn p-0 modal_btn" data-toggle="modal" data-target="#exampleModal">
														<label class="form-check-label" style="width:300px;">
															I Agree to the Terms and Conditions
														</label>
													</button>
		
												<!-- Modal -->
												</div>
										</div>
										<div class="">
											<a href="javascript:;" id="kt_login_forgot" style="font-size:15px;" class="kt-login__link">Forgot Password</a>
										</div>
										
										

									</div>
									<div class="row kt-login__extra pl-0 ml-0 mt-3">
										<div class="col p-0">
											<!--<label class="kt-checkbox">-->
											<!--	<input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember me-->
											<!--	<span style="border: 1px solid #000;"></span>-->
											<!--</label>-->
											<!-- checkbox --> 
										
									<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-scrollable">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">الشروط والأحكام الخاصة بشركة جيه إم إي المنطقة الحرة</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<h6><strong>الموافقة على الشروط</strong></h6>
												<p>تنظم هذه الوثيقة العلاقة بينك وبين موقع "ماي آيزو أونلاين" (Myisoonline™) الإلكتروني. تملُك شركة جيه إم إي المنطقة الحرة هذا الموقع الإلكتروني وتعمل على تشغيله وإدارته. إن وصولك إلى هذا الموقع واستخدامه، بالإضافة إلى المنتجات والخدمات المقدمة من خلاله (يشار إليها مجتمعة باسم "الخدمات")، تحكمه الشروط والأحكام والإشعارات اللاحقة، والتي يشار إليها باسم ("شروط الخدمة"). من خلال تأكيد موافقتك على "الشروط والأحكام"، أنت تقرّ بأنك تفهم هذه الشروط والأحكام وتوافق على الالتزام بها. وباستخدامك لهذه الخدمات، فإنك توافق بموجب هذا على الالتزام بجميع شروط الخدمة، والتي قد نقوم بمراجعتها وتحديثها بشكل دوري. يُنصح بمراجعة هذه الصفحة والعودة إليها بشكل روتيني للبقاء على اطلاع بأي تعديلات قد أجريناها على شروط الخدمة. يرجى العلم أننا لن نتحمل المسؤولية إذا أصبح هذا الموقع غير متاح في أي وقت ولأي سبب من الأسباب. بالإضافة إلى ذلك، قد تكون هناك حالات عرضية حيث نقوم بتقييد الوصول إلى أقسام معينة أو الموقع بأكمله.</p>
												<h6><strong> المحظورات</strong></h6>
												<p>يُمنع منعًا باتًا استخدام هذا الموقع الإلكتروني بشكلٍ غير لائق؛ وهذا يعني أنه يجب عليك الامتناع عن ارتكاب الأنشطة الإجرامية أو الترويج لها، أو نقل أو نشر الفيروسات أو أي محتوى آخر ضار من منظور تكنولوجي، أو ينتهك السرية، أو مسيء أو فاحش بأي شكل من الأشكال. سيُنظر إلى أي انتهاك لهذا الشرط على أنه جريمة جنائية، وتحتفظ شركة جيه إم إي المنطقة الحرة بالحق في الإبلاغ عن مثل هذه الانتهاكات إلى جهات إنفاذ القانون المناسبة والكشف عن هويتك لهم.</p>
													<h6><strong>الملكية الفكرية والبرامج والمحتوى</strong></h6>
													<p>تظل حقوق الملكية الفكرية لجميع البرامج والمحتوى، بما في ذلك الصور الفوتوغرافية، المقدمة لك عبر هذا الموقع، ملكية حصرية لشركة جيه إم إي المنطقة الحرة، وهي محمية بموجب قوانين حقوق الطبع والنشر والمعاهدات الدولية. يحق لك تخزين وطباعة وعرض المحتوى المقدم حصريًا للاستخدام الشخصي. ومع ذلك، يُمنع منعًا باتًا نشر أو تغيير أو توزيع أو إعادة إنتاج، بأي شكل من الأشكال، أي من المحتوى أو النسخ المكررة من المحتوى المقدم لك من خلال هذا الموقع الإلكتروني. بالإضافة إلى ذلك، لا يجوز لك استخدام هذا المحتوى في أي عمل أو نشاط تجاري.</p>
													<h6><strong>شروط الخدمة</strong></h6>
													<p>نحن نعمل بالشراكة مع مدققين خارجيين مستقلين وهيئات إصدار الشهادات التي يمكنها إصدار شهادة المنظمة الدولية للمعايير (الآيزو) لمستخدمي موقع Myisoonline™ عند الانتهاء بنجاح من عملية التدقيق. من المهم ملاحظة أن موقع Myisoonline™ ليس لديه صلاحية إصدار الشهادات لأنه ليس هيئة اعتماد ولا هيئة لإصدار الشهادات. يكون كل ترخيص لبرنامج Myisoonline™ صالحًا لمدة ثلاث سنوات، ويتوقف ذلك على إكمال ثلاث عمليات تدقيق سنوية بنجاح. إذا قمت بشراء نظامنا وتنوي الحصول على شهادة الآيزو، فيجب عليك مواصلة استخدام البرنامج وإثبات ذلك من خلال اجتياز عمليات التدقيق السنوية الثلاث. قد يؤدي عدم القيام بذلك إلى إلغاء شهادتك، وفي مثل هذه الحالات، لا يمكن أن يكون Myisoonline™ مسؤولاً عن ذلك.</p>
													<h6><strong> لإرجاع</strong>/h6>
													<p>نظرًا لكوننا متخصصين في خدمات التصديق عبر الإنترنت، والتي تعد خدمة رقمية، فإننا نقوم برد الأموال خلال أول 7 أيام من شراء خدماتنا. نوصي بشدة بالاستفادة من الموارد المتاحة على موقعنا الإلكتروني، مثل الفيديو التوضيحي أو المدونات الإعلامية أو خيار المشاركة في محادثة مع أحد وكلائنا..</p>
													<h6><strong> الاسترداد (إذا كان ينطبق)</strong></h6>
													<p>نظرًا للطبيعة الرقمية لمنتجاتنا وخدماتنا، يرجى العلم أننا لا نقبل طلبات استرداد الأموال بعد انقضاء الأيام السبعة الأولى من شراء خدماتنا.</p>
													<h6><strong> إخلاء المسؤولية</strong></h6>
													<p>تقدم المعلومات المعروضة على هذا الموقع الإلكتروني دون أي ضمانات أو شروط فيما يتعلق بدقتها. ما لم ينص صراحة على خلاف ذلك، وإلى الحد الأقصى الذي يسمح به القانون، فإن شركة جيه إم إي المنطقة الحرة، جنبًا إلى جنب مع مورديها ومزودي المحتوى والجهات الإعلانية، تخلي مسؤوليتها صراحة عن جميع الشروط الضمنية والضمانات والشروط الأخرى، سواء بموجب القانون أو القانون العام أو قانون حقوق الملكية. ولن تكون مسؤولة عن أي أضرار من أي نوع، بما في ذلك على سبيل المثال لا الحصر، أي أضرار مباشرة أو غير مباشرة أو خاصة أو تبعية أو عقابية أو عرضية، أو الأضرار الناجمة عن فقدان الاستخدام أو الأرباح أو البيانات أو غيرها من الأصول غير الملموسة، أو الضرر الذي يلحق بالشهرة أو السمعة، أو تكلفة شراء السلع والخدمات البديلة، الناشئة عن أو المرتبطة باستخدام أو عدم القدرة على الاستخدام أو الأداء أو فشل هذا الموقع أو المواقع المرتبطة وأي مواد منشورة عليه، بغض النظر عما إذا كانت هذه الأضرار متوقعة أو نشأت في تكوين العقد أو نتيجة خطأ أو تقصير أو كرد حق أو التعويض بموجب القانون أو القانون العام أو غير ذلك.</p>
													<h6><strong> إخلاء المسؤولية فيما يخص ملكية العلامات التجارية وصور الأفراد والمحتوى المحمي بحقوق الطبع والنشر لجهة خارجية</strong></h6>
													<p>ما لم تتم الإشارة إلى خلاف ذلك صراحةً، فإن أي أفراد (بما في ذلك أسماؤهم وصورهم) وعلامات تجارية ومحتوى وخدمات ومواقع تابعة لجهات خارجية، والمعروضة على هذا الموقع، ليس لديهم ارتباط مباشر أو اتصال أو انتماء مع شركة جيه إم إي المنطقة الحرة، ولا ينبغي افتراض وجود مثل هذا الارتباط. كما أن العلامات التجارية والأسماء الواردة في هذا الموقع الإلكتروني هي ملك لأصحاب تلك العلامات التجارية. وعند ذكر علامة تجارية أو اسم علامة تجارية، يكون ذلك فقط لأغراض وصفية أو تعريفية فيما يتعلق بالمنتجات والخدمات، ولا يعني أي تأييد أو اتصال بشركة جيه إم إي المنطقة الحرة.</p>
													<h6><strong> التعويض</strong></h6>
													<p>تلتزم بتعويض شركة جيه إم إي المنطقة الحرة وحمايتها وإبراء ذمتها، إلى جانب مديريها ومسؤوليها وموظفيها ومستشاريها ووكلائها والشركات التابعة لها، ضد أي مطالبات ومسؤوليات وخسائر ونفقات مرتبطة بأطراف خارجية (والتي قد تشمل النفقات القانونية) الناجمة عن استخدامك لهذا الموقع الإلكتروني أو أي انتهاكات لشروط الخدمة.</p>
													<h6><strong> التعديلات والتغييرات</strong></h6>
													<p>يحق لشركة جيه إم إي المنطقة الحرة، وفقًا لتقديرها المطلق، وفي أي وقت ودون إشعار مسبق، تعديل أو إزالة أو تغيير الخدمات وأي صفحة على هذا الموقع الإلكتروني.</p>
													<h6><strong> استقلالية بنود الاتفاقية</strong></h6>
													<p>إذا أصبح أي جزء من شروط الخدمة غير قابل للتنفيذ (بما في ذلك أي حكم يحد من مسؤوليتنا تجاهك)، فلن تتأثر صحة وقابلية تنفيذ الأجزاء المتبقية من شروط الخدمة، وستظل جميع البنود الأخرى سارية بالكامل. وبقدر الإمكان، عندما يمكن فصل أي بند/بند فرعي أو جزء من بند/بند فرعي لجعل الجزء المتبقي صالحًا، يجب تفسير البند وفقًا لذلك. وبدلاً من ذلك، فإنك توافق على تصحيح البند وتفسيره بطريقة تشبه إلى حد كبير المعنى الأصلي للبند/ البند الفرعي على النحو الذي يسمح به القانون المعمول به.</p>
													<h6><strong> القانون الحاكم/ الولاية القضائية</strong></h6>
													<p>تخضع هذه الشروط والأحكام، وكذلك المعاملات الموضحة هنا، لقوانين دولة الإمارات العربية المتحدة وتفسر وفقًا لها. أي دعوى قضائية تسعى إلى الحصول على تعويضات قانونية أو عادلة تنشأ عن هذه الشروط أو ترتبط بها يجب رفعها حصريًا في المحاكم الواقعة ضمن الولاية القضائية لدولة الإمارات العربية المتحدة.</p>
													<h6><strong> كامل الاتفاقية</strong></h6>
													<p>تشكل شروط الخدمة المذكورة أعلاه الاتفاقية الكاملة بين الطرفين وتلغي أي اتفاقيات سابقة أو متزامنة بينك وبين شركة جيه إم إي المنطقة الحرة. ولن يكون أي تنازل عن أي شرط في شروط الخدمة ساريًا إلا إذا كان خطيًا وموقعًا من قبل مدير شركة جيه إم إي المنطقة الحرة.</p>
													<h6><strong> التواصل معنا</strong></h6>
													<p>إذا كانت لديك أسئلة أو تعليقات حول هذه الشروط والأحكام، يرجى التواصل معنا على العنوان التالي:<br>
														شركة جيه إم إي المنطقة الحرة<br>
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
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
											</div>
										</div>
									</div>
										<!-- checkbox -->
										</div>
									</div>
									<div class="kt-login__actions">
										
										<button type="submit" class="btn btn-brand btn-pill kt-login__btn-primary" id="SignIN" disabled>Sign In</button>
									</div>
								</form>
							</div>
							<div class="kt-login__signup">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign Up</h3>
									<div class="kt-login__desc">Enter your details to create your account:</div>
								</div>
								<form class="kt-form" method="POST" action="<?php echo e(route('register')); ?>">
									 <?php echo csrf_field(); ?>
									<div class="input-group">
										<input placeholder="Fullname" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
									</div>
									<div class="input-group">
										<input  placeholder="Email Address"  autocomplete="off" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
									</div>
									<div class="input-group">
										<input  type="password" placeholder="Password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="password">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
									</div>
									<div class="row kt-login__extra">
										<div class="col kt-align-left">
											<label class="kt-checkbox">
												<input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
												<span></span>
											</label>
											<span class="form-text text-muted"></span>
										</div>
									</div>
									<div class="kt-login__actions">
										<button id="kt_login_signup_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
										<button id="kt_login_signup_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgot Password</h3>
									<div class="kt-login__desc" style="color: #6a6f74;
								">Enter your email address to reset your password.</div>
								</div>
								<form class="kt-form" action="<?php echo e(route('password.reset.email')); ?>" method="POST">
									<?php echo csrf_field(); ?>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email Address" name="email" id="kt_email" autocomplete="off">
									</div>
									<div class="kt-login__actions">
										

										<button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary" type='submit'>Submit</button>&nbsp;&nbsp;
										<button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->
		<?php echo $__env->make('auth.includes.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	</body>

	<script>
		// jkjkj


	$('#firstCheckbox').on("change",function(){
			// $('#firstCheckbox').prop('checked', false);
			if(this.checked){
				document.querySelector('#SignIN').removeAttribute('disabled');
			}else{
				document.querySelector('#SignIN').setAttribute('disabled', '');
			}
		});

	//   document.querySelector('#TermConditions').addEventListener('change', function(e) {
	// 	if(document.querySelector('#TermConditions').checked){
	// 		// remove disabled attributes
	// 		document.querySelector('#SignIN').removeAttribute('disabled');
	// 		// checked the checkbox in jquery
	// 		$('.agreeInput').prop('checked', true);
	// 	}else{
	// 		$('.agreeInput').prop('checked', false);
	// 		document.querySelector('#SignIN').setAttribute('disabled', '');
	// 	}
	//   })

	 



	</script>
	<!-- end::Body -->


</html>
<?php /**PATH D:\xampp\htdocs\myiso_arabic\resources\views/auth/login.blade.php ENDPATH**/ ?>