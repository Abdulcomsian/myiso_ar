@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>إضافة أو تعديل سجل معايرة </h2>
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
                                <p>المعايرة هي إعدادات الاختبار و/ أو مواضع المعلَمات التي تستهدف الآليات أو الأجهزة للتأكد من أنها تعمل
                                بالشكل الصحيح. وبالاعتماد على بيئة العمل، قد تكون هذه عبارة عن آليات ثقيلة أو طابعة مكتبية. </p>
                            </div>
                        </div>
                    </div>

                    <p>لإضافة سجل، يرجى النقر على زر "إضافة سجل معايرة". تتطلب جميع سجلات المعايرة معرفة عدد مرات المعايرة،
                        وتظهر هذه المعلومة كتذكير على لوحة التحكم الخاصة بك على MyISOOnline </p>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="calibrationForm()" class="am-btn am-btn-primary">إضافة سجل المعايرة</a>
                            </div>
                        </div>
                        <div class="calibration_from_div">
                            <form action="{{ route('calibration') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Calibration ID Number (See table below. For amendments only):</label><br>
                                            <input type="number" class="form-control" name="calibrationid" required="required">
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>اسم الجهاز: </label><br>
                                            <input type="text" class="form-control" name="equipment"
                                                placeholder="يرجى إدخال رقم تعريف العميل" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>الرقم التسلسلي: </label>
                                            <input type="text" class="form-control" name="serialNum"
                                                placeholder="يرجى إدخال اسم العميل" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>الموقع: </label>
                                            <input type="text" class="form-control" name="locaction"
                                                placeholder="يرجى إدخال عنوان العمل الكامل للعميل" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>مرجع طريقة الاختبار: </label>
                                            <input type="text" class="form-control" name="testMethod"
                                                placeholder="يرجى إدخال رقم هاتف العميل بادئًا برمز الدولة"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>معايير القبول: </label>
                                            <input type="text" class="form-control" name="acceptance"
                                                placeholder="يرجى إدخال عنوان البريد الإلكتروني للعميل" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تاريخ المعايرة: </label>
                                            <input type="date" max="2999-12-31" class="form-control"
                                                name="calibratedDate"
                                                placeholder="يرجى إدخال اسم جهة الاتصال الخاصة بالعميل" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم الشهادة: </label>
                                            <input type="text" class="form-control" name="certificatenumber"
                                                placeholder="يرجى إدخال رقم الشهادة" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>عدد مرات المعايرة (بالأشهر):</label>
                                            <input type="number" oninput="this.value = Math.abs(this.value)" min="1"
                                                max="12" name="freq" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>مراجع التقرير: </label>
                                            <input type="text" class="form-control" name="reportRev"
                                                placeholder="يرجى إدخال اسم مراجع التقرير" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
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

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>إرفاق الدليل: ملفات بصيغ : <span class="text-danger"
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
                                            <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ </label>
                                            <input type="text" name="issues_points"
                                                placeholder="أدخل أي مشكلات أو نقاط أخرى لملاحظة اسم الموظف" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="calibration()" class="am-btn am-btn-outline">يلغي
                                </button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>
                                <!--<button type="button"  class="am-btn am-btn-outline " style="margin-right:7px;">Cancel</button>-->
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
                                        @foreach ($calibration as $data)
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
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        استحقاق المعايرة</h5>
                                                                    <a data-dismiss="modal" aria-label="Close"><i
                                                                            class="fa fa-times" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        {{-- <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Calibration ID Number (See table below. For amendments only):</label><br>
                                                                            <input type="number" class="form-control" name="calibrationid" required="required">
                                                                        </div>
                                                                    </div> --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>اسم الجهاز:</label><br>
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
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
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">حذف الإدخال
                                                            </h5>
                                                            <a data-dismiss="modal" aria-label="Close"><i
                                                                    class="fa fa-times" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ url('/calibration_delete') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}" />
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">لا
                                                                </button>
                                                                <button type="submit" class="btn btn-danger">نعم</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

                    <div class="am-card m-t-20" style="padding:22px;margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
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
                                        @foreach ($calibration as $data)
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
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
        </section>

        <!--End::Section-->
    </div>
    <div class="modal fade text-right" id="deleteSupplier" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الإدخال</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editSupplier" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم الهوية:</label><br>
                                    <input type="number" class="form-control" placeholder="أدخل المعرف:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المورد:</label><br>
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
                                    <label>أي مشاكل أو نقاط أخرى يجب ملاحظتها:</label>
                                    <input type="text" name="issues_points"
                                        placeholder="Any other issues or points to Note" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="btn btn-danger">تحديث</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editcustomer_rev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير تفاصيل المعايرة</h5>
                    <a data-dismiss="modal"
                    aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>                                                                
                     </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('calibrationedit') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="" id="editproject">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Calibration ID Number (See table below. For amendments only):</label><br>
                                    <input type="number" class="form-control" name="calibrationid">
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>اسم الجهاز:</label><br>
                                    <input type="text" class="form-control" name="equipment"
                                        placeholder="أدخل اسم الجهاز:" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم سري:</label>
                                    <input type="text" class="form-control" name="serialNum"
                                        placeholder="أدخل الرقم التسلسلي:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> الموقع</label>
                                    <input type="text" class="form-control" name="locaction"
                                        placeholder="إدخال الدولة:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مرجع طريقة الاختبار:</label>
                                    <input type="text" class="form-control" name="testMethod"
                                        placeholder="أدخل مرجع طريقة الاختبار:" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>معايير القبول:</label>
                                    <input type="text" class="form-control" name="acceptance"
                                        placeholder="أدخل معايير القبول:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ المعايرة:</label>
                                    <input type="date" max="2999-12-31" class="form-control" name="calibratedDate"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم شهادة:</label>
                                    <input type="text" class="form-control" name="certificatenumber"
                                        placeholder="أدخل رقم الشهادة:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عدد مرات المعايرة :</label>
                                    <input type="number" oninput="this.value = Math.abs(this.value)" min="1"
                                        max="12" name="freq" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مراجع التقرير:</label>
                                    <input type="text" class="form-control" name="reportRev"
                                        placeholder="أدخل مراجع التقرير:" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق الدليل: <span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span></label>
                                    {{-- <input name="attach_evidence" type="file" class="form-control" accept="all"> --}}
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
                                    <label>أي مشاكل أو نقاط أخرى يجب ملاحظتها:</label>
                                    <input type="text" id="issues_points" name="issues_points"
                                        placeholder="أي مشاكل أو نقاط أخرى يجب ملاحظتها" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button type="button" class="am-btn am-btn-outline" data-dismiss="modal" aria-label="Close">يلغي</button>
                            <button type="submit" class="am-btn am-btn-primary ml-2">تحديث</button>
                        </div>
                    </form>
                </div>
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
