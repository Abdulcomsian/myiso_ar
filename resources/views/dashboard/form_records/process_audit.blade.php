@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>تدقيق العمليات</h2>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row text-right">
                <div class="col-lg-12">
                    <p>يُشار أيضًا إلى عمليات تدقيق العمليات باسم عمليات تدقيق تعليمات العمل، ويتم إجراء عمليات التدقيق هذه بواسطة المدقق الداخلي. يتم إجراء هذا التدقيق عن طريق تحديد تعليمات العمل، أو تدقيق مخطط تدفق العملية والتأكد من معالجتها بشكل صحيح.</p>
                    <p>لإضافة سجل، انقر فوق "إضافة".
                        زر "تفاصيل تدقيق العملية". لتعديل سجل، انقر على أيقونة التحرير الخاصة
                        الإدخال الذي يحتاج إلى تعديل.</p>

                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">

                                <a href="{{ asset('download_process_audit/Process-Audit.pdf') }}" target="_blank"
                                    class="addBtn">تحميل عمليات التدقيق</a>

                                <a onclick="processAuditForm()" class="addBtn"> إضافة تفاصيل تدقيق العملية</a>

                            </div>
                        </div>
                        <div class="process_audit_from_div">
                            <form action="{{ route('auditform') }}" method="POST" enctype="multipart/form-data"
                                class="addForm">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Audit ID Number (See table below. For amendments only):</label>
                                            <input type="number" name="auditId" class="form-control"  placeholder="Enter Audit ID:">
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>العملية التي يتم تدقيقها:</label>
                                            {{-- <input type="text" name="processAudit" id="processAudit" class="form-control"
                                                   placeholder="Enter Process / Work Instruction title" required> --}}
                                            <select name="processAudit" class="form-control">
                                                <option value="">حدد الخيار</option>
                                                <option value="">حدد الخيار</option>
                                                <option value="إجراء الجودة 1 - عملية المبيعات">إجراء الجودة 1 - عملية المبيعات</option>
                                                <option value="إجراء الجودة 2 - عملية الشراء">إجراء الجودة 2 - عملية الشراء</option>
                                                <option value="إجراء الجودة 3 - تنفيذ بنود العقد">إجراء الجودة 3 - تنفيذ بنود العقد</option>
                                                <option value="إجراء الجودة 4 - عملية الكفاءة">إجراء الجودة 4 - عملية الكفاءة</option>
                                                <option value="تفاعل العملية">تفاعل العملية</option>
                                                @isset($workInstructionsData)
                                                    @foreach($workInstructionsData as $item)
                                                        <option value="{{$item->workinstruction}}">{{$item->workinstruction}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>مدقق حسابات:</label>
                                            <input type="text" name="auditor" class="form-control"
                                                placeholder="أدخل اسم المراجع" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="colAttach Evidence:-lg-6 w-50" >
                                        <div class="form-group">
                                            <label>تاريخ التدقيق (يوم/شهر/سنة):</label>
                                            <input type="date" max="2999-12-31" name="auditDate" class="form-control w-100"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>عدد حالات عدم المطابقة:</label>
                                            <input type="text" name="nonConformities" min="0"
                                                id="nonConformities1" required class="form-control "
                                                placeholder="أدخل عدد حالات عدم المطابقة">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>عدد الملاحظات:</label>
                                            <input type="number" name="Observations" min="0" class="form-control "
                                                placeholder="أدخل عدد من الملاحظات" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>مرجع تقرير عدم المطابقة (إن وجد):</label>
                                            <input type="text" name="nonConfReport" class="form-control validate_number"
                                                placeholder="أدخل مرجع التقرير">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>إجراءات التدقيق:</label>
                                            <textarea name="AdutiActions" class="form-control" placeholder="أدخل إجراءات التدقيق" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تكرار التدقيق (أشهر):</label>
                                            <input type="number" min="1" max="12" name="dateFrequency"
                                                id="dateFrequency" class="form-control" placeholder="أدخل شهر التردد"
                                                required="required">
                                        </div>
                                    </div>
                                </div>

                                <hr />


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>1 - هل تم إدراج هذه العملية في دليل الجودة أو تعليمات العمل، وهل لا تزال
                                                ذات صلة؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" required value="Yes" name="qmsCorects">نعم                                                    
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="qmsCorects"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="qmsCorects"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل: (يرجى إدخال دليل:)</label>
                                            <input type="text" name="evidence" class="form-control"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>2 - هل يجري تنفيذ هذه العملية في دليل الجودة أو تعليمات العمل؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required
                                                        name="needExpactations">
                                                    نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required
                                                        name="needExpactations"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required
                                                        name="needExpactations"> لا ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" class="form-control" name="evidance2"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>3 - هل جرى تدريب جميع الموظفين المعنيين على هذه العملية، والاحتفاظ بسجلات
                                                التدريب؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction3"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction3"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction3"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" class="form-control" name="evidence3"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>4 - هل تتم مراقبة معلومات مؤشرات الأداء الأساسية الخاصة بهذه
                                                العملية؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction4"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction4"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction4"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" class="form-control" name="evidance4"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>5 - هل تم تحديد الأهداف والغايات المناسبة لهذه العملية خلال المراجعة
                                                الإدارية السابقة؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction5"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction5"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction5"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" class="form-control" name="evidence5"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>6 - هل تمت مراجعة الأهداف والغايات السابقة لهذه العملية؟ </label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction6"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction6"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction6"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" name="evidance7" class="form-control"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>7 - هل يراعى اتباع جميع الإجراءات الداعمة وتعليمات العمل ذات الصلة، ووفق
                                                المراجعة الصحيحة؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction7"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction7"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction7"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" name="evidance8" class="form-control"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>8 - هل تمت معايرة جميع الأجهزة التي تحتاج إلى معايرة في هذه العملية،
                                                وتسجيلها وتحديثها؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction9"> نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction9"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction9"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" name="evidance9" class="form-control"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>9 - هل تمت هذه العملية بشكل صحيح؟</label>
                                            <div class="kt-radio-list">
                                                <label class="kt-radio">
                                                    <input type="radio" value="Yes" required name="correction10">
                                                    نعم
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="No" required name="correction10"> لا
                                                    <span></span>
                                                </label>
                                                <label class="kt-radio">
                                                    <input type="radio" value="NA" required name="correction10"> لا
                                                    ينطبق
                                                    <span></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الدليل:</label>
                                            <input type="text" name="evidance10" class="form-control"
                                                placeholder="أدخل الأدلة:">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>إرفاق الدليل: <span class="text-danger"
                                                    style="color:#000 !important;">(jpeg, mp3, mp4, .xls,
                                                    doc)</span></label>
                                            {{-- <input name="attach_evidence" type="file" class="form-control"
                                                accept="all"> --}}
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput" class="input-file" name="attach_evidence" accept="all"/>
                                                <label for="fileInput" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> هل من مشكلات أو نقاط ينبغي الإشارة إليها؟ (يرجى إدخال أي مشكلات
                                                أخرى:)</label>
                                            <input type="text" name="any_issues" class="form-control"
                                                placeholder="أدخل أي مشاكل أخرى:">
                                        </div>
                                    </div>
                                </div>
                                <!--<button type="reset" onclick="processAuditFormclose()" class=" closeBtn btn btn-secondary">Cancel</button>-->
                                <button type="submit" class="submitBtn">إرسال</button>
                                <button type="reset"
                                    style="float: right;margin-right: 6px;border: none;background: #646c9a;color: #fff;padding: 8px 47px;border-radius: 5px;"
                                    class="btn btn-secondary" onclick="processAuditFormclose()">يلغي
                                </button>
                            </form>
                        </div>

                    </div>

                    <div class="procedure_div">
                        <div class="requirments_table_div">
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div class="table-responsive">
                                    <!--begin: Datatable -->
                                    <table style="width: auto;"
                                        class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
                                        id="kt_table_agent">
                                        <thead>
                                            <tr>
                                                <th style="width:auto;">معرف التدقيق</th>
                                                <th style="width:auto;">عملية التدقيق</th>
                                                <th style="width:auto;">مدقق حسابات</th>
                                                <th style="width:auto;">تاريخ مراجعة</th>
                                                <th style="width:auto;">عدد حالات عدم المطابقة
                                                </th>
                                                <th style="width:auto">عدد الملاحظات
                                                </th>
                                                <th style="width:auto">مرجع تقرير عدم المطابقة (إن أمكن)</th>
                                                <th style="width:auto">إجراءات التدقيق</th>
                                                <th style="width:auto;">تكرار التدقيق (أشهر).</th>
                                                <th style="width:auto;">مرفق</th>
                                                <th style="width:auto;">فعل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($audit as $data)
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $data->processAudit }}</td>
                                                    <td>{{ $data->auditor }}</td>

                                                    <td>{{ date('d/m/Y', strtotime($data->auditDate)) }}</td>
                                                    <td>{{ $data->nonConformities }}</td>
                                                    <td>{{ $data->Observations }}</td>
                                                    <td>{{ $data->nonConfReport }}</td>
                                                    <td>{{ $data->AdutiActions }}</td>
                                                    <td>{{ $data->dateFrequency }}</td>
                                                    <td>
                                                        @if (!empty($data->attach_evidence))
                                                            <a target="_blank"
                                                                href="{{ asset($data->attach_evidence) }}">منظر</a>
                                                        @else
                                                            لاتوجد بيانات
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                            title="Edit" onclick="getEid({{ $data }});"><span
                                                                class="svg-icon svg-icon-md"> <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <path
                                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                                        </path>
                                                                        <path
                                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            opacity="0.3"></path>
                                                                    </g>
                                                                </svg> </span>
                                                        </button>

                                                        <button class="btn btn-sm btn-clean btn-icon btn-con-md"
                                                            title="View" onclick="viewaudit({{ $data }});">
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x"> <span
                                                                    class="fa fa-eye"></span></span>
                                                        </button>

                                                        <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                            title="Delete"
                                                            onclick="deleteModal({{ $data }});"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <path
                                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                        fill="#5d78ff" fill-rule="nonzero"></path>
                                                                    <path
                                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                        fill="#5d78ff" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                        </button>


                                                        {{-- <button class="bi bi-printer btn btn-sm btn-clean btn-icon"
                                                            title="Print"
                                                            onclick="window.print();">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#5d78ff" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#5d78ff" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </button>                                                  --}}


                                                        {{-- <button class="btn btn-sm btn-clean btn-icon btn-con-md downlaodpdf" title="Download PDF">
                                                        <i class="fa fa-download"></i>
                                                    </button>       
                                                                                                                                                    --}}
                                                        <button data-processid="{{ $data->id }}"
                                                            class="btn btn-sm btn-clean btn-icon btn-con-md download-pdf"
                                                            title="Download PDF">
                                                            <i class="fa fa-download"></i>
                                                        </button>



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
                </div>
        </section>

        <!--End::Section-->
    </div>
    <div class="modal fade text-right" id="deleteRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">عملية الحذف</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('deleteProcess') }} " method="POST">
                        @csrf
                        <input type="hidden" name="id" value="" id="re_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="editProcessAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير تفاصيل العملية</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form action="{{ route('auditDelete') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="" id="id_feild" name="id">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Audit ID Number (See table below. For amendments only):</label>
                                    <input type="number" name="auditId" class="form-control"  placeholder="Enter Audit ID:">
                                </div>
                            </div> --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>العملية التي يتم تدقيقها:</label>
                                    
                                    {{-- <input type="text" name="processAudit" id="processAudit" class="form-control"
                                           placeholder="Enter Process / Work Instruction title" required> --}}
                                    <select name="processAudit" class="form-control">
                                        <option value="">حدد الخيار</option>
                                        <option value="إجراء الجودة 1 - عملية المبيعات">إجراء الجودة 1 - عملية المبيعات</option>
                                        <option value="إجراء الجودة 2 - عملية الشراء">إجراء الجودة 2 - عملية الشراء</option>
                                        <option value="إجراء الجودة 3 - تنفيذ بنود العقد">إجراء الجودة 3 - تنفيذ بنود العقد</option>
                                        <option value="إجراء الجودة 4 - عملية الكفاءة">إجراء الجودة 4 - عملية الكفاءة</option>
                                        <option value="تفاعل العملية">تفاعل العملية</option>
                                        @isset($workInstructionsData)
                                            @foreach($workInstructionsData as $item)
                                                <option value="{{$item->workinstruction}}">{{$item->workinstruction}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مدقق حسابات:</label>
                                    <input type="text" name="auditor" class="form-control"
                                        placeholder="أدخل اسم المراجع:" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ التدقيق (يوم/شهر/سنة):</label>
                                    <input type="date" max="31-12-2200" name="auditDate" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عدد حالات عدم المطابقة:</label>
                                    <input type="text" required name="nonConformities" min="0"
                                        id="nonConformities2" class="form-control "
                                        placeholder="أدخل عدد حالات عدم المطابقة">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عدد الملاحظات:</label>
                                    <input type="number" name="Observations" min="0" class="form-control "
                                        placeholder="أدخل عدد من الملاحظات" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مرجع تقرير عدم المطابقة (إن وجد):</label>
                                    <input type="text" name="nonConfReport" placeholder="أدخل مرجع التقرير:"
                                        class="form-control validate_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إجراءات التدقيق:</label>
                                    <textarea name="AdutiActions" class="form-control" placeholder="أدخل إجراءات التدقيق:" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تكرار التدقيق (أشهر):</label>
                                    <input type="number" min="1" max="12" name="dateFrequency"
                                        class="form-control" placeholder="أدخل عدم المطابقة:" required>
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>1 - هل تم إدراج هذه العملية في دليل الجودة أو تعليمات العمل، وهل لا تزال ذات
                                        صلة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" required name="qmsCorects"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" required name="qmsCorects"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" required name="qmsCorects"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: (يرجى إدخال دليل:)</label>
                                    <input type="text" name="evidence" class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>2 - هل يجري تنفيذ هذه العملية في دليل الجودة أو تعليمات العمل؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" required name="needExpactations"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" required name="needExpactations"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" required name="needExpactations"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> الدليل:</label>
                                    <input type="text" class="form-control" name="evidance2"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>3 - هل جرى تدريب جميع الموظفين المعنيين على هذه العملية، والاحتفاظ بسجلات
                                        التدريب؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" required name="correction3"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" required name="correction3"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" required name="correction3"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" name="evidence3"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>4 - هل تتم مراقبة معلومات مؤشرات الأداء الأساسية الخاصة بهذه العملية؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" required name="correction4"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" required name="correction4"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" required name="correction4"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" name="evidance4"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>5 -هل تم تحديد الأهداف والغايات المناسبة لهذه العملية خلال المراجعة الإدارية
                                        السابقة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" required name="correction5"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" required name="correction5"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" required name="correction5"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" name="evidence5"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>6 - هل تمت مراجعة الأهداف والغايات السابقة لهذه العملية؟ </label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" required name="correction6"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" required name="correction6"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" required name="correction6"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> الدليل:</label>
                                    <input type="text" name="evidance7" class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7 - هل يراعى اتباع جميع الإجراءات الداعمة وتعليمات العمل ذات الصلة، ووفق المراجعة
                                        الصحيحة؟</label>
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
                                    <label>الدليل:</label>
                                    <input type="text" name="evidance8" class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8 - هل تمت معايرة جميع الأجهزة التي تحتاج إلى معايرة في هذه العملية، وتسجيلها
                                        وتحديثها؟</label>
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
                                    <label>الدليل:</label>
                                    <input type="text" name="evidance9" class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>9 - هل تمت هذه العملية بشكل صحيح؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" value="Yes" name="correction10"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="No" name="correction10"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" value="NA" name="correction10"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" name="evidance10" class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق الدليل: <span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span>:</label>
                                    <input name="attach_evidence" type="file" class="form-control"
                                        accept="image/*,.doc, .docx,.txt,.pdf">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هل من مشكلات أو نقاط ينبغي الإشارة إليها؟ (يرجى إدخال أي مشكلات أخرى:)</label>
                                    <input type="text" name="any_issues" class="form-control"
                                        placeholder="أدخل أي مشاكل أخرى:">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">يغلق</button>
                        <button type="submit" class="btn btn-danger mx-2">تحديث</button>

                    </div>
                </form>
            </div>
        </div>
    </div>






    <div class="modal fade text-right" id="viewProcessAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تفاصيل</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="" id="id_feild" name="id">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>العملية قيد التدقيق:</label>
                                    <input disabled type="text" name="processAudit" class="form-control"
                                        placeholder="أدخل اسم العملية:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مدقق حسابات:</label>
                                    <input disabled type="text" name="auditor" class="form-control"
                                        placeholder="أدخل اسم المراجع:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ التدقيق (يوم/شهر/سنة):</label>
                                    <input disabled type="date" max="2999-12-31" name="auditDate"
                                        class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عدد حالات عدم المطابقة:</label>
                                    <input disabled type="number" name="nonConformities" required
                                        class="form-control  validate_number" id="nonConformities"
                                        placeholder="أدخل عدد من حالات عدم المطابقة" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عدد الملاحظات:</label>
                                    <input disabled type="number" name="Observations" min="0"
                                        class="form-control  validate_number" placeholder="أدخل عدد من الملاحظات"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مرجع تقرير عدم المطابقة (إن وجد):</label>
                                    <input disabled type="text" name="nonConfReport"
                                        class="form-control validate_number" placeholder="أدخل مرجع التقرير:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إجراءات التدقيق: </label>
                                    <textarea name="AdutiActions" class="form-control" placeholder="أدخل إجراءات التدقيق:" disabled></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تكرار التدقيق (أشهر):</label>
                                    <input type="number" min="1" max="12" name="dateFrequency"
                                        class="form-control" placeholder="أدخل عدم المطابقة:" disabled>
                                </div>
                            </div>
                        </div>



                        <hr />
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>1 - هل تم إدراج هذه العملية في دليل الجودة أو تعليمات العمل، وهل لا تزال ذات
                                        صلة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="qmsCorects"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="qmsCorects"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="qmsCorects"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل: (يرجى إدخال دليل:)</label>
                                    <input type="text" name="evidence" disabled class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>2 - هل يجري تنفيذ هذه العملية في دليل الجودة أو تعليمات العمل؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="needExpactations"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="needExpactations"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="needExpactations"> لا
                                            ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" disabled name="evidance2"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>3 - هل جرى تدريب جميع الموظفين المعنيين على هذه العملية، والاحتفاظ بسجلات
                                        التدريب؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction3"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction3"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction3"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" disabled name="evidence3"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>4 - هل تتم مراقبة معلومات مؤشرات الأداء الأساسية الخاصة بهذه العملية؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction4"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction4"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction4"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" disabled name="evidance4"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>5 - هل تم تحديد الأهداف والغايات المناسبة لهذه العملية خلال المراجعة الإدارية
                                        السابقة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction5"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction5"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction5"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" class="form-control" disabled name="evidence5"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>6 - هل تمت مراجعة الأهداف والغايات السابقة لهذه العملية؟ </label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction6"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction6"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction6"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" name="evidance7" disabled class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>7 - هل يراعى اتباع جميع الإجراءات الداعمة وتعليمات العمل ذات الصلة، ووفق المراجعة
                                        الصحيحة؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction7"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction7"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction7"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" name="evidance8" disabled class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>8 - هل تمت معايرة جميع الأجهزة التي تحتاج إلى معايرة في هذه العملية، وتسجيلها
                                        وتحديثها؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction9"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction9"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction9"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" name="evidance9" disabled class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>9 - هل تمت هذه العملية بشكل صحيح؟</label>
                                    <div class="kt-radio-list">
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="Yes" name="correction10"> نعم
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="No" name="correction10"> لا
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" disabled value="NA" name="correction10"> لا ينطبق
                                            <span></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:</label>
                                    <input type="text" disabled name="evidance10" class="form-control"
                                        placeholder="أدخل الأدلة:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الدليل:<span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span>:</label>
                                    <div class="evidence_attachemnt_div"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هل من مشكلات أو نقاط ينبغي الإشارة إليها؟</label>
                                    <input type="text" name="any_issues" disabled class="form-control"
                                        placeholder="أدخل أي مشاكل أخرى:">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">يغلق</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script>
       function getEid(data) 
        {
            console.log(data);
            if ($(".process_audit_from_div").is(":visible")) 
            {
                processAuditForm();
            }
            $("#id_feild").val(data.id);
            $("input[name='auditId']").val(data.auditId);

            $("textarea[name='AdutiActions']").val(data.AdutiActions);
            $("input[name='Observations']").val(data.Observations);
            $("input[name='auditDate']").val(data.auditDate);
            $("input[name='auditor']").val(data.auditor);
            $("input[name='dateFrequency']").val(data.dateFrequency);
            $("input[name='nonConfReport']").val(data.nonConfReport);
            $("input[name='nonConformities']").val(data.nonConformities);
            // $("select[name='processAudit']").val(data.processAudit);
            $("select[name='processAudit'] option").each(function() {
                if ($(this).val() === data.processAudit) {
                    $(this).prop("selected", true);
                } else {
                    $(this).prop("selected", false);
                }
            });
            $("input[name='any_issues']").val(data.any_issues);

            $("input[name='evidance2']").val(data.evidance2);
            $("input[name='evidance4']").val(data.evidance4);
            $("input[name='evidance7']").val(data.evidance7);
            $("input[name='evidance8']").val(data.evidance8);
            $("input[name='evidance9']").val(data.evidance9);
            $("input[name='evidance10']").val(data.evidance10);
            $("input[name='evidence']").val(data.evidence);
            $("input[name='evidence3']").val(data.evidence3);
            $("input[name='evidence5']").val(data.evidence5);


            $("input[name='correction3'][value=" + data.correction3 + "]").prop('checked', true);
            $("input[name='correction4'][value=" + data.correction4 + "]").prop('checked', true);
            $("input[name='correction5'][value=" + data.correction5 + "]").prop('checked', true);
            $("input[name='correction6'][value=" + data.correction6 + "]").prop('checked', true);
            $("input[name='correction7'][value=" + data.correction7 + "]").prop('checked', true);
            $("input[name='correction9'][value=" + data.correction9 + "]").prop('checked', true);
            $("input[name='correction10'][value=" + data.correction10 + "]").prop('checked', true);
            $("input[name='needExpactations'][value=" + data.needExpactations + "]").prop('checked', true);
            $("input[name='qmsCorects'][value=" + data.qmsCorects + "]").prop('checked', true);

            $("#editProcessAudit").modal('show');
        }

        function viewaudit(data) {
            console.log(data);
            if ($(".process_audit_from_div").is(":visible")) {
                processAuditForm();
            }
            $("#id_feild").val(data.id);
            $("input[name='auditId']").val(data.auditId);

            $("textarea[name='AdutiActions']").val(data.AdutiActions);
            $("input[name='Observations']").val(data.Observations);
            $("input[name='auditDate']").val(data.auditDate);
            $("input[name='auditor']").val(data.auditor);
            $("input[name='dateFrequency']").val(data.dateFrequency);
            $("input[name='nonConfReport']").val(data.nonConfReport);
            $("input[name='nonConformities']").val(data.nonConformities);
            $("input[name='processAudit']").val(data.processAudit);
            $("input[name='any_issues']").val(data.any_issues);

            $("input[name='evidance2']").val(data.evidance2);
            $("input[name='evidance4']").val(data.evidance4);
            $("input[name='evidance7']").val(data.evidance7);
            $("input[name='evidance8']").val(data.evidance8);
            $("input[name='evidance9']").val(data.evidance9);
            $("input[name='evidance10']").val(data.evidance10);
            $("input[name='evidence']").val(data.evidence);
            $("input[name='evidence3']").val(data.evidence3);
            $("input[name='evidence5']").val(data.evidence5);

            $("input[name='correction3'][value=" + data.correction3 + "]").prop('checked', true);
            $("input[name='correction4'][value=" + data.correction4 + "]").prop('checked', true);
            $("input[name='correction5'][value=" + data.correction5 + "]").prop('checked', true);
            $("input[name='correction6'][value=" + data.correction6 + "]").prop('checked', true);
            $("input[name='correction7'][value=" + data.correction7 + "]").prop('checked', true);
            $("input[name='correction9'][value=" + data.correction9 + "]").prop('checked', true);
            $("input[name='correction10'][value=" + data.correction10 + "]").prop('checked', true);
            $("input[name='needExpactations'][value=" + data.needExpactations + "]").prop('checked', true);
            $("input[name='qmsCorects'][value=" + data.qmsCorects + "]").prop('checked', true);
            if (data.attach_evidence) {
                $('.evidence_attachemnt_div').empty().append(
                    `<span class="text-dark">Click to view evidence <a target="_blank" href="${data.attach_evidence}">Here</a></span>`
                    );
            } else {
                $('.evidence_attachemnt_div').empty().append('No data found');
            }
            $("#viewProcessAudit").modal('show');
        }

        function deleteModal(data) {
            if ($(".process_audit_from_div").is(":visible")) {
                processAuditForm();
            }
            $("#re_id").val(data.id);
            $("#deleteRequirment").modal('show');

        }

        function processAuditForm() {
            $(".process_audit_from_div").toggle();
        }

        function processAuditFormclose() {
            $(".process_audit_from_div").hide();
        }

        $("#dateFrequency").on('keyup', function() {
            var value = parseInt($(this).val());
            if (value > 12) {
                $('#dateFrequency').val('');
            } else if (value < 0) {
                $('#dateFrequency').val('');
            }

        });
        $("#nonConformities2").on('keyup', function() {

            if (parseInt($("#nonConformities2").val()) >= 0) {

                $('#nonConformities2').val($("#nonConformities2").val());
            } else {
                $('#nonConformities2').val('');
            }
        });
        $("#nonConformities1").on('keyup', function() {

            if (parseInt($("#nonConformities1").val()) >= 0) {

                $('#nonConformities1').val($("#nonConformities1").val());
            } else {
                $('#nonConformities1').val('');
            }
        });



        $(document).on("click", ".download-pdf", function() {
            // process_id=this->processid;
            process_id = $(this).attr("data-processid");
            $.ajax({
                url: '/generate-pdf',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    process_id: process_id
                },
                success: function(response) {
                    window.open(response.url, '_blank');
                },
                error: function() {
                    console.error("Failed to generate PDF");
                }
            });
        });
    </script>
@endsection
