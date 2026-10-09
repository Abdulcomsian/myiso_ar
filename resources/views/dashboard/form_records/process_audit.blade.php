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
                    title="تدقيق العمليات" aria-label="تدقيق العمليات">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>تدقيق العمليات</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">

                                <a href="{{ asset('download_process_audit/Process-Audit.pdf') }}" target="_blank"
                                    class="am-btn am-btn-primary">تحميل عمليات التدقيق</a>

                                <a onclick="processAuditForm()" class="am-btn am-btn-primary"> إضافة تفاصيل تدقيق العملية</a>

                            </div>
                        </div>
                        <div class="process_audit_from_div">
                            <form action="{{ route('auditform') }}" method="POST" enctype="multipart/form-data"
                                class="addForm am-inline-form open" style="margin:16px 20px;">
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" required value="Yes" name="qmsCorects">نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="qmsCorects"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="qmsCorects"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required
                                                        name="needExpactations">
                                                    نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required
                                                        name="needExpactations"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required
                                                        name="needExpactations"> لا ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction3"> نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction3"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction3"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction4"> نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction4"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction4"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction5"> نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction5"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction5"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction6"> نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction6"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction6"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction7"> نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction7"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction7"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction9"> نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction9"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction9"> لا
                                                    ينطبق</label>
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
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="Yes" required name="correction10">
                                                    نعم</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="No" required name="correction10"> لا</label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" value="NA" required name="correction10"> لا
                                                    ينطبق</label>
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
                                                <input type="file" id="fileInput1" class="input-file" name="attach_evidence" accept="all"/>
                                                <label for="fileInput1" class="file-label">
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
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" class="am-btn am-btn-outline am-btn-sm" onclick="processAuditFormclose()">يلغي
                                    </button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> إرسال</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <div class="table-responsive">
                                    <!--begin: Datatable -->
                                    <table style="width: auto;"
                                        class="am-table"
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
                                            @forelse ($audit as $data)
                                                <?php $counter++; ?>
                                                <tr>
                                                    <td><span class="am-cell-sub">{{ $i++ }}</span></td>
                                                    <td><span class="am-cell-primary">{{ $data->processAudit }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->auditor }}</span></td>

                                                    <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->auditDate)) }}</span></td>
                                                    <td><span class="am-chip {{ ((int)$data->nonConformities) > 0 ? 'warning' : 'success' }}">{{ $data->nonConformities }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->Observations }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->nonConfReport }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->AdutiActions }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->dateFrequency }}</span></td>
                                                    <td>
                                                        @if (!empty($data->attach_evidence))
                                                            <a target="_blank"
                                                                href="{{ asset($data->attach_evidence) }}">منظر</a>
                                                        @else
                                                            لاتوجد بيانات
                                                        @endif
                                                    </td>
                                                    <td style="text-align:left;white-space:nowrap;">
                                                        <button class="am-icon-btn"
                                                            title="View" onclick="viewaudit({{ $data }});">
                                                            <i class="fa fa-eye"></i>
                                                        </button>

                                                        <button class="am-icon-btn"
                                                            title="Edit" onclick="getEid({{ $data }});"><i class="fa fa-pen"></i>
                                                        </button>

                                                        <button data-processid="{{ $data->id }}"
                                                            class="am-icon-btn download-pdf"
                                                            title="Download PDF">
                                                            <i class="fa fa-download"></i>
                                                        </button>


                                                        {{-- <button class="am-icon-btn bi bi-printer"
                                                            title="Print"
                                                            onclick="window.print();">
                                                        <i class="fa fa-trash"></i>
                                                    </button>                                                  --}}


                                                        {{-- <button class="am-icon-btn downlaodpdf" title="Download PDF">
                                                        <i class="fa fa-download"></i>
                                                    </button>       
                                                                                                                                                    --}}
                                                        <button class="am-icon-btn danger"
                                                            title="Delete"
                                                            onclick="deleteModal({{ $data }});"><i class="fa fa-trash"></i>
                                                        </button>



                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11">
                                                        <div class="am-empty">
                                                            <i class="fa fa-clipboard-list"></i>
                                                            <p>لم يتم تسجيل أي عمليات تدقيق للعمليات بعد.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <!--end: Datatable -->
                                </div>
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $audit])
                        </div>
                    </div>
                </div>
        </section>

        <!--End::Section-->
    </div>
    {{-- Page guide --}}
    @include('dashboard.form_records.partials.guides.process_audit')

    <div class="modal fade text-right" id="deleteRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عملية الحذف</h5>
                    </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('deleteProcess') }} " method="POST">
                        @csrf
                        <input type="hidden" name="id" value="" id="re_id">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="editProcessAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:1000px;" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل العملية</h5>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" required name="qmsCorects"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" required name="qmsCorects"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" required name="qmsCorects"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" required name="needExpactations"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" required name="needExpactations"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" required name="needExpactations"> لا
                                            ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" required name="correction3"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" required name="correction3"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" required name="correction3"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" required name="correction4"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" required name="correction4"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" required name="correction4"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" required name="correction5"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" required name="correction5"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" required name="correction5"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" required name="correction6"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" required name="correction6"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" required name="correction6"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" name="correction7"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" name="correction7"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" name="correction7"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" name="correction9"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" name="correction9"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" name="correction9"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="Yes" name="correction10"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="No" name="correction10"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" value="NA" name="correction10"> لا ينطبق</label>
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
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="attach_evidence" accept="image/*,.doc, .docx,.txt,.pdf">
                                        <label for="fileInput2" class="file-label">
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
                                    <label>هل من مشكلات أو نقاط ينبغي الإشارة إليها؟ (يرجى إدخال أي مشكلات أخرى:)</label>
                                    <input type="text" name="any_issues" class="form-control"
                                        placeholder="أدخل أي مشاكل أخرى:">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer am-modal__footer">
                        <button type="reset" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>

                    </div>
                </form>
            </div>
        </div>
    </div>






    <div class="modal fade text-right" id="viewProcessAudit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content ">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تفاصيل</h5>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="qmsCorects"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="qmsCorects"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="qmsCorects"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="needExpactations"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="needExpactations"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="needExpactations"> لا
                                            ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction3"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction3"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction3"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction4"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction4"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction4"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction5"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction5"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction5"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction6"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction6"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction6"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction7"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction7"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction7"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction9"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction9"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction9"> لا ينطبق</label>
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
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="Yes" name="correction10"> نعم</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="No" name="correction10"> لا</label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" disabled value="NA" name="correction10"> لا ينطبق</label>
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

                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>

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
