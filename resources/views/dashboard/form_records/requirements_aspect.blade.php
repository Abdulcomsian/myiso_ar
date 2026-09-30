@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <style>
        th {
            text-align: center;
        }
    </style>
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>المتطلبات المستحقة</h2>
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
                                <p>يمكن اعتبار هذا القسم كمفكرة تظهر في لوحة التحكم الخاصة بمنصة MyISOOnline الخاصة بك. ما عليك سوى
                                إضافة العناصر التي تحتاج إلى استدعائها بشكل منتظم، كما هو الحال عند استحقاق إجراء مراجعات على
                                الإدارة أو يكون إجراء تدقيقات على المعايرة مطلوبًا.</p>
                                <p>لإضافة متطلبات، انقر على "إضافة أحد المتطلبات" ثم أدخل المعلومات التي ترغب في تذكيرك بها واضبط تاريخ
                                التذكير باستخدام التقويم.</p>
                            </div>
                        </div>
                    </div>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="requirementFrom()" class="am-btn am-btn-primary">إضافة أحد المتطلبات</a>
                            </div>
                        </div>
                        <div class="requirments_from_div">

                            <form action="{{ route('requiemntform') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>المتطلبات: (أدخل المتطلبات:)</label>
                                    <input type="text" name="requirement" class="form-control"
                                        placeholder="أدخل المتطلبات:" required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> تاريخ استكمال متطلبات النشاط (يوم/شهر/سنة)</label>
                                            <input type="date" max="2999-12-31" name="completiondate" max="2999-12-31"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> التواتر الدوري (بالأشهر): (أدخل الأشهر:)</label>
                                            <input type="number" name="month" id="month"
                                                oninput="this.value = Math.abs(this.value)" min="1" max="12"
                                                class="form-control" placeholder="أدخل الأشهر:" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button onclick="requirementFrom()" type="reset" class="am-btn am-btn-outline"> إلغاء </button>
                                    <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> إرسال</button>
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
                                            <th> العدد.</th>
                                            <th> المتطلبات</th>
                                            <th>تاريخ الاستكمال</th>
                                            <th>التواتر الدوري (بالأشهر)</th>
                                            <th>تاريخ الاستحقاق</th>
                                            <th> الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $counter = 0; ?>
                                        @foreach ($requirement as $data)
                                            <?php $counter++; ?>
                                            <tr>

                                                <td><span class="am-cell-sub">{{ $counter }}</span></td>
                                                <td><span class="am-cell-primary">{{ $data->requirment_title }}</span></td>

                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->completion_date)) }}</span></td>
                                                <!--<td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->completion_date)) }}</span></td>-->
                                                <td><span class="am-cell-primary">{{ $data->periods }}</span></td>
                                                @php
                                                    $d = strtotime("+$data->periods months", strtotime($data->completion_date));

                                                @endphp
                                                @php $daysToDue = intval(($d - time()) / 86400); @endphp
                                                <td>
                                                    @if ($daysToDue < 0)
                                                        <span class="am-chip danger">{{ date('d/m/Y', $d) }}</span>
                                                    @elseif ($daysToDue < 30)
                                                        <span class="am-chip warning">{{ date('d/m/Y', $d) }}</span>
                                                    @else
                                                        <span class="am-chip success">{{ date('d/m/Y', $d) }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn mb-3"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal" data-target="#model3"><i
                                                            class="fa fa-eye"></i>
                                                    </button>

                                                    <div class="modal fade" id="deleteRequirment_{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف
                                                                        المتطلبات</h5>
																	<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																	</a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                                </div>
                                                                <div class="modal-footer am-modal__footer">
                                                                    <form action="{{ url('deleteRequirement/' . $data->id) }}"
                                                                        method="GET">
                                                                        @csrf
                                                                        <!---input type="text" name="id" value="" id="re_id"--->

                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="am-icon-btn" title="Edit"
                                                        value="{{ $data->requirment_id }}"
                                                        onclick="getEid({{ json_encode($data) }});">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <!-- new button -->
                                                    <!-- new  -->
                                                    <button type="button" class="am-icon-btn danger" title="حذف"
                                                        data-toggle="modal"
                                                        data-target="#deleteRequirment_{{ $data->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="model3" tabindex="-1" role="dialog"
                                                        aria-labelledby="model3Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">
                                                                        المتطلبات المستحقة</h5>
																	<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																	</a>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            id="editproject" value="">

                                                                        {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>System ID Number:</label><br>
                                    <input type="number" readonly class="form-control"  name="systemid">
                                </div>
                            </div> --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>اسم العائلة:</label><br>
                                                                                <input type="text" class="form-control"
                                                                                    name="surname"
                                                                                    placeholder="أدخل اللقب:">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>الاسم الأول:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="first_name"
                                                                                    placeholder="أدخل الاسم الأول:">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group edit-emp-number-div">
                                                                                <label>هوية الموظف:</label>
                                                                                <input type="text" name="empNumber"
                                                                                    required class="form-control"
                                                                                    data-type="edit">
                                                                                <!--                         <select name="empNumber" required class="form-control">-->
                                                                                <!--    <option>Select One</option>-->
                                                                                <!--    @if (isset($userinfo) && $userinfo != '')
    -->
                                                                                <!--    @foreach ($userinfo as $item)
    -->
                                                                                <!--    <option value="{{ $item->id }}" title="{{ $item->first_name }}">{{ $item->empNumber . ' (' . $item->first_name . ')' }}</option>-->
                                                                                <!--
    @endforeach-->
                                                                                <!--
    @endif-->
                                                                                <!--</select>-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>تاريخ البدء (YYYY/MM/DD):</label>
                                                                                <input name="startDate" max="2999-12-31"
                                                                                    type="date" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>تفاصيل الوظيفة:</label>
                                                                                <input type="text" name="jobdetails"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل تفاصيل الوظيفة:">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>تحميل السيرة الذاتية للموظف:</label>
                                                                                <div class="custom-file-input-tag form-control">
                                                                                    <input type="file" id="fileInput1" class="input-file" name="employee_cv" accept="image/*,.doc, .docx,.txt,.pdf">
                                                                                    <label for="fileInput1" class="file-label">
                                                                                        <span class="file-text">اختيار الملف</span>
                                                                                        <span class="file-chosen">لم يتم اختيار ملف</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer am-modal__footer">
                                                                    <button type="button" class="am-btn am-btn-outline"
                                                                        data-dismiss="modal">يغلق</button>
                                                                </div>
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
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $requirement])
                        </div>
                    </div>
                </div>
        </section>

        <!--End::Section-->
    </div>

    <div class="modal fade" id="editRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تعديل أحد المتطلبات.</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <form action="{{ route('updaterequiremnt') }}" method="POST">
                    <div class="modal-body text-right">
                        @csrf
                        <input type="hidden" name="requirment_id" value="" id="id_feild">
                        <div class="form-group">
                            <label>متطلبات:</label>
                            <input type="text" class="form-control" value="" name="requirment_title"
                                placeholder="أدخل المتطلبات:" required>
                        </div>
                        <div class="form-group">
                            <label>تاريخ اكتمال المتطلبات للنشاط (يوم/شهر/سنة):</label>
                            <input type="date" max="2999-12-31" max="2999-12-31" class="form-control" value=""
                                name="completion_date" placeholder="أدخل المتطلبات:" required>
                        </div>
                        <div class="form-group">
                            <label>الدورية (الأشهر):</label>
                            <input type="number" class="form-control" oninput="this.value = Math.abs(this.value)"
                                min="1" max="12" value="" name="periods" placeholder="أدخل الأشهر:"
                                required>
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
    function getEid(data) {

        $("#id_feild").val(data.id);
        $("input[name='periods']").val(data.periods);
        $("input[name='requirment_title']").val(data.requirment_title);
        $("input[name='completion_date']").val(data.completion_date);
        $("#editRequirment").modal('show');
    }

    function deleteModal(data) {
        $("#re_id").val(data.id);
        $("#deleteRequirment").modal('show');

    }
</script>
@endsection
