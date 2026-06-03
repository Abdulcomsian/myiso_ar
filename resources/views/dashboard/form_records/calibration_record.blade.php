@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>إضافة أو تعديل سجل معايرة </h2>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row text-right">
                <div class="col-lg-12">
                    <p>المعايرة هي إعدادات الاختبار و/ أو مواضع المعلَمات التي تستهدف الآليات أو الأجهزة للتأكد من أنها تعمل
                        بالشكل الصحيح. وبالاعتماد على بيئة العمل، قد تكون هذه عبارة عن آليات ثقيلة أو طابعة مكتبية. </p>

                    <p>لإضافة سجل، يرجى النقر على زر "إضافة سجل معايرة". تتطلب جميع سجلات المعايرة معرفة عدد مرات المعايرة،
                        وتظهر هذه المعلومة كتذكير على لوحة التحكم الخاصة بك على MyISOOnline </p>
                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="calibrationForm()" class="addBtn">إضافة سجل المعايرة</a>
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
                                <button type="submit" class="submitBtn">يُقدِّم</button>
                                <button type="reset" onclick="calibration()" class="submitBtn"
                                    style="margin-right: 7px;">يلغي
                                </button>
                                <!--<button type="button"  class="btn btn-secondary submitBtn " style="margin-right:7px;">Cancel</button>-->
                            </form>
                        </div>
                    </div>
                    <div class="procedure_div">
                        <div class="requirments_table_div">
                            <h4>استحقاق المعايرة</h4>
                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table
                                    class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
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
                                                <td> {{ $counter }}</td>
                                                <!--<td>{{ $data->id }}</td>-->
                                                <td>{{ $data->equipment }}</td>
                                                <td>{{ $data->serialNum }}</td>
                                                <td>{{ date('d/m/Y', strtotime($data->calibratedDate)) }}</td>
                                                <!--<td>{{ $data->calibratedDate }}</td>-->
                                                @php $d = strtotime("+$data->freq months",strtotime($data->calibratedDate)); @endphp
                                                <td>{{ date('d/m/Y', $d) }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="Edit" value=""
                                                        onclick="getEid({{ $data }});"><span
                                                            class="svg-icon svg-icon-md"> <span
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
                                                    <button data-toggle="modal"
                                                        data-target="#deleteCalibrat_{{ $data->id }}"
                                                        style="top: -2px;position: relative;border: none !important;background: transparent !important;">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
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
                                                            </svg> </span>
                                                    </button>
                                                    <!-- new  -->
                                                    <button onclick="viewRecord({{ json_encode($data) }});"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                        <i class="fa fa-eye"></i>
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

                    <div class="procedure_div m-t-20">
                        <div class="requirments_table_div">
                            <h4>إجمالي البنود المدرجة </h4>
                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table
                                    class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
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
                                                <td> {{ $counter }}</td>

                                                <td>{{ $data->equipment }}</td>
                                                <td>{{ $data->serialNum }}</td>
                                                <td>{{ $data->locaction }}</td>
                                                <td>{{ $data->testMethod }}</td>
                                                <td>{{ $data->acceptance }}</td>
                                                <td>{{ date('d/m/Y', strtotime($data->calibratedDate)) }}</td>
                                                <td>{{ $data->certificatenumber }}</td>

                                                <td>{{ $data->freq }}</td>
                                                <td>{{ $data->reportRev }}</td>
                                                <td>{{ $data->sentence }}</td>
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
                        <button type="submit" class="submitBtn ml-2">تحديث</button>
                        <button type="button" class="submitBtn" data-dismiss="modal" aria-label="Close">يلغي</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
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
