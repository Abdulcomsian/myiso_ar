@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>تقييمات مخاطر الحوادث</h2>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
                        <div style="display:flex;gap:12px;align-items:flex-start;">
                            <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;">
                                <i class="fa fa-info-circle"></i>
                            </span>
                            <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                                <h5>النطاق:</h5>
                                <p>يتضمن هذا الإجراء تفاصيل حول السيناريوهات المحتملة لوقوع حوادث، ويجري مقارنة للمخاطر أو العواقب
                                المترتبة على وقوع مثل هذه الحوادث. </p>
                            </div>
                        </div>
                    </div>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="accidentRiskForm()" class="am-btn am-btn-primary">إضافة تقييم مخاطر وقوع حوادث</a>
                            </div>
                        </div>
                        <div class="accident_risk_from_div">
                            <form method="POST" action="{{ route('accident_risk') }}" enctype="multipart/form-data">
                                @csrf
                                                                <div class="form-row">
                                    <div style="grid-column:1/-1;">
                                        <div class="form-group">
                                            <label>سيناريو – صِف النشاط</label><br>
                                            <input type="text" class="form-control" placeholder="أدخل النشاط" required
                                                name="activityscenario">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>احتمالية وقوع السيناريو – يرجى إدخال رقم بين 1 – 6 (بحيث يشير الرقم 6 إلى
                                                الاحتمالية الأعلى)</label><br>
                                            <input type="number" class="form-control" min="1" max="6"
                                                required name="risklikehood" placeholder="أدخل الاحتمالية"
                                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>شدة الخطر – يرجى إدخال رقم بين 1 -6 (بحيث يشير الرقم 6 إلى الشدة
                                                الأعلى)</label>
                                            <input type="number" min="1" max="6" required
                                                class="form-control" name="riskseverity" placeholder="أدخل الخطورة:"
                                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>ما الذي قد يحدث بشكل خاطئ؟</label>
                                            <input type="text" class="form-control" placeholder="أدخل النتيجة المحتملة:"
                                                required name="envaccident" placeholder="">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>ما الذي قد يتأثر؟</label>
                                            <input type="text" class="form-control" placeholder="إدخال الدولة" required
                                                name="envaccidental">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>ما هي العواقب المترتبة على هذا الحادث؟ </label>
                                            <input type="text" class="form-control" placeholder="أدخل العواقب المحتملة"
                                                required name="consequences">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>ما الذي قد يحول دون وقوع الحادث أو يخفف من خطر وقوعه؟ :</label>
                                            <input type="text" class="form-control" required
                                                placeholder="أدخل الحلول الوقائية" name="reducerisk">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>الاحتمالية المعدلة لوقوع السيناريو بعد خطوة المنع - يرجى إدخال رقم بين 1
                                                -6 (بحيث يشير الرقم 6 إلى الاحتمالية الأعلى)</label>
                                            <input type="number" class="form-control" required min="1"
                                                max="6" name="revisedrisk" placeholder="أدخل مستوى جديد منخفض المخاط"
                                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>شدة خطر وقوع الحادث المعدلة بعد خطوة المنع - يرجى إدخال رقم بين 1 -6
                                                (بحيث يشير الرقم 6 إلى الأعلى شدة)</label>
                                            <input type="number" class="form-control" required min="1"
                                                max="6" name="reviseRiskSever"
                                                placeholder="أدخل مستوى خطورة منخفض جديد"
                                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
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
                                    <div>
                                        <div class="form-group">
                                            <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ </label>
                                            <textarea name="any_issues" class="form-control" placeholder="أدخل أي مشاكل أخرى:"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="accidentRiskForm()" class="am-btn am-btn-outline">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table
                                    class="am-table"
                                    id="kt_table_agent">
                                    <thead>
                                        <tr>
                                            <th>السيناريو</th>
                                            <!--<th>Detail View</th>-->
                                            <th>النشاط </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($audit as $data)
                                            <tr>
                                                <td><span class="am-cell-primary">{{ $data->activityscenario }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;"> <button onclick="getDetails({{ json_encode($data) }})"
                                                        class="am-icon-btn" title="View"
                                                        value=""><i class="fa fa-eye"></i>
                                                    </button>

                                                    <button onclick="Editinfo({{ json_encode($data) }})"
                                                        class="am-icon-btn" title="Edit"
                                                        value=""><i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn danger"
                                                        title="Delete" onclick="deleteModal({{ $data }});"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                                <!--<td> </td>-->
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">
                                                    <div class="am-empty">
                                                        <i class="fa fa-first-aid"></i>
                                                        <p>لم يتم تسجيل أي تقييمات لمخاطر الحوادث بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $audit])
                        </div>
                    </div>
    </section>



        <!--End::Section-->
    </div>
    <div class="modal fade text-right" id="deleteRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف مخاطر الحوادث</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('deleteRisk') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="" id="idform">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تقييمات مخاطر الحوادث</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>سيناريو – صِف النشاط:</label><br>
                                    <input type="text" class="form-control" required name="activityscenario">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>احتمالية وقوع السيناريو – يرجى إدخال رقم بين 1 – 6 (بحيث يشير الرقم 6 إلى
                                        الاحتمالية الأعلى):</label><br>
                                    <input type="number" class="form-control" min="1" max="6" required
                                        name="risklikehood"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>شدة الخطر – يرجى إدخال رقم بين 1 -6 (بحيث يشير الرقم 6 إلى الشدة الأعلى):</label>
                                    <input type="number" class="form-control" required name="riskseverity"
                                        min="1" max="6" placeholder="أدخل اجتماع مراجعة الإدارة:"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما الذي قد يحدث بشكل خاطئ؟</label>
                                    <input type="text" class="form-control" required name="envaccident"
                                        placeholder="أدخل مراجعة الاجتماع السابق:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما الذي قد يتأثر؟</label>
                                    <input type="text" class="form-control" required name="envaccidental">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما هي العواقب المترتبة على هذا الحادث؟ :</label>
                                    <input type="text" class="form-control" required name="consequences">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما الذي قد يحول دون وقوع الحادث أو يخفف من خطر وقوعه؟ </label>
                                    <input type="text" class="form-control" required name="reducerisk">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الاحتمالية المعدلة لوقوع السيناريو بعد خطوة المنع - يرجى إدخال رقم بين 1 -6 (بحيث
                                        يشير الرقم 6 إلى الاحتمالية الأعلى)</label>
                                    <input type="number" class="form-control" min="1" max="6" required
                                        name="revisedrisk"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>شدة خطر وقوع الحادث المعدلة بعد خطوة المنع - يرجى إدخال رقم بين 1 -6 (بحيث يشير
                                        الرقم 6 إلى الأعلى شدة):</label>
                                    <input type="number" class="form-control" min="1" required max="6"
                                        name="reviseRiskSever"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إرفاق الدليل <span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span>:</label>
                                    <div class="evidence_attachemnt_div"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ </label>
                                    <textarea name="any_issues" class="form-control" placeholder="أدخل أي مشاكل أخرى:"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editmodalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تقييمات مخاطر الحوادث</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form action="{{ route('accidentedit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="editrisk" name="id" value="">

                                                <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>سيناريو – صِف النشاط</label><br>
                                    <input type="text" class="form-control" required name="activityscenario">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>احتمالية وقوع السيناريو – يرجى إدخال رقم بين 1 – 6 (بحيث يشير الرقم 6 إلى
                                        الاحتمالية الأعلى)</label><br>
                                    <input type="number" class="form-control validate_number" min="1"
                                        max="6" required name="risklikehood"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>شدة الخطر – يرجى إدخال رقم بين 1 -6 (بحيث يشير الرقم 6 إلى الشدة الأعلى):</label>
                                    <input type="number" class="form-control validate_number" required min="1"
                                        max="6" name="riskseverity" placeholder="أدخل اجتماع مراجعة الإدارة:"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما الذي قد يحدث بشكل خاطئ؟</label>
                                    <input type="text" class="form-control" required name="envaccident"
                                        placeholder="أدخل مراجعة الاجتماع السابق:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما الذي قد يتأثر؟</label>
                                    <input type="text" class="form-control" required name="envaccidental">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما هي العواقب المترتبة على هذا الحادث؟ :</label>
                                    <input type="text" class="form-control" required name="consequences">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ما الذي قد يحول دون وقوع الحادث أو يخفف من خطر وقوعه؟ :</label>
                                    <input type="text" class="form-control" required name="reducerisk">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الاحتمالية المعدلة لوقوع السيناريو بعد خطوة المنع - يرجى إدخال رقم بين 1 -6 (بحيث
                                        يشير الرقم 6 إلى الاحتمالية الأعلى)</label>
                                    <input type="number" class="form-control validate_number" min="1" required
                                        max="6" required name="revisedrisk"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>شدة خطر وقوع الحادث المعدلة بعد خطوة المنع - يرجى إدخال رقم بين 1 -6 (بحيث يشير
                                        الرقم 6 إلى الأعلى شدة):</label>
                                    <input type="number" class="form-control validate_number" min="1" required
                                        max="6" name="reviseRiskSever"
                                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إرفاق الدليل: <span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span></label>
                                    {{-- <input name="attach_evidence" type="file" class="form-control" accept="all"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="attach_evidence" accept="all"/>
                                        <label for="fileInput2" class="file-label">
                                          <span class="file-text">اختيار الملف</span>
                                          <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ </label>
                                    <textarea name="any_issues" class="form-control" placeholder="أدخل أي مشاكل أخرى:"></textarea>
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
    {{-- editmodalData --}}


<script>
    function getDetails(data) {
        console.log(data);
        $("#id_feild").val(data.id);
        $("input[name='riskseverity']").val(data.riskseverity);
        $("input[name='risklikehood']").val(data.risklikehood);
        $("input[name='revisedrisk']").val(data.revisedrisk);
        $("input[name='reviseRiskSever']").val(data.reviseRiskSever);
        $("input[name='reducerisk']").val(data.reducerisk);
        $("input[name='envaccidental']").val(data.envaccidental);
        $("input[name='envaccident']").val(data.envaccident);
        $("input[name='consequences']").val(data.consequences);
        $("input[name='activityscenario']").val(data.activityscenario);
        $("textarea[name='any_issues']").val(data.any_issues);
        if (data.attach_evidence) {
            $('.evidence_attachemnt_div').empty().append(
                `<span class="text-dark">Click to view evidence <a target="_blank" href="${data.attach_evidence}">Here</a></span>`
                );
        } else {
            $('.evidence_attachemnt_div').empty().append('No data found');
        }
        $("#editInfo").modal('show');

    }

    function Editinfo(data) {
        $("#editrisk").val(data.id);
        $("input[name='riskseverity']").val(data.riskseverity);
        $("input[name='risklikehood']").val(data.risklikehood);
        $("input[name='revisedrisk']").val(data.revisedrisk);
        $("input[name='reviseRiskSever']").val(data.reviseRiskSever);
        $("input[name='reducerisk']").val(data.reducerisk);
        $("input[name='envaccidental']").val(data.envaccidental);
        $("input[name='envaccident']").val(data.envaccident);
        $("input[name='consequences']").val(data.consequences);
        $("input[name='activityscenario']").val(data.activityscenario);
        $("textarea[name='any_issues']").val(data.any_issues);
        $("#editmodalData").modal('show');
    }

    function deleteModal(data) {
        console.log(data);
        $("#idform").val(data.id);
        $("#deleteRequirment").modal('show');

    }
</script>
@endsection
