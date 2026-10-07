@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <button type="button" class="am-page-guide-btn"
                    data-toggle="modal" data-target="#amPageGuide"
                    title="إضافة تفاصيل تدقيق نظام إدارة الجودة" aria-label="إضافة تفاصيل تدقيق نظام إدارة الجودة">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>إضافة تفاصيل تدقيق نظام إدارة الجودة</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">

                                <a href="{{ asset('download_qms_audit/QMS-Audit-Report.pdf') }}" target="_blank"
                                    class="am-btn am-btn-primary">تحميل تدقيق نظام إدارة الجودة</a>


                                <a onclick="qmsAudit()" class="am-btn am-btn-primary">إضافة تفاصيل تدقيق نظام إدارة الجودة</a>
                            </div>
                        </div>
                        <div class="qms_audit_from_div">

                            <form action="{{ route('qmsaudit') }}" method="POST" enctype="multipart/form-data"
                                class="addForm am-inline-form open" style="margin:16px 20px;">
                                @csrf

                                <div class="form-row">
                                    <div>
                        <div class="form-group">
                            <label>اسم المدقق: </label>
                            <input type="text" class="form-control" name="auditrName"
                                placeholder="إدراج اسم المدقق:)" required="required">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>تاريخ تعبئة البيانات (يوم/شهر/سنة)):</label>
                            <input type="date" max="2999-12-31" name="competedDate"
                                class="form-control" placeholder="أدخل الأدلة:" required="required">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>إرفاق الأدلة (jpeg, mp3, mp4, .xls, doc):</label>
                            {{-- <input name="attach_evidence" type="file" class="form-control"
                                accept="image/*,.doc, .docx,.txt,.pdf"> --}}
                            <div class="custom-file-input-tag form-control">
                                <input type="file" id="fileInput1" class="input-file" name="attach_evidence" accept="image/*,.doc, .docx,.txt,.pdf"/>
                                <label for="fileInput1" class="file-label">
                                    <span class="file-text">اختيار الملف</span>
                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                </label>
                            </div>
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                        	<label>الملف المرفق File (PDF, jpeg, txt, .docx, doc, png):</label>
                        	<div class="custom-file-input-tag form-control">
                        	    <input type="file" id="fileInput2" class="input-file" name="attach_file" accept="image/*,.doc, .docx,.txt,.pdf,.jpeg,.png">
                        	    <label for="fileInput2" class="file-label">
                        	        <span class="file-text">اختيار الملف</span>
                        	        <span class="file-chosen">لم يتم اختيار ملف</span>
                        	    </label>
                        	</div>
                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:1/-1;">
                        <div class="form-group">
                            <label>تعليقات وإجراءات التدقيق: </label>
                            <input type="text" class="form-control" name="audit_comments_actions"
                                required="required" placeholder="إدراج تعليق:)">
                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:1/-1;">
                        <div class="form-group">
                            <label>هل هناك أي مواضيع أو نقاط أخرى تود إضافتها؟ </label>
                            <input type="text" name="any_issues" class="form-control"
                                placeholder="إدراج أي مواضيع أخرى:)">
                        </div>
                                    </div>
                                </div>


                                <!--          			<div class="form-row" style="margin-bottom:8px;">-->
                                <!--          				<div style="grid-column:span 3;">-->
                                <!--          					<div class="form-group">-->
                                <!--	<label>QMS Audit ID Number:</label>-->
                                <!--	<input type="number" name="QmsauditNumber" class="form-control validate_number"  placeholder="Enter QMS Audit ID:" required>-->
                                <!--</div>-->
                                <!--          				</div>-->
                                <!--          			</div> -->

                                <!--<div class="form-row" style="margin-bottom:8px;">-->
                                <!--	<div style="grid-column:span 3;">-->
                                <!--		<div class="form-group">-->
                                <!--			<h3 style="margin-top: -136px;">Add QMS Audit Details</h3>-->
                                <!--		</div>-->
                                <!--	</div>-->
                                <!--</div>-->

                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">

                                            <label>4.1 الإلمام بالمؤسسة وإطار عملها. هل يصح هذا الأمر؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="qmsCorects"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="qmsCorects"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="qmsCorects"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: (إدراج الدليل:)</label>
                                            <input type="text" name="evidence" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>4.2 استيعاب احتياجات الأطراف المعنية وتوقعاتهم. هل ما يزال هذا صحيحًا؟
                                            </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="needExpactations"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="needExpactations"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="needExpactations"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance2"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>4.3 تحديد نطاق نظام إدارة الجودة. هل ما يزال هذا صحيحًا؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction3" required="required">نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction3"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction3"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence3"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>4.4 نظام إدارة الجودة وعملياته. هل العمليات تابعة ومناسبة وتحقق التفاعل؟
                                            </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction4"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction4"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction4"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance4"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>5.1 القيادة والالتزام. هل تتحمل الإدارة العليا المسؤولية عن نظام الجودة
                                                وهل ينصب اهتمامها على العملاء؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction5"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction5"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction5"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence5"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>5.2 السياسة. هل سياسة الجودة معمول بها ومعلنة وتتحلى بالدقة وتخضع
                                                للمراجعة؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction6"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction6"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction6"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidance7" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>5.3 الأدوار والمسؤوليات والصلاحيات المؤسسية. هل هي محددة ومعلنة؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction7"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction7"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction7"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidance7_1" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>6.1 إجراءات التعامل مع المخاطر والفرص. هل تتم إدارة المخاطر والفرص
                                                واستيعابها ومراجعتها؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction8"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction8"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction8"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance8"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>6.2 أهداف الجودة والتخطيط لتحقيقها. هل تُحدد الأهداف ضمن مراجعة الإدارة
                                                ويجري متابعتها؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction9"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction9"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction9"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance10"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>6.3 التخطيط للتغييرات. هل تم التخطيط لأي تغييرات لاستيفاء البند 6.3 من
                                                المعيار؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction11"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction11"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction11"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance12"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>7.1 الموارد. هل يتوفر ما يكفي من الموارد؟ ضع في اعتبارك الأشخاص والبنية
                                                التحتية وبيئة تشغيل العمليات ومراقبة الموارد والمعارف التنظيمية وتقديرها.
                                            </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction12"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction12"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction12"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidence13" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>7.2 الصلاحية. هل سجلات التدريب حديثة؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction13"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction13"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction13"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidance14"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>7.3 الاطلاع. هل يستوفي اطلاع الموظف البند 7.3 من المعيار؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction14"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction14"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction14"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence17">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>7.4 التواصل. هل يستوفي التواصل البند 7.4 من المعيار؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction15"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction15"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction15"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence15"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>7.5 توثيق المعلومات. هل تخضع جميع المستندات المتعلقة بنظام الجودة
                                                للتدقيق؟</label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction16"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction16"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction16"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence17">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.1 التخطيط التشغيلي والمراقبة. هل نظام المراقبة حديث وفعال؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correciton17"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correciton17"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correciton17"> لا ينطبق
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence18"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.2 متطلبات المنتجات والخدمات. هل يتسم التواصل مع العملاء بالفعالية وهل
                                                تم تحديد متطلبات المنتجات والخدمات ومراجعتها وتوثيقها؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction18"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction18"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction18"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence19">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.3 تصميم المنتجات والخدمات وتطويرها. هل تم استيفاء متطلبات هذا
                                                المعيار؟</label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction19"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction19"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction19"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence20"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.4 التحكم في العمليات والمنتجات والخدمات المقدمة من الخارج. هل تخضع
                                                العمليات والمنتجات والخدمات المقدمة من الخارج للمراقبة؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction20"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction20"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction20"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence21"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.5 الإنتاج وتقديم الخدمات. هل يخضع الإنتاج وتقديم الخدمات، بما في ذلك
                                                الأنشطة اللاحقة للتسليم للمراقبة؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction21"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction21"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction21"> لا ينطبق
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                                name="evidence22">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.6 إصدار المنتجات والخدمات. هل تكتمل المنتجات والخدمات قبل إصدارها
                                                للعملاء؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction22"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction22"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction22"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence23"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>8.7 مراقبة المخرجات غير المطابقة. هل يتم الإمساك بالسجلات وتحديثها؟
                                            </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction23"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction23"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction23"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidence24" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>9.1 الرصد والتقدير والتحليل والتقييم، بما في ذلك البند 9.1.3. هل تُنفذ
                                                عمليات الرصد والتقدير والتحليل والتقييم وتُوثق؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction24"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction24"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction24"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence25"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>9.1.2 رضا العملاء. هل اكتملت استبيانات رضا العملاء؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction25"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction25"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction25"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence26"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>9.2 التدقيق الداخلي. هل تم التخطيط لعمليات التدقيق الداخلي واستكمالها؟
                                            </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction26"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction26"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction26"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence27"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>9.3 المراجعة الإدارية. هل تم التخطيط للمراجعة الإدارية واستكمالها؟
                                            </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction27"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction27"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction27"> لا ينطبق
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence28"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>10.1 التحسين - هل حددت المؤسسة واختارت فرصًا للتحسين ونفذت أي إجراءات
                                                لازمة لتلبية متطلبات العملاء وتعزيز رضاهم؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction28"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction28"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction28"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" name="evidence29" class="form-control"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>10.2 عدم المطابقة والإجراءات التصحيحية - هل تُوثق هذه الإجراءات بشكل
                                                صحيح؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction30"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction30"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction30"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="grid-column:span 3;">
                                    <div class="form-group">
                                        <label>الدليل: </label>
                                        <input type="text" class="form-control" name="evidence30"
                                            placeholder="إدراج الدليل:">
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom:8px;">
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>10.3 استمرار التحسين - هل هناك دليل على استمرار تحسن الشركة؟ </label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" name="correction29"
                                                        required="required"> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" name="correction29"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" name="correction29"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 3;">
                                        <div class="form-group">
                                            <label>الدليل: </label>
                                            <input type="text" class="form-control" name="evidence31"
                                                placeholder="إدراج الدليل:">
                                        </div>
                                    </div>
                                    </div>

                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" class="am-btn am-btn-outline am-btn-sm"
                                    onclick="qmsAudit()">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table class="am-table"
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
                                            $i = 1;
                                        @endphp
                                        @forelse ($requirement as $item)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $i++ }}</span></td>
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->competedDate)) }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="View" onclick="getEid({{ json_encode($item) }});">
                                                        <!--                                                                                                     <i class="fa fa-eye"></i>-->
                                                        <i class="fa fa-eye"></i>
                                                        <!--<i class="fa fa-eye"></i>-->
                                                    </button>
                                                    <button class="am-icon-btn"
                                                        title="Edit"
                                                        onclick="geteditdetails({{ json_encode($item) }});"> <i class="fa fa-pen"></i>
                                                    </button>


                                                    @php

                                                        $d_id = intval($item->QmsauditNumber);

                                                    @endphp

                                                    <button data-qmsid="{{ $item->id }}"
                                                        class="am-icon-btn download-pdf-qms"
                                                        onclick = "qmsfun({{ $item->id }})" title="Download PDF">
                                                        <i class="fa fa-download"></i>
                                                    </button>


                                                    <button data-toggle="modal" data-target="#confirm-{{ $item->id }}"
                                                        id="remove_{{ $item->id }}" title="Delete"
                                                        class="am-icon-btn danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>




                                                    <!-- Delete Modal -->

                                                    <div class="modal fade modal-mini modal-primary"
                                                        id="confirm-{{ $item->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="confirm" aria-hidden="true">
                                                        <div class="modal-dialog text-right" style="max-width:460px;">
                                                            <div class="modal-content">
                                                                <form action="{{ route('deleteqmsAudit') }}"
                                                                    method="post">
                                                                    <div class="modal-header am-modal__header"> @csrf
                                                                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                        <div class="modal-profile am-modal__title">
                                                                            <h5>حذف تفاصيل تدقيق نظام إدارة الجودة</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                                    </div>
                                                                    <div class="modal-footer am-modal__footer">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $item->id }}">
                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">
                                                    <div class="am-empty">
                                                        <i class="fa fa-shield-alt"></i>
                                                        <p>لم يتم تسجيل أي تدقيقات لنظام إدارة الجودة بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $requirement])
                        </div>
                    </div>
                </div>
        </section>

        <!--End::Section-->
    </div>


	{{-- view modal --}}
    {{-- Page guide --}}
    <div class="modal fade text-right" id="amPageGuide" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon am-page-guide-icon"><i class="fa fa-info-circle"></i></span>
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;">النماذج والسجلات</div>
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">تدقيقات نظام إدارة الجودة</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هي؟</h5>
                    <p style="margin:0 0 16px;">فحص يتم إجراؤه مرة واحدة على الأقل سنويًا لنظامك بأكمله وفقًا لمعايير ISO 9001 و14001 و45001، أو وفقًا لمعايير فردية من خلال 17 سؤالًا. تركز مراجعة العمليات على مهمة واحدة؛ بينما تركز هذه المراجعة على كل شيء.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">لماذا يهم ذلك؟</h5>
                    <p style="margin:0 0 16px;">هذا هو الفحص الذاتي الخاص بك قبل أن يقوم مدقق الاعتماد بفحصه. إن إجراء هذا الفحص وتصحيح ما يكتشفه هو ما يميز الشركة التي تدير نظامها عن تلك التي تكتفي بتسجيل الأوراق. يطلب المدقق هذا الملخص في كل عملية مراقبة سنوية.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">انقر على «إضافة تدقيق نظام إدارة الجودة» وسجل اسم القائم بالتدقيق وتاريخ الانتهاء.</li>
                        <li style="margin-bottom:6px;">تناول الأسئلة الـ 17، باستخدام قائمة «ما يجب فحصه». تخطّ الأسطر المخصصة لمعيار لا تمتلكه.</li>
                        <li style="margin-bottom:6px;">أجب بـ «نعم» أو «لا» أو «لا ينطبق» باستخدام المربع الرمادي. كن صادقًا — فالهدف الأساسي هو اكتشاف المشكلات.</li>
                        <li style="margin-bottom:6px;">قم برفع «حالة عدم مطابقة» لأي شيء لم يستوفِ المعايير، حتى يتم تتبع الإصلاح بشكل صحيح.</li>
                        <li>يعد تسجيل الأدلة أمرًا حيويًا هنا، لذا قم بتسجيل الأدلة أو تصويرها أو مسحها ضوئيًا وإرفاقها حيثما أمكن ذلك.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editProcessAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تفاصيل تدقيق نظام إدارة الجودة</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" id="test_a" name="id" />

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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="qmsCorects"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="qmsCorects"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="qmsCorects"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="needExpactations"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="needExpactations"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="needExpactations"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction3"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction3"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction3"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction4"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction4"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction4"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction5"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction5"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction5"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction6"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction6"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction6"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction7"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction7"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction7"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction8"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction8"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction8"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction9"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction9"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction9"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction11"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction11"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction11"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction12"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction12"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction12"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction13"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction13"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction13"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction14"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction14"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction14"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction15"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction15"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction15"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction16"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction16"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction16"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correciton17"
                                            class="correciton17"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correciton17"
                                            class="correciton17"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correciton17"
                                            class="correciton17"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction18"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction18"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction18"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction19"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction19"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction19"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction20"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction20"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction20"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction21"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction21"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction21"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction22"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction22"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction22"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction23"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction23"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction23"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction24"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction24"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction24"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction25"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction25"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction25"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction26"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction26"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction26"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction27"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction27"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction27"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction28"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction28"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction28"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction30"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction30"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction30"> لا ينطبق
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
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="correction29"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="correction29"> لا
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="NA" name="correction29"> لا ينطبق
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Attachment File (PDF, jpeg, txt, .docx, doc, png):</label>
                                <div class="file_attachemnt_div">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>

                </div>
            </div>
        </div>
    </div>



    {{-- Edit Model --}}
    <div class="modal fade text-right" id="geteditdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:1000px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل تدقيق نظام إدارة الجودة</h5>
                </div>
                <form action="{{ route('update_qmsaudit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" value="" id="test_a" name="id" />

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المدقق: </label>
                                    <input type="text" class="form-control" required name="auditrName"
                                        placeholder="إدراج اسم المدقق:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ تعبئة البيانات (يوم/شهر/سنة):</label>
                                    <input required type="date" max="2999-12-31" name="competedDate"
                                        class="form-control" placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تعليقات وإجراءات التدقيق: </label>
                                    <input type="text" class="form-control" name="audit_comments_actions"
                                        placeholder="إدراج تعليق:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل هناك أي مواضيع أو نقاط أخرى تود إضافتها؟ </label>
                                    <input type="text" class="form-control" name="any_issues" required
                                        placeholder="إدراج أي مواضيع أخرى:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إرفاق الأدلة (jpeg, mp3, mp4, .xls, doc):</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput3" class="input-file" name="attach_evidence" accept="image/*,.doc, .docx,.txt,.pdf">
                                        <label for="fileInput3" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>لملف المرفق (PDF, jpeg, txt, .docx, doc, png):</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput4" class="input-file" name="attach_file" accept="image/*,.doc, .docx,.txt,.pdf,.png,.jpeg">
                                        <label for="fileInput4" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                 <div class="form-group row">-->
                        {{--				Any other issue:  <!--    <div class="col-lg-6">--> --}}
                        <!--        <div class="form-group">-->
                        <!--            <label>QMS Audit ID Number:</label>-->
                        <!--            <input type="number" name="QmsauditNumber" class="form-control"  placeholder="Enter QMS Audit ID:" readonly>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>4.1 الإلمام بالمؤسسة وإطار عملها. هل يصح هذا الأمر؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="qmsCorects"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="qmsCorects"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="qmsCorects"> لا ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>4.2 استيعاب احتياجات الأطراف المعنية وتوقعاتهم. هل ما يزال هذا صحيحًا؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="needExpactations"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="needExpactations"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="needExpactations"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance2"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>4.3 تحديد نطاق نظام إدارة الجودة. هل ما يزال هذا صحيحًا؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction3"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction3"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction3"> لا ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence3"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>4.4 نظام إدارة الجودة وعملياته. هل العمليات تابعة ومناسبة وتحقق التفاعل؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction4"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction4"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction4"> لا ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance4"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>5.1 القيادة والالتزام. هل تتحمل الإدارة العليا المسؤولية عن نظام الجودة وهل ينصب
                                        اهتمامها على العملاء؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction5"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction5"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction5"> لا ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence5"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>5.2 السياسة. هل سياسة الجودة معمول بها ومعلنة وتتحلى بالدقة وتخضع
                                        للمراجعة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction6"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction6"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction6"> لا ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidance7" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>5.3 الأدوار والمسؤوليات والصلاحيات المؤسسية. هل هي محددة ومعلنة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction7"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction7"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction7"> لا ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidance7_1" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>6.1 إجراءات التعامل مع المخاطر والفرص. هل تتم إدارة المخاطر والفرص واستيعابها
                                        ومراجعتها؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction8"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction8"> لا
                                        </label>
                                        <label required style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" name="correction8"> لا ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance8"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>6.2 أهداف الجودة والتخطيط لتحقيقها. هل تُحدد الأهداف ضمن مراجعة الإدارة ويجري
                                        متابعتها؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction9"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction9"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction9"> لا ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance10"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>6.3 التخطيط للتغييرات. هل تم التخطيط لأي تغييرات لاستيفاء البند 6.3 من
                                        المعيار؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction11"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction11"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction11"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance12"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>7.1 الموارد. هل يتوفر ما يكفي من الموارد؟ ضع في اعتبارك الأشخاص والبنية التحتية
                                        وبيئة تشغيل العمليات ومراقبة الموارد والمعارف التنظيمية وتقديرها</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction12"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction12"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction12"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence13" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>7.2 الصلاحية. هل سجلات التدريب حديثة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction13"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction13"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction13"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidance14"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>7.3 الاطلاع. هل يستوفي اطلاع الموظف البند 7.3 من المعيار؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label required style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" name="correction14"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction14"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction14"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence17">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>7.4 التواصل. هل يستوفي التواصل البند 7.4 من المعيار؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label required style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" name="correction15"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction15"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction15"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence15"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>7.5 توثيق المعلومات. هل تخضع جميع المستندات المتعلقة بنظام الجودة
                                        للتدقيق؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction16"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction16"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction16"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence17">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.1 التخطيط التشغيلي والمراقبة. هل نظام المراقبة حديث وفعال؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correciton17"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correciton17"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correciton17"> لا
                                            ينطبق
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence18"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.2 متطلبات المنتجات والخدمات. هل يتسم التواصل مع العملاء بالفعالية وهل تم تحديد
                                        متطلبات المنتجات والخدمات ومراجعتها وتوثيقها؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction18"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction18"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction18"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence19">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.3 تصميم المنتجات والخدمات وتطويرها. هل تم استيفاء متطلبات هذا المعيار؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label required style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" name="correction19"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction19"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction19"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence20"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.4 التحكم في العمليات والمنتجات والخدمات المقدمة من الخارج. هل تخضع العمليات
                                        والمنتجات والخدمات المقدمة من الخارج للمراقبة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction20"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction20"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction20"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence21"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.5 الإنتاج وتقديم الخدمات. هل يخضع الإنتاج وتقديم الخدمات، بما في ذلك الأنشطة
                                        اللاحقة للتسليم للمراقبة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction21"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction21"> لا
                                        </label>
                                        <label required style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" name="correction21"> لا ينطبق
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" placeholder="إدراج الدليل:"
                                        name="evidence22">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.6 إصدار المنتجات والخدمات. هل تكتمل المنتجات والخدمات قبل إصدارها
                                        للعملاء؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction22"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction22"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction22"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence23"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>8.7 مراقبة المخرجات غير المطابقة. هل يتم الإمساك بالسجلات وتحديثها؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction23"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction23"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction23"> لا
                                            ينطبق
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence24" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>9.1 الرصد والتقدير والتحليل والتقييم، بما في ذلك البند 9.1.3. هل تُنفذ عمليات
                                        الرصد والتقدير والتحليل والتقييم وتُوثق؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction24"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction24"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction24"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence25"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>9.1.2 رضا العملاء. هل اكتملت استبيانات رضا العملاء؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction25"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction25"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction25"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence26"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>9.2 التدقيق الداخلي. هل تم التخطيط لعمليات التدقيق الداخلي واستكمالها؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction26"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction26"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction26"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence27"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>9.3 المراجعة الإدارية. هل تم التخطيط للمراجعة الإدارية واستكمالها؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction27"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction27"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction27"> لا
                                            ينطبق
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence28"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>10.1 التحسين - هل حددت المؤسسة واختارت فرصًا للتحسين ونفذت أي إجراءات لازمة
                                        لتلبية متطلبات العملاء وتعزيز رضاهم؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction28"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction28"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction28"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" name="evidence29" class="form-control"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>10.2 عدم المطابقة والإجراءات التصحيحية - هل تُوثق هذه الإجراءات بشكل
                                        صحيح؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction30"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction30"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction30"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence30"
                                        placeholder="إدراج الدليل:">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>10.3 استمرار التحسين - هل هناك دليل على استمرار تحسن الشركة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="Yes" name="correction29"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="No" name="correction29"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input required type="radio" value="NA" name="correction29"> لا
                                            ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الدليل: </label>
                                    <input type="text" class="form-control" name="evidence31"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                            </div>
                        </div>
                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
    function qmsfun(id) {
        $.ajax({
            url: '/generate-pdf-qms',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                qms_id: id
            },
            success: function(response) {
                window.open(response.url, '_blank');
            },
            error: function() {
                console.error("Failed to generate PDF");
            }
        });
    }

    function getEid(data) {
        if ($(".qms_audit_from_div").is(":visible")) {
            qmsAudit();
        }
        console.log(data);
        $("#id_feild").val(data.id);

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
        $("input[name='any_issues']").val(data.any_issues);
        $("input[name='audit_comments_actions']").val(data.audit_comments_actions);
        if (data.attach_evidence) {
            $('.evidence_attachemnt_div').empty().append(
                `<a target="_blank" href="${data.attach_evidence}">Click to View</a>`);
        } else {
            $('.evidence_attachemnt_div').empty().append('No data found');
        }
        if(data.attach_file){
			$('.file_attachemnt_div').empty().append(`<a target="_blank" href="${data.attach_file}">Click to View</a>`);
		}else{
			$('.file_attachemnt_div').empty().append('No data found');
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

        $("#editProcessAudit").modal('show');
    }

    function geteditdetails(data) {
        if ($(".qms_audit_from_div").is(":visible")) {
            qmsAudit();
        }
        console.log(data);
        $("#test_a").val(data.id);
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
        $("input[name='any_issues']").val(data.any_issues);
        $("input[name='audit_comments_actions']").val(data.audit_comments_actions);

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
        $(".correciton17[value=" + data.correciton17 + "]").prop('checked', true);

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

        $("#geteditdetails").modal('show');
    }

    function deleteqmsAudit(data) {
        if ($(".qms_audit_from_div").is(":visible")) {
            qmsAudit();
        }

        $("#re_id").val(data.id);
        $("#deleteRequirment").modal('show');

    }



    //  QMS PDF REPORT
</script>
@endsection
