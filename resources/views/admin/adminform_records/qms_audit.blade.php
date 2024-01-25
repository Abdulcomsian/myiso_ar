@extends('admin.dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->


        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>إضافة تفاصيل تدقيق نظام إدارة الجودة</h2>
            </div>
        </div>
        <section id="procedure_section">

            <div class="row">
                <div class="col-lg-12">
                    <p>يُعد هذا التدقيق تدقيقًا أفقيًا لكل بند في المعيار. وعادةً ما سيتكرر هذا التدقيق سنويًا ويُستخدم
                        للوقوف على مستوى مطابقتك لمعيار الآيزو.</p>
                    <p>لإضافة سجل، انقر على زر "إضافة تفاصيل تدقيق نظام إدارة الجودة". ولتعديل سجل، انقر على أيقونة تعديل
                        الإدخال الواجب تعديله. وستُجرى عمليات التدقيق بموجب التالية <a href="{{ url('auidt') }}">عمليات
                            التدقيق </a></p>
                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="qmsAudit()" class="addBtn">إضافة تفاصيل تدقيق نظام إدارة الجودة</a>
                            </div>
                        </div>
                        <div class="qms_audit_from_div text-right">

                            <form action="{{route('qmsaudit')}}" method="POST" enctype="multipart/form-data" class="addForm">
                                @csrf
                                @php
                                    $urlparam = request()->route()->parameters;
                                @endphp


                                <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                                <!--          			<div class="row">-->
                                <!--          				<div class="col-lg-12">-->
                                <!--          					<div class="form-group">-->
                                <!--	<label>QMS Audit ID Number:</label>-->
                                <!--	<input type="number" name="QmsauditNumber" class="form-control validate_number"  placeholder="Enter QMS Audit ID:" required>-->
                                <!--</div>-->
                                <!--          				</div>-->
                                <!--          			</div> -->

                                <!--<div class="row">-->
                                <!--	<div class="col-lg-12">-->
                                <!--		<div class="form-group">-->
                                <!--			<h3 style="margin-top: -136px;">Add QMS Audit Details</h3>-->
                                <!--		</div>-->
                                <!--	</div>-->
                                <!--</div>-->

                                <div class="row text-right">
                                    <div class="col-lg-12">
                                        <div class="form-group">

                                            <label>4.1 الإلمام بالمؤسسة وإطار عملها. هل يصح هذا الأمر؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="qmsCorects"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="qmsCorects"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="qmsCorects"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: (إدراج الدليل:)</label>
                                            <input type="text" name="evidence" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-right">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>4.2 استيعاب احتياجات الأطراف المعنية وتوقعاتهم. هل ما يزال هذا صحيحًا؟
                                            </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="needExpactations"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="needExpactations"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="needExpactations"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance2"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>4.3 تحديد نطاق نظام إدارة الجودة. هل ما يزال هذا صحيحًا؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction3"
                                                        required="required"> نعم
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction3"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction3"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence3"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>4.4 نظام إدارة الجودة وعملياته. هل العمليات تابعة ومناسبة وتحقق التفاعل؟
                                            </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction4"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction4"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction4"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance4"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>5.1 القيادة والالتزام. هل تتحمل الإدارة العليا المسؤولية عن نظام الجودة
                                                وهل ينصب اهتمامها على العملاء؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction5"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction5"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction5"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence5"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>5.2 السياسة. هل سياسة الجودة معمول بها ومعلنة وتتحلى بالدقة وتخضع
                                                للمراجعة؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction6"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction6"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction6"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidance7" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>5.3 الأدوار والمسؤوليات والصلاحيات المؤسسية. هل هي محددة ومعلنة؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction7"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction7"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction7"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidance7_1" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>6.1 إجراءات التعامل مع المخاطر والفرص. هل تتم إدارة المخاطر والفرص
                                                واستيعابها ومراجعتها؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction8"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction8"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction8"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance8"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>6.2 أهداف الجودة والتخطيط لتحقيقها. هل تُحدد الأهداف ضمن مراجعة الإدارة
                                                ويجري متابعتها؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction9"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction9"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction9"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance10"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>6.3 التخطيط للتغييرات. هل تم التخطيط لأي تغييرات لاستيفاء البند 6.3 من
                                                المعيار؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction11"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction11"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction11"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance12"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>7.1 الموارد. هل يتوفر ما يكفي من الموارد؟ ضع في اعتبارك الأشخاص والبنية
                                                التحتية وبيئة تشغيل العمليات ومراقبة الموارد والمعارف التنظيمية وتقديرها.
                                            </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction12"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction12"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction12"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidence13" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>7.2 الصلاحية. هل سجلات التدريب حديثة؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction13"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction13"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction13"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance14"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>7.3 الاطلاع. هل يستوفي اطلاع الموظف البند 7.3 من المعيار؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction14"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction14"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction14"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence17">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>7.4 التواصل. هل يستوفي التواصل البند 7.4 من المعيار؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction15"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction15"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction15"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence15"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>7.5 توثيق المعلومات. هل تخضع جميع المستندات المتعلقة بنظام الجودة
                                                للتدقيق؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction16"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction16"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction16"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence17">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.1 التخطيط التشغيلي والمراقبة. هل نظام المراقبة حديث وفعال؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correciton17"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correciton17"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correciton17"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence18"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.2 متطلبات المنتجات والخدمات. هل يتسم التواصل مع العملاء بالفعالية وهل
                                                تم تحديد متطلبات المنتجات والخدمات ومراجعتها وتوثيقها؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction18"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction18"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction18"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence19">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.3 تصميم المنتجات والخدمات وتطويرها. هل تم استيفاء متطلبات هذا
                                                المعيار؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction19"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction19"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction19"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence20"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.4 التحكم في العمليات والمنتجات والخدمات المقدمة من الخارج. هل تخضع
                                                العمليات والمنتجات والخدمات المقدمة من الخارج للمراقبة؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction20"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction20"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction20"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence21"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.5 الإنتاج وتقديم الخدمات. هل يخضع الإنتاج وتقديم الخدمات، بما في ذلك
                                                الأنشطة اللاحقة للتسليم للمراقبة؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction21"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction21"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction21"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence22">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.6 إصدار المنتجات والخدمات. هل تكتمل المنتجات والخدمات قبل إصدارها
                                                للعملاء؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction22"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction22"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction22"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence23"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8.7 مراقبة المخرجات غير المطابقة. هل يتم الإمساك بالسجلات وتحديثها؟
                                            </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction23"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction23"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction23"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidence24" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>9.1 الرصد والتقدير والتحليل والتقييم، بما في ذلك البند 9.1.3. هل تُنفذ
                                                عمليات الرصد والتقدير والتحليل والتقييم وتُوثق؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction24"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction24"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction24"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence25"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>9.1.2 رضا العملاء. هل اكتملت استبيانات رضا العملاء؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction25"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction25"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction25"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence26"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>9.2 التدقيق الداخلي. هل تم التخطيط لعمليات التدقيق الداخلي واستكمالها؟
                                            </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction26"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction26"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction26"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence27"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>9.3 المراجعة الإدارية. هل تم التخطيط للمراجعة الإدارية واستكمالها؟
                                            </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction27"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction27"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction27"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence28"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>10.1 التحسين - هل حددت المؤسسة واختارت فرصًا للتحسين ونفذت أي إجراءات
                                                لازمة لتلبية متطلبات العملاء وتعزيز رضاهم؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction28"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction28"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction28"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidence29" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>10.2 عدم المطابقة والإجراءات التصحيحية - هل تُوثق هذه الإجراءات بشكل
                                                صحيح؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction30"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction30"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction30"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>الدليل: </label>
                                        <input type="text" class="form-control" name="evidence30"
                                            placeholder="إدراج الدليل:">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>10.3 استمرار التحسين - هل هناك دليل على استمرار تحسن الشركة؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" name="correction29"
                                                        required="required"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" name="correction29"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" name="correction29"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence31"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>إرفاق الأدلة (jpeg, mp3, mp4, .xls, doc):</label>
                                            {{-- <input name="attach_evidence" type="file" class="form-control"
                                                accept="image/*,.doc, .docx,.txt,.pdf"> --}}
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput" class="input-file" name="attach_evidence" accept="image/*,.doc, .docx,.txt,.pdf"/>
                                                <label for="fileInput" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>تعليقات وإجراءات التدقيق: </label>
                                            <input type="text" class="form-control" name="audit_comments_actions"
                                                required="required" placeholder="إدراج تعليق:)">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>تاريخ تعبئة البيانات (يوم/شهر/سنة)):</label>
                                            <input type="date" max="2999-12-31" name="competedDate"
                                                class="form-control" placeholder="أدخل الأدلة:" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>اسم المدقق: </label>
                                            <input type="text" class="form-control" name="auditrName"
                                                placeholder="إدراج اسم المدقق:)" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>هل هناك أي مواضيع أو نقاط أخرى تود إضافتها؟ </label>
                                            <input type="text" name="any_issues" class="form-control"
                                                placeholder="إدراج أي مواضيع أخرى:)">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="submitBtn">يُقدِّم</button>
                                <button type="reset" style="margin-right: 10px;" class="btn btn-secondary submitBtn"
                                    onclick="qmsAudit()">يلغي</button>

                            </form>


                        </div>
                    </div>
                    <div class="procedure_div">
                        <div class="requirments_table_div">      
                            <div class="row">
                                <h4 class="col-11 text-right">إجمالي عمليات التدقيق المدرجة</h4>
                                <a href="/edit_user/{{ $urlparam['userid'] }}"
                                class="btn btn-clean btn-icon-sm mb-2 back_icon col-1">
                                خلف
                                 <i class="la la-long-arrow-left"></i>
                             </a>
                            </div>                     
                           
                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
                                       id="kt_table_agent">
                                    <thead>
                                        <tr>
                                            <th>الرقم التعريفي لتدقيق نظام إدارة الجودة</th>
                                            <th>تاريخ التدقيق</th>
                                            <th>الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($auditreport as $item)
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{date('d/m/Y', strtotime($item->competedDate))}}


                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View"
                                                        onclick="getEid({{json_encode($item)}});">
                                                    <!--                                                                                                     <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
                                                    <!--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                                                    <!--        <polygon points="0 0 24 0 24 24 0 24"/>-->
                                                    <!--        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>-->
                                                    <!--        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#5d78ff" fill-rule="nonzero"/>-->
                                                    <!--    </g>-->
                                                    <!--</svg></span>-->
                                                    <i class="fa fa-eye"></i>
                                                    <!--<i class="fa fa-eye"></i>-->
                                                </button>
                                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"
                                                        onclick="geteditdetails({{json_encode($item)}});">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#5d78ff" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                </path>
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#5d78ff" fill-rule="nonzero" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                                </button>


                                                @php

                                                    $d_id = intval($item->QmsauditNumber);

                                                @endphp

                                                <button data-toggle="modal" data-target="#confirm-{{$d_id}}"
                                                        id="remove_{{$d_id}}" title="Delete"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">											<rect x="0" y="0" width="24" height="24"></rect>											<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#5d78ff" fill-rule="nonzero"></path>											<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#5d78ff" opacity="0.3"></path>										</g>									</svg>
                                                </button>
                                                <!-- Delete Modal -->

                                                <div class="modal fade modal-mini modal-primary" id="confirm-{{$d_id}}"
                                                     tabindex="-1" role="dialog" aria-labelledby="confirm"
                                                     aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('deleteqmsAudit') }}"
                                                                    method="post">
                                                                    <div class="modal-header"> @csrf
                                                                        <div class="modal-profile">
                                                                            <h5>حذف تفاصيل تدقيق نظام إدارة الجودة</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->id }}">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">نعم</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!--End::Section-->
    </div>

    <div class="modal fade text-right" id="editProcessAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">عرض تفاصيل تدقيق نظام إدارة الجودة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <div class="modal-body">

                    <input type="hidden" value="" id="test_a" name="id"/>
                    <!--                 <div class="row">-->
                    <!--    <div class="col-lg-12">-->
                    <!--        <div class="form-group">-->
                    <!--            <label>QMS Audit ID Number:</label>-->
                    <!--            <input type="number" name="QmsauditNumber" class="form-control"  placeholder="Enter QMS Audit ID:" readonly>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>4.1 الإلمام بالمؤسسة وإطار عملها. هل يصح هذا الأمر؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="qmsCorects"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="qmsCorects"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="qmsCorects"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" name="evidence" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>4.2 استيعاب احتياجات الأطراف المعنية وتوقعاتهم. هل ما يزال هذا صحيحًا؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="needExpactations"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="needExpactations"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="needExpactations"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidance2"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>4.3 تحديد نطاق نظام إدارة الجودة. هل ما يزال هذا صحيحًا؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction3"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction3"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction3"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence3"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>4.4 نظام إدارة الجودة وعملياته. هل العمليات تابعة ومناسبة وتحقق التفاعل؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction4"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction4"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction4"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidance4"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>5.1 القيادة والالتزام. هل تتحمل الإدارة العليا المسؤولية عن نظام الجودة وهل ينصب
                                    اهتمامها على العملاء؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction5"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction5"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction5"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence5"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>5.2 السياسة. هل سياسة الجودة معمول بها ومعلنة وتتحلى بالدقة وتخضع للمراجعة؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction6"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction6"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction6"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" name="evidance7" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>5.3 الأدوار والمسؤوليات والصلاحيات المؤسسية. هل هي محددة ومعلنة؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction7"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction7"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction7"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" name="evidance7_1" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>6.1 إجراءات التعامل مع المخاطر والفرص. هل تتم إدارة المخاطر والفرص واستيعابها
                                    ومراجعتها؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction8"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction8"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction8"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidance8"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>6.2 أهداف الجودة والتخطيط لتحقيقها. هل تُحدد الأهداف ضمن مراجعة الإدارة ويجري
                                    متابعتها؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction9"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction9"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction9"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidance10"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>6.3 التخطيط للتغييرات. هل تم التخطيط لأي تغييرات لاستيفاء البند 6.3 من
                                    المعيار؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction11"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction11"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction11"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidance12"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>7.1 الموارد. هل يتوفر ما يكفي من الموارد؟ ضع في اعتبارك الأشخاص والبنية التحتية وبيئة
                                    تشغيل العمليات ومراقبة الموارد والمعارف التنظيمية وتقديرها.</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction12"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction12"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction12"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" name="evidence13" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>7.2 الصلاحية. هل سجلات التدريب حديثة؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction13"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction13"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction13"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidance14"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>7.3 الاطلاع. هل يستوفي اطلاع الموظف البند 7.3 من المعيار؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction14"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction14"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction14"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" placeholder="أدخل الأدلة:"
                                    name="evidence17">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>7.4 التواصل. هل يستوفي التواصل البند 7.4 من المعيار؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction15"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction15"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction15"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence15"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>7.5 توثيق المعلومات. هل تخضع جميع المستندات المتعلقة بنظام الجودة للتدقيق؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction16"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction16"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction16"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" placeholder="أدخل الأدلة:"
                                    name="evidence17">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.1 التخطيط التشغيلي والمراقبة. هل نظام المراقبة حديث وفعال؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correciton17"
                                            class="correciton17"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correciton17"
                                            class="correciton17"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correciton17"
                                            class="correciton17"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence18"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.2 متطلبات المنتجات والخدمات. هل يتسم التواصل مع العملاء بالفعالية وهل تم تحديد
                                    متطلبات المنتجات والخدمات ومراجعتها وتوثيقها؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction18"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction18"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction18"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" placeholder="أدخل الأدلة:"
                                    name="evidence19">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.3 تصميم المنتجات والخدمات وتطويرها. هل تم استيفاء متطلبات هذا المعيار؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction19"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction19"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction19"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence20"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.4 التحكم في العمليات والمنتجات والخدمات المقدمة من الخارج. هل تخضع العمليات
                                    والمنتجات والخدمات المقدمة من الخارج للمراقبة؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction20"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction20"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction20"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence21"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.5 الإنتاج وتقديم الخدمات. هل يخضع الإنتاج وتقديم الخدمات، بما في ذلك الأنشطة
                                    اللاحقة للتسليم للمراقبة؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction21"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction21"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction21"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" placeholder="أدخل الأدلة:"
                                    name="evidence22">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.6 إصدار المنتجات والخدمات. هل تكتمل المنتجات والخدمات قبل إصدارها للعملاء؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction22"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction22"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction22"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence23"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>8.7 مراقبة المخرجات غير المطابقة. هل يتم الإمساك بالسجلات وتحديثها؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction23"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction23"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction23"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" name="evidence24" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>9.1 الرصد والتقدير والتحليل والتقييم، بما في ذلك البند 9.1.3. هل تُنفذ عمليات الرصد
                                    والتقدير والتحليل والتقييم وتُوثق؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction24"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction24"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction24"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence25"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>9.1.2 رضا العملاء. هل اكتملت استبيانات رضا العملاء؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction25"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction25"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction25"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence26"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>9.2 التدقيق الداخلي. هل تم التخطيط لعمليات التدقيق الداخلي واستكمالها؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction26"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction26"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction26"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence27"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>9.3 المراجعة الإدارية. هل تم التخطيط للمراجعة الإدارية واستكمالها؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction27"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction27"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction27"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence28"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>10.1 التحسين - هل حددت المؤسسة واختارت فرصًا للتحسين ونفذت أي إجراءات لازمة لتلبية
                                    متطلبات العملاء وتعزيز رضاهم؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction28"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction28"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction28"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" name="evidence29" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>10.2 عدم المطابقة والإجراءات التصحيحية - هل تُوثق هذه الإجراءات بشكل صحيح؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction30"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction30"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction30"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence30"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>10.3 استمرار التحسين - هل هناك دليل على استمرار تحسن الشركة؟</label>
                                <div class="kt-radio-list">
                                    <label class="kt-radio">
                                        <input type="radio" value="Yes" name="correction29"> نعم
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="No" name="correction29"> لا
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" value="NA" name="correction29"> لا ينطبق
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>الدليل: </label>
                                <input type="text" class="form-control" name="evidence31"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>إرفاق الأدلة (jpeg, mp3, mp4, .xls, doc):</label>
                                <div class="evidence_attachemnt_div">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>تعليقات وإجراءات التدقيق: </label>
                                <input type="text" class="form-control" name="audit_comments_actions"
                                    placeholder="إدراج تعليق:">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>تاريخ تعبئة البيانات (يوم/شهر/سنة):</label>
                                <input type="date" max="2999-12-31" name="competedDate" class="form-control"
                                    placeholder="أدخل الأدلة:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>سم المدقق: </label>
                                <input type="text" class="form-control" name="auditrName"
                                    placeholder="إدراج اسم المدقق:">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>هل هناك أي مواضيع أو نقاط أخرى تود إضافتها؟</label>
                                <input type="text" class="form-control" name="any_issues" required
                                    placeholder="إدراج أي مواضيع أخرى:">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">يغلق</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="geteditdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير تفاصيل تدقيق نظام إدارة الجودة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <form action="{{route('update_qmsaudit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @php
                        $urlparam = request()->route()->parameters;
                    @endphp


                    <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                    <div class="modal-body">

                        <input type="hidden" value="" id="test_a" name="id" />
                        <!--                 <div class="row">-->
                        {{--				Any other issue:  <!--    <div class="col-lg-12">--> --}}
                        <!--        <div class="form-group">-->
                        <!--            <label>QMS Audit ID Number:</label>-->
                        <!--            <input type="number" name="QmsauditNumber" class="form-control"  placeholder="Enter QMS Audit ID:" readonly>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>4.1 الإلمام بالمؤسسة وإطار عملها. هل يصح هذا الأمر؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="qmsCorects"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="qmsCorects"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="qmsCorects"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>4.2 استيعاب احتياجات الأطراف المعنية وتوقعاتهم. هل ما يزال هذا صحيحًا؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="needExpactations"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="needExpactations"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="needExpactations"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance2"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>4.3 تحديد نطاق نظام إدارة الجودة. هل ما يزال هذا صحيحًا؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction3"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction3"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction3"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence3"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>4.4 نظام إدارة الجودة وعملياته. هل العمليات تابعة ومناسبة وتحقق التفاعل؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction4"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction4"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction4"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance4"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>5.1 القيادة والالتزام. هل تتحمل الإدارة العليا المسؤولية عن نظام الجودة وهل ينصب
                                        اهتمامها على العملاء؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction5"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction5"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction5"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence5"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>5.2 السياسة. هل سياسة الجودة معمول بها ومعلنة وتتحلى بالدقة وتخضع
                                        للمراجعة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction6"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction6"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction6"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidance7" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>5.3 الأدوار والمسؤوليات والصلاحيات المؤسسية. هل هي محددة ومعلنة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction7"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction7"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction7"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidance7_1" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>6.1 إجراءات التعامل مع المخاطر والفرص. هل تتم إدارة المخاطر والفرص واستيعابها
                                        ومراجعتها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction8"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction8"> لا
                                            <span></span>
                                        </label>
                                        <label required class="kt-radio">
                                            <input type="radio" value="NA" name="correction8"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance8"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>6.2 أهداف الجودة والتخطيط لتحقيقها. هل تُحدد الأهداف ضمن مراجعة الإدارة ويجري
                                        متابعتها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction9"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction9"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction9"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance10"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>6.3 التخطيط للتغييرات. هل تم التخطيط لأي تغييرات لاستيفاء البند 6.3 من
                                        المعيار؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction11"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction11"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction11"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance12"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7.1 الموارد. هل يتوفر ما يكفي من الموارد؟ ضع في اعتبارك الأشخاص والبنية التحتية
                                        وبيئة تشغيل العمليات ومراقبة الموارد والمعارف التنظيمية وتقديرها</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction12"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction12"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction12"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence13" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7.2 الصلاحية. هل سجلات التدريب حديثة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction13"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction13"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction13"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance14"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7.3 الاطلاع. هل يستوفي اطلاع الموظف البند 7.3 من المعيار؟</label>
                                    <div class="kt-radio-list">
                                        <label required class="kt-radio">
                                            <input type="radio" value="Yes" name="correction14"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction14"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction14"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence17">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7.4 التواصل. هل يستوفي التواصل البند 7.4 من المعيار؟</label>
                                    <div class="kt-radio-list">
                                        <label required class="kt-radio">
                                            <input type="radio" value="Yes" name="correction15"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction15"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction15"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence15"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7.5 توثيق المعلومات. هل تخضع جميع المستندات المتعلقة بنظام الجودة
                                        للتدقيق؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction16"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction16"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction16"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence17">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.1 التخطيط التشغيلي والمراقبة. هل نظام المراقبة حديث وفعال؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correciton17"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correciton17"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correciton17"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence18"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.2 متطلبات المنتجات والخدمات. هل يتسم التواصل مع العملاء بالفعالية وهل تم تحديد
                                        متطلبات المنتجات والخدمات ومراجعتها وتوثيقها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction18"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction18"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction18"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence19">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.3 تصميم المنتجات والخدمات وتطويرها. هل تم استيفاء متطلبات هذا المعيار؟</label>
                                    <div class="kt-radio-list">
                                        <label required class="kt-radio">
                                            <input type="radio" value="Yes" name="correction19"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction19"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction19"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence20"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.4 التحكم في العمليات والمنتجات والخدمات المقدمة من الخارج. هل تخضع العمليات
                                        والمنتجات والخدمات المقدمة من الخارج للمراقبة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction20"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction20"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction20"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence21"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.5 الإنتاج وتقديم الخدمات. هل يخضع الإنتاج وتقديم الخدمات، بما في ذلك الأنشطة
                                        اللاحقة للتسليم للمراقبة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction21"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction21"> لا
                                            <span></span>
                                        </label>
                                        <label required class="kt-radio">
                                            <input type="radio" value="NA" name="correction21"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence22">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.6 إصدار المنتجات والخدمات. هل تكتمل المنتجات والخدمات قبل إصدارها
                                        للعملاء؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction22"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction22"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction22"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence23"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8.7 مراقبة المخرجات غير المطابقة. هل يتم الإمساك بالسجلات وتحديثها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction23"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction23"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction23"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence24" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>9.1 الرصد والتقدير والتحليل والتقييم، بما في ذلك البند 9.1.3. هل تُنفذ عمليات
                                        الرصد والتقدير والتحليل والتقييم وتُوثق؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction24"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction24"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction24"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence25"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>9.1.2 رضا العملاء. هل اكتملت استبيانات رضا العملاء؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction25"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction25"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction25"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence26"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>9.2 التدقيق الداخلي. هل تم التخطيط لعمليات التدقيق الداخلي واستكمالها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction26"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction26"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction26"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence27"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>9.3 المراجعة الإدارية. هل تم التخطيط للمراجعة الإدارية واستكمالها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction27"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction27"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction27"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence28"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>10.1 التحسين - هل حددت المؤسسة واختارت فرصًا للتحسين ونفذت أي إجراءات لازمة
                                        لتلبية متطلبات العملاء وتعزيز رضاهم؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction28"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction28"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction28"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence29" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>10.2 عدم المطابقة والإجراءات التصحيحية - هل تُوثق هذه الإجراءات بشكل
                                        صحيح؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction30"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction30"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction30"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence30"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>10.3 استمرار التحسين - هل هناك دليل على استمرار تحسن الشركة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input required type="radio" value="Yes" name="correction29"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="No" name="correction29"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input required type="radio" value="NA" name="correction29"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence31"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق الأدلة (jpeg, mp3, mp4, .xls, doc):</label>
                                    {{-- <input name="attach_evidence" type="file" class="form-control"
                                        accept="image/*,.doc, .docx,.txt,.pdf"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput" class="input-file" name="attach_evidence" accept="image/*,.doc, .docx,.txt,.pdf"/>
                                        <label for="fileInput" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تعليقات وإجراءات التدقيق: </label>
                                    <input type="text" class="form-control" name="audit_comments_actions"
                                        placeholder="إدراج تعليق:">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تاريخ تعبئة البيانات (يوم/شهر/سنة):</label>
                                    <input required type="date" max="2999-12-31" name="competedDate"
                                        class="form-control" placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>اسم المدقق: </label>
                                    <input type="text" class="form-control" required name="auditrName"
                                        placeholder="إدراج اسم المدقق:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هل هناك أي مواضيع أو نقاط أخرى تود إضافتها؟ </label>
                                    <input type="text" class="form-control" name="any_issues" required
                                        placeholder="إدراج أي مواضيع أخرى:">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">تحديث</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">يلغي</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>

    function getEid(data) {
        console.log(data);
        //$("#id_feild").val(data.id);
        $("#test_a").val(data.id);

        $("input[name='QmsauditNumber']").val(data.QmsauditNumber);
        $("input[name='auditrName']").val(data.auditrName);
        $("input[name='competedDate']").val(data.competedDate);
        $("input[name='completion_date']").val(data.completion_date);
        $("input[name='evidance2']").val(data.evidance2);
        $("input[name='evidance4']").val(data.evidance4);
        $("input[name='evidance5']").val(data.evidance5);
        $("input[name='evidance6']").val(data.evidance6);
        $("input[name='evidance7']").val(data.evidance7);
        $("input[name='evidance8']").val(data.evidance8);
        $("input[name='evidance10']").val(data.evidance10);
        $("input[name='evidance12']").val(data.evidance12);
        $("input[name='evidance14']").val(data.evidance14);
        $("input[name='evidence14']").val(data.evidence14);

        $("input[name='evidance']").val(data.evidance);
        $("input[name='evidance3']").val(data.evidance3);
        $("input[name='evidance13']").val(data.evidance13);
        $("input[name='evidance5']").val(data.evidance5);
        $("input[name='evidance17']").val(data.evidance17);
        $("input[name='evidance18']").val(data.evidance18);
        $("input[name='evidance19']").val(data.evidance19);
        $("input[name='evidance20']").val(data.evidance20);
        $("input[name='evidance21']").val(data.evidance21);
        $("input[name='evidance22']").val(data.evidance22);
        $("input[name='evidance23']").val(data.evidance23);
        $("input[name='evidance24']").val(data.evidance24);
        $("input[name='evidance25']").val(data.evidance25);
        $("input[name='evidance26']").val(data.evidance26);
        $("input[name='evidance27']").val(data.evidance27);
        $("input[name='evidance28']").val(data.evidance28);
        $("input[name='evidance29']").val(data.evidance29);
        $("input[name='evidance30']").val(data.evidance30);
        $("input[name='evidence3']").val(data.evidence3);
        $("input[name='evidence']").val(data.evidence);
        $("input[name='evidence5']").val(data.evidence5);
        $("input[name='evidence13']").val(data.evidence13);
        $("input[name='evidence15']").val(data.evidence15);
        $("input[name='evidence17']").val(data.evidence17);
        $("input[name='evidence18']").val(data.evidence18);
        $("input[name='evidence19']").val(data.evidence19);
        $("input[name='evidence20']").val(data.evidence20);
        $("input[name='evidence21']").val(data.evidence21);
        $("input[name='evidence22']").val(data.evidence22);
        $("input[name='evidence23']").val(data.evidence23);
        $("input[name='evidence24']").val(data.evidence24);
        $("input[name='evidence25']").val(data.evidence25);
        $("input[name='evidence26']").val(data.evidence26);
        $("input[name='evidence27']").val(data.evidence27);
        $("input[name='evidence28']").val(data.evidence28);
        $("input[name='evidence29']").val(data.evidence29);
        $("input[name='evidence31']").val(data.evidence31);
        $("input[name='evidence30']").val(data.evidence30);
        $("input[name='evidance7_1']").val(data.evidance7_1);
        $("input[name='evidence28_1']").val(data.evidence28_1);
        $("input[name='audit_comments_actions']").val(data.audit_comments_actions);
        $("input[name='any_issues']").val(data.any_issues);
        if (data.attach_evidence) {
            $('.evidence_attachemnt_div').empty().append(`<span class="text-dark">Click to view evidence  <a target="_blank" href="${data.attach_evidence}">Here</a></span>`);
        } else {
            $('.evidence_attachemnt_div').empty().append('No data found');
        }
        $("input[name='qmsCorects'][value=" + data.qmsCorects + "]").prop('checked', true);
        $("input[name='needExpactations'][value=" + data.needExpactations + "]").prop('checked', true);
        $("input[name='correction3'][value=" + data.correction3 + "]").prop('checked', true);
        $("input[name='correction5'][value=" + data.correction5 + "]").prop('checked', true);
        $("input[name='correction7'][value=" + data.correction7 + "]").prop('checked', true);
        $("input[name='correction4'][value=" + data.correction4 + "]").prop('checked', true);
        $("input[name='correction8'][value=" + data.correction8 + "]").prop('checked', true);
        $("input[name='correction6'][value=" + data.correction6 + "]").prop('checked', true);

        $("input[name='correction9'][value=" + data.correction9 + "]").prop('checked', true);
        $("input[name='correction10'][value=" + data.correction10 + "]").prop('checked', true);
        $("input[name='correction11'][value=" + data.correction11 + "]").prop('checked', true);
        $("input[name='correction12'][value=" + data.correction12 + "]").prop('checked', true);
        $("input[name='correction13'][value=" + data.correction13 + "]").prop('checked', true);
        $("input[name='correction14'][value=" + data.correction14 + "]").prop('checked', true);
        $("input[name='correction15'][value=" + data.correction15 + "]").prop('checked', true);
        $("input[name='correction16'][value=" + data.correction16 + "]").prop('checked', true);
        $("input[name='correction18'][value=" + data.correction18 + "]").prop('checked', true);
        $("input[name='correciton17'][value=" + data.correciton17 + "]").prop('checked', true);

        $("input[name='correction19'][value=" + data.correction19 + "]").prop('checked', true);
        $("input[name='correction20'][value=" + data.correction20 + "]").prop('checked', true);
        $("input[name='correction21'][value=" + data.correction21 + "]").prop('checked', true);
        $("input[name='correction22'][value=" + data.correction22 + "]").prop('checked', true);
        $("input[name='correction23'][value=" + data.correction23 + "]").prop('checked', true);
        $("input[name='correction24'][value=" + data.correction24 + "]").prop('checked', true);
        $("input[name='correction25'][value=" + data.correction25 + "]").prop('checked', true);
        $("input[name='correction26'][value=" + data.correction26 + "]").prop('checked', true);
        $("input[name='correction27'][value=" + data.correction27 + "]").prop('checked', true);
        $("input[name='correction28'][value=" + data.correction28 + "]").prop('checked', true);
        $("input[name='correction29'][value=" + data.correction29 + "]").prop('checked', true);
        $("input[name='correction30'][value=" + data.correction30 + "]").prop('checked', true);
        reset();
        $("#editProcessAudit").modal('show');
    }

    function geteditdetails(data) {
        console.log(data);

        $("input[name='id']").val(data.id);
        $("input[name='QmsauditNumber']").val(data.QmsauditNumber);
        $("input[name='auditrName']").val(data.auditrName);
        $("input[name='competedDate']").val(data.competedDate);
        $("input[name='completion_date']").val(data.completion_date);
        $("input[name='evidance2']").val(data.evidance2);
        $("input[name='evidance4']").val(data.evidance4);
        $("input[name='evidance5']").val(data.evidance5);
        $("input[name='evidance6']").val(data.evidance6);
        $("input[name='evidance7']").val(data.evidance7);
        $("input[name='evidance8']").val(data.evidance8);
        $("input[name='evidance10']").val(data.evidance10);
        $("input[name='evidance12']").val(data.evidance12);
        $("input[name='evidance14']").val(data.evidance14);
        $("input[name='evidence14']").val(data.evidence14);
        $("input[name='evidance']").val(data.evidance);
        $("input[name='evidance3']").val(data.evidance3);
        $("input[name='evidance13']").val(data.evidance13);
        $("input[name='evidance5']").val(data.evidance5);
        $("input[name='evidance17']").val(data.evidance17);
        $("input[name='evidance18']").val(data.evidance18);
        $("input[name='evidance19']").val(data.evidance19);
        $("input[name='evidance20']").val(data.evidance20);
        $("input[name='evidance21']").val(data.evidance21);
        $("input[name='evidance22']").val(data.evidance22);
        $("input[name='evidance23']").val(data.evidance23);
        $("input[name='evidance24']").val(data.evidance24);
        $("input[name='evidance25']").val(data.evidance25);
        $("input[name='evidance26']").val(data.evidance26);
        $("input[name='evidance27']").val(data.evidance27);
        $("input[name='evidance28']").val(data.evidance28);
        $("input[name='evidance29']").val(data.evidance29);
        $("input[name='evidance30']").val(data.evidance30);
        $("input[name='evidence3']").val(data.evidence3);
        $("input[name='evidence']").val(data.evidence);
        $("input[name='evidence5']").val(data.evidence5);
        $("input[name='evidence13']").val(data.evidence13);
        $("input[name='evidence15']").val(data.evidence15);
        $("input[name='evidence17']").val(data.evidence17);
        $("input[name='evidence18']").val(data.evidence18);
        $("input[name='evidence19']").val(data.evidence19);
        $("input[name='evidence20']").val(data.evidence20);
        $("input[name='evidence21']").val(data.evidence21);
        $("input[name='evidence22']").val(data.evidence22);
        $("input[name='evidence23']").val(data.evidence23);
        $("input[name='evidence24']").val(data.evidence24);
        $("input[name='evidence25']").val(data.evidence25);
        $("input[name='evidence26']").val(data.evidence26);
        $("input[name='evidence27']").val(data.evidence27);
        $("input[name='evidence28']").val(data.evidence28);
        $("input[name='evidence29']").val(data.evidence29);
        $("input[name='evidence31']").val(data.evidence31);
        $("input[name='evidence30']").val(data.evidence30);
        $("input[name='evidance7_1']").val(data.evidance7_1);
        $("input[name='evidence28_1']").val(data.evidence28_1);
        $("input[name='audit_comments_actions']").val(data.audit_comments_actions);
        $("input[name='any_issues']").val(data.any_issues);

        $("input[name='qmsCorects'][value=" + data.qmsCorects + "]").prop('checked', true);
        $("input[name='needExpactations'][value=" + data.needExpactations + "]").prop('checked', true);
        $("input[name='correction3'][value=" + data.correction3 + "]").prop('checked', true);
        $("input[name='correction5'][value=" + data.correction5 + "]").prop('checked', true);
        $("input[name='correction7'][value=" + data.correction7 + "]").prop('checked', true);
        $("input[name='correction4'][value=" + data.correction4 + "]").prop('checked', true);
        $("input[name='correction8'][value=" + data.correction8 + "]").prop('checked', true);
        $("input[name='correction6'][value=" + data.correction6 + "]").prop('checked', true);

        $("input[name='correction9'][value=" + data.correction9 + "]").prop('checked', true);
        $("input[name='correction10'][value=" + data.correction10 + "]").prop('checked', true);
        $("input[name='correction11'][value=" + data.correction11 + "]").prop('checked', true);
        $("input[name='correction12'][value=" + data.correction12 + "]").prop('checked', true);
        $("input[name='correction13'][value=" + data.correction13 + "]").prop('checked', true);
        $("input[name='correction14'][value=" + data.correction14 + "]").prop('checked', true);
        $("input[name='correction15'][value=" + data.correction15 + "]").prop('checked', true);
        $("input[name='correction16'][value=" + data.correction16 + "]").prop('checked', true);
        $("input[name='correction18'][value=" + data.correction18 + "]").prop('checked', true);
        $("input[name='correciton17'][value=" + data.correciton17 + "]").prop('checked', true);

        $("input[name='correction19'][value=" + data.correction19 + "]").prop('checked', true);
        $("input[name='correction20'][value=" + data.correction20 + "]").prop('checked', true);
        $("input[name='correction21'][value=" + data.correction21 + "]").prop('checked', true);
        $("input[name='correction22'][value=" + data.correction22 + "]").prop('checked', true);
        $("input[name='correction23'][value=" + data.correction23 + "]").prop('checked', true);
        $("input[name='correction24'][value=" + data.correction24 + "]").prop('checked', true);
        $("input[name='correction25'][value=" + data.correction25 + "]").prop('checked', true);
        $("input[name='correction26'][value=" + data.correction26 + "]").prop('checked', true);
        $("input[name='correction27'][value=" + data.correction27 + "]").prop('checked', true);
        $("input[name='correction28'][value=" + data.correction28 + "]").prop('checked', true);
        $("input[name='correction29'][value=" + data.correction29 + "]").prop('checked', true);
        $("input[name='correction30'][value=" + data.correction30 + "]").prop('checked', true);
        reset();
        $("#geteditdetails").modal('show');
    }

    function deleteqmsAudit(data) {
        reset();
        $("#re_id").val(data.id);
        $("#deleteRequirment").modal('show');

    }

    function reset(){
        $('.addForm')[0].reset();
        $('.qms_audit_from_div').attr('style', 'display:none');
    }
    //
    // $("input").on("change", function () {
    //     this.setAttribute(
    //         "data-date",
    //         moment(this.value, "YYYY-MM-DD")
    //             .format(this.getAttribute("data-date-format"))
    //     )
    // }).trigger("change")

</script>