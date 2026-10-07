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
                    title="إضافة أو تعديل سجل معايرة" aria-label="إضافة أو تعديل سجل معايرة">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>إضافة أو تعديل سجل معايرة </h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                <a onclick="calibrationForm()" class="am-btn am-btn-primary">إضافة سجل المعايرة</a>
                            </div>
                        </div>
                        <div class="calibration_from_div">
                            <form class="am-inline-form open" action="{{ route('calibration') }} " method="POST" enctype="multipart/form-data" style="margin:16px 20px;">
                                @csrf
                                                                <div class="form-row">
                                    <div style="grid-column:1/-1;">
                                        <div class="form-group">
                                            <label>اسم الجهاز: </label>
                                            <input type="text" class="form-control" name="equipment"
                                                placeholder="يرجى إدخال رقم تعريف العميل" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>الرقم التسلسلي: </label>
                                            <input type="text" class="form-control" name="serialNum"
                                                placeholder="يرجى إدخال اسم العميل" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>الموقع: </label>
                                            <input type="text" class="form-control" name="locaction"
                                                placeholder="يرجى إدخال عنوان العمل الكامل للعميل" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>مرجع طريقة الاختبار: </label>
                                            <input type="text" class="form-control" name="testMethod"
                                                placeholder="يرجى إدخال رقم هاتف العميل بادئًا برمز الدولة"
                                                required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>معايير القبول: </label>
                                            <input type="text" class="form-control" name="acceptance"
                                                placeholder="يرجى إدخال عنوان البريد الإلكتروني للعميل" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ المعايرة: </label>
                                            <input type="date" max="2999-12-31" class="form-control"
                                                name="calibratedDate"
                                                placeholder="يرجى إدخال اسم جهة الاتصال الخاصة بالعميل" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>رقم الشهادة: </label>
                                            <input type="text" class="form-control" name="certificatenumber"
                                                placeholder="يرجى إدخال رقم الشهادة" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>عدد مرات المعايرة (بالأشهر):</label>
                                            <input type="number" oninput="this.value = Math.abs(this.value)" min="1"
                                                max="12" name="freq" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>مراجع التقرير: </label>
                                            <input type="text" class="form-control" name="reportRev"
                                                placeholder="يرجى إدخال اسم مراجع التقرير" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>اجتاز الاختبار أم فشل في اجتيازه:</label>
                                            <select name="sentence" class="form-control" required="required">
                                                <option value="">اختر واحدة</option>
                                                <option value="Pass"> اجتاز الاختبار</option>
                                                <option value="Fail"> فشل في اجتياز الاختبار </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>إرفاق الدليل: ملفات بصيغ : <span class="text-danger"
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
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ </label>
                                            <input type="text" name="issues_points"
                                                placeholder="أدخل أي مشكلات أو نقاط أخرى لملاحظة اسم الموظف" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Calibration ID Number (See table below. For amendments only):</label>
                                            <input type="number" class="form-control" name="calibrationid" required="required">
                                        </div>
                                    </div> --}}
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="calibration()" class="am-btn am-btn-outline am-btn-sm">يلغي
                                </button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm">يُقدِّم</button>
                                </div>
                                <!--<button type="button"  class="am-btn am-btn-outline " style="margin-right:7px;">Cancel</button>-->
                            </form>
                        </div>
                    </div>
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <div class="am-table-wrap">
                                    <table
                                        class="am-table"
                                        id="kt_table_agent">
                                        <thead>
                                            <tr>
                                                <th>المعايرة المستحقة </th>
                                                <!--<th>Equipment ID</th>-->
                                                <th>اسم الجهاز</th>
                                                <th>الرقم التسلسلي</th>
                                                <th>تاريخ المعايرة </th>
                                                <th>تاريخ تنفيذ المعايرة</th>
                                                <th>النشاط</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @forelse ($calibration as $data)
                                                <?php $counter++; ?>
    
    
                                                <tr>
                                                    <td><span class="am-cell-sub">{{ $counter }}</span></td>
                                                    <!--<td><span class="am-cell-sub">{{ $data->id }}</span></td>-->
                                                    <td><span class="am-cell-primary">{{ $data->equipment }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->serialNum }}</span></td>
                                                    <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->calibratedDate)) }}</span></td>
                                                    <!--<td><span class="am-cell-sub">{{ $data->calibratedDate }}</span></td>-->
                                                    @php $d = strtotime("+$data->freq months",strtotime($data->calibratedDate)); @endphp
                                                    <td><span class="am-chip info">{{ date('d/m/Y', $d) }}</span></td>
                                                    <td style="text-align:left;white-space:nowrap;">
                                                        <button onclick="viewRecord({{ json_encode($data) }});"
                                                            class="am-icon-btn" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                        <button class="am-icon-btn"
                                                            title="Edit" value=""
                                                            onclick="getEid({{ $data }});"><i class="fa fa-pen"></i>
                                                        </button>
                                                        <!-- new  -->
                                                        <button type="button" class="am-icon-btn danger" title="حذف" data-toggle="modal"
                                                            data-target="#deleteCalibrat_{{ $data->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
    
    
                                                        <!-- Modal -->
                                                        <div class="modal fade text-right" id="viewCalibration"
                                                            tabindex="-1" role="dialog" aria-labelledby="model3Label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" style="max-width:820px;" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header am-modal__header">
                                                                        <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                        <h5 class="modal-title am-modal__title" id="exampleModalLabel">
                                                                            استحقاق المعايرة</h5>
                                                                        </div>
                                                                    <div class="modal-body">
    
                                                                        <div class="row">
                                                                            {{-- <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Calibration ID Number (See table below. For amendments only):</label>
                                                                                <input type="number" class="form-control" name="calibrationid" required="required">
                                                                            </div>
                                                                        </div> --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>اسم الجهاز:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="equipment"
                                                                                        placeholder="أدخل اسم الجهاز:"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>الرقم التسلسلي:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="serialNum"
                                                                                        placeholder="أدخل الرقم التسلسلي:"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>الموقع:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="locaction"
                                                                                        placeholder="إدخال الدولة:"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>طريقة الاختبار:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="testMethod"
                                                                                        placeholder="أدخل مرجع طريقة الاختبار:"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>معايير القبول:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="acceptance"
                                                                                        placeholder="أدخل معايير القبول:"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>تاريخ المعايرة :</label>
                                                                                    <input type="date" max="2999-12-31"
                                                                                        class="form-control"
                                                                                        name="calibratedDate"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>رقم الشهادة:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="certificatenumber"
                                                                                        placeholder="أدخل رقم الشهادة:"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>عدد مرات المعايرة (بالأشهر):</label>
                                                                                    <input type="number"
                                                                                        oninput="this.value = Math.abs(this.value)"
                                                                                        min="1" max="12"
                                                                                        name="freq" class="form-control"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>مراجع التقرير: </label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="reportRev"
                                                                                        placeholder="يرجى إدخال اسم مراجع التقرير"
                                                                                        required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>اجتاز الاختبار أم فشل في
                                                                                        اجتيازه:</label>
                                                                                    <select name="sentence"
                                                                                        class="form-control"
                                                                                        required="required">
                                                                                        <option value="">اختر واحدة
                                                                                        </option>
                                                                                        <option value="Pass"> اجتاز الاختبار
                                                                                        </option>
                                                                                        <option value="Fail"> فشل في اجتياز
                                                                                            الاختبار </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>إرفاق الدليل: ملفات بصيغ <span
                                                                                            class="text-danger"
                                                                                            style="color:#000 !important;">(jpeg,
                                                                                            mp3, mp4, .xls, doc)</span>:</label>
                                                                                    <div class="evidence_attachemnt_div"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>أي مشاكل أو نقاط أخرى يجب
                                                                                        ملاحظتها:</label>
                                                                                    <input type="text" name="issues_points"
                                                                                        placeholder="أي مشاكل أو نقاط أخرى يجب ملاحظتها"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer am-modal__footer">
                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">يغلق
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
    
                                                </tr>
    
                                                <!--MODEL FOR DELETE-->
                                                <div class="modal fade text-right" id="deleteCalibrat_{{ $data->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" style="max-width:460px;" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header am-modal__header">
                                                                <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف الإدخال
                                                                </h5>
                                                                </div>
                                                            <div class="modal-body">
                                                                <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                            </div>
                                                            <div class="modal-footer am-modal__footer">
                                                                <form action="{{ url('/calibration_delete') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $data->id }}" />
                                                                    <button type="button" class="am-btn am-btn-outline"
                                                                        data-dismiss="modal">لا
                                                                    </button>
                                                                    <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="am-empty">
                                                            <i class="fa fa-tachometer-alt"></i>
                                                            <p>لم تتم إضافة أي سجلات معايرة بعد.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

                    <div class="am-card m-t-20" style="padding:22px;margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <div class="am-table-wrap">
                                    <table
                                        class="am-table"
                                        id="kt_table_agent">
                                        <thead>
                                            <tr>
                                                <th>رقم تعريف الجهاز</th>
                                                <th>اسم الجهاز</th>
                                                <th>الرقم التسلسلي</th>
                                                <th> الموقع</th>
                                                <th>طريقة الاختبار</th>
                                                <th>معايير القبول</th>
                                                <th>تاريخ المعايرة </th>
                                                <th>رقم الشهادة</th>
                                                <th>عدد مرات المعايرة </th>
                                                <th>المراجع </th>
                                                <th>الحكم </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 0; ?>
                                            @forelse ($calibration as $data)
                                                <?php $counter++; ?>
    
    
                                                <tr>
                                                    <td><span class="am-cell-sub">{{ $counter }}</span></td>
    
                                                    <td><span class="am-cell-primary">{{ $data->equipment }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->serialNum }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->locaction }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->testMethod }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->acceptance }}</span></td>
                                                    <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->calibratedDate)) }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->certificatenumber }}</span></td>
    
                                                    <td><span class="am-cell-sub">{{ $data->freq }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->reportRev }}</span></td>
                                                    <td><span class="am-chip {{ strtolower($data->sentence ?? '') === 'pass' ? 'success' : 'danger' }}">{{ $data->sentence }}</span></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11">
                                                        <div class="am-empty">
                                                            <i class="fa fa-tachometer-alt"></i>
                                                            <p>لم تتم إضافة أي سجلات معايرة بعد.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
        </section>

        <!--End::Section-->
    </div>
    {{-- Page guide --}}
    <div class="modal fade text-right" id="amPageGuide" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon am-page-guide-icon"><i class="fa fa-info-circle"></i></span>
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;">النماذج والسجلات</div>
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">المعايرة</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
                    <p style="margin:0 0 16px;">سجل لكل جهاز أو أداة قياس تتطلب الدقة، يوضح تاريخ آخر فحص لها، وما إذا كانت قد اجتازته أم لا، وموعد الفحص التالي.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما أهميته؟</h5>
                    <p style="margin:0 0 16px;">إذا كانت أجهزة القياس لديك غير دقيقة، فإن كل ما يُقاس بها سيكون غير دقيق أيضًا. وتظهر المعايرات المتأخرة والأجهزة التي لم تجتز الفحص على لوحة المعلومات، وتُشكّل جزءًا من أدلتك السنوية، ولذا يُعد هذا السجل من أسرع ما يمكن للمدقق عن بُعد التحقق منه.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">انقر على إضافة سجل معايرة.</li>
                        <li style="margin-bottom:6px;">أدخِل اسم الجهاز، ورقمه التسلسلي، ورقم شهادة المعايرة.</li>
                        <li style="margin-bottom:6px;">سجّل تاريخ المعايرة، وما إذا كان الجهاز قد اجتاز الفحص أم لا.</li>
                        <li style="margin-bottom:6px;">حدّد معدّل تكرار إعادة الفحص، وسيتولى النظام تتبّع موعد الاستحقاق وتنبيهك.</li>
                        <li>إذا لم يجتز أي جهاز الفحص، فأوقف استخدامه إلى أن يتم إصلاحه وإعادة فحصه.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="deleteSupplier" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف الإدخال</h5>
                    </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editSupplier" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير المورد</h5>
                    </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم الهوية:</label>
                                    <input type="number" class="form-control" placeholder="أدخل المعرف:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المورد:</label>
                                    <input type="text" class="form-control" placeholder="أدخل اسم المورد:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان المورد:</label>
                                    <input type="text" class="form-control" placeholder="أدخل عنوان المورد:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مدينة:</label>
                                    <input type="text" class="form-control" placeholder="أدخل المدينة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مقاطعة أو الدولة:</label>
                                    <input type="text" class="form-control" placeholder="أدخل الدولة أو الولاية:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الرمز البريدي أو الرمز البريدي:</label>
                                    <input type="text" class="form-control" placeholder="أدخل رقم اتصال العميل:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>دولة:</label>
                                    <input type="text" class="form-control" placeholder="أدخل البلد">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هاتف المورد:</label>
                                    <input type="text" class="form-control" placeholder="أدخل رقم هاتف المورد:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>البريد الإلكتروني للمورد:</label>
                                    <input type="email" class="form-control"
                                        placeholder="أدخل البريد الإلكتروني للمورد:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم جهة اتصال المورد:</label>
                                    <input type="text" class="form-control" placeholder="أدخل رقم اتصال المورد:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>خدمة الموردين:</label>
                                    <input type="email" class="form-control" placeholder="أدخل خدمة المورد:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق الأدلة: <span class="text-danger" style="color:#000 !important;">(jpeg,
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>أي مشاكل أو نقاط أخرى يجب ملاحظتها:</label>
                                    <input type="text" name="issues_points"
                                        placeholder="Any other issues or points to Note" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editcustomer_rev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل المعايرة</h5>
                    </div>
                <form action="{{ route('calibrationedit') }} " method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="" id="editproject">
                                                <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>اسم الجهاز:</label>
                                    <input type="text" class="form-control" name="equipment"
                                        placeholder="أدخل اسم الجهاز:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>رقم سري:</label>
                                    <input type="text" class="form-control" name="serialNum"
                                        placeholder="أدخل الرقم التسلسلي:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label> الموقع</label>
                                    <input type="text" class="form-control" name="locaction"
                                        placeholder="إدخال الدولة:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>مرجع طريقة الاختبار:</label>
                                    <input type="text" class="form-control" name="testMethod"
                                        placeholder="أدخل مرجع طريقة الاختبار:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>معايير القبول:</label>
                                    <input type="text" class="form-control" name="acceptance"
                                        placeholder="أدخل معايير القبول:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>تاريخ المعايرة:</label>
                                    <input type="date" max="2999-12-31" class="form-control" name="calibratedDate"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>رقم شهادة:</label>
                                    <input type="text" class="form-control" name="certificatenumber"
                                        placeholder="أدخل رقم الشهادة:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>عدد مرات المعايرة :</label>
                                    <input type="number" oninput="this.value = Math.abs(this.value)" min="1"
                                        max="12" name="freq" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>مراجع التقرير:</label>
                                    <input type="text" class="form-control" name="reportRev"
                                        placeholder="أدخل مراجع التقرير:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>اجتاز الاختبار أم فشل في اجتيازه:</label>
                                    <select name="sentence" class="form-control" required="required" id="sentence">
                                        <option value="">اختر واحدة</option>
                                        <option value="Pass"> اجتاز الاختبار</option>
                                        <option value="Fail"> فشل في اجتياز الاختبار </option>
                                    </select>
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
                                        <input type="file" id="fileInput3" class="input-file" name="attach_evidence" accept="all"/>
                                        <label for="fileInput3" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>أي مشاكل أو نقاط أخرى يجب ملاحظتها:</label>
                                    <input type="text" id="issues_points" name="issues_points"
                                        placeholder="أي مشاكل أو نقاط أخرى يجب ملاحظتها" class="form-control" />
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Calibration ID Number (See table below. For amendments only):</label>
                                    <input type="number" class="form-control" name="calibrationid">
                                </div>
                            </div> --}}
                    </div>
                    <div class="modal-footer am-modal__footer">
                            <button type="button" class="am-btn am-btn-outline" data-dismiss="modal" aria-label="Close">يلغي</button>
                            <button type="submit" class="am-btn am-btn-primary ml-2">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    function getEid(data) {
        console.log(data);
        $("#editproject").val(data.id);
        $("input[name='testMethod']").val(data.testMethod);
        $("input[name='serialNum']").val(data.serialNum);
        $("input[name='issues_points']").val(data.issues_points);

        $("select[name='sentence']").val(data.sentence);
        $("#sentence").val(data.sentence);
        $("#issues_point").val(data.issues_point);

        $("input[name='reportRev']").val(data.reportRev);
        $("input[name='locaction']").val(data.locaction);
        $("input[name='freq']").val(data.freq);
        $("input[name='equipment']").val(data.equipment);
        $("input[name='certificatenumber']").val(data.certificatenumber);
        $("input[name='calibrationid']").val(data.calibrationid);
        $("input[name='calibratedDate']").val(data.calibratedDate);
        $("input[name='acceptance']").val(data.acceptance);
        $("#editcustomer_rev").modal('show');
    }

    function viewRecord(data) {
        console.log(data);
        $("#editproject").val(data.id);
        $("input[name='testMethod']").val(data.testMethod);
        $("input[name='serialNum']").val(data.serialNum);
        $("input[name='issues_points']").val(data.issues_points);
        $("select[name='sentence']").val(data.sentence);
        $("#sentence").val(data.sentence);

        $("input[name='reportRev']").val(data.reportRev);
        $("input[name='locaction']").val(data.locaction);
        $("input[name='freq']").val(data.freq);
        $("input[name='equipment']").val(data.equipment);
        $("input[name='certificatenumber']").val(data.certificatenumber);
        $("input[name='calibrationid']").val(data.calibrationid);
        $("input[name='calibratedDate']").val(data.calibratedDate);
        $("input[name='acceptance']").val(data.acceptance);
        if (data.attach_evidence) {
            $('.evidence_attachemnt_div').empty().append(
                `<span class="text-dark">Click to view evidence <a target="_blank" href="${data.attach_evidence}">Here</a></span>`
                );
        } else {
            $('.evidence_attachemnt_div').empty().append('No data found');
        }
        $("#viewCalibration").modal('show');

    }

    function calibration() {

        if ($(".calibration_from_div").css("display") === "block") {
            $(".calibration_from_div").css("display", "none");
        } else {
            $(".calibration_from_div").css("display", "block");
        }
    }
</script>
@endsection
