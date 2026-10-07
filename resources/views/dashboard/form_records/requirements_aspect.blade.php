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
            <div style="display:flex;align-items:center;gap:12px;">
                <button type="button" class="am-page-guide-btn"
                    data-toggle="modal" data-target="#amPageGuide"
                    title="المتطلبات المستحقة" aria-label="المتطلبات المستحقة">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>المتطلبات المستحقة</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                <a onclick="requirementFrom()" class="am-btn am-btn-primary">إضافة أحد المتطلبات</a>
                            </div>
                        </div>
                        <div class="requirments_from_div">

                            <form class="am-inline-form open" action="{{ route('requiemntform') }}" method="POST" style="margin:16px 20px;">
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
                                    <button onclick="requirementFrom()" type="reset" class="am-btn am-btn-outline am-btn-sm"> إلغاء </button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> إرسال</button>
                                </div>
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
                                            @forelse ($requirement as $data)
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
                                                        <button class="am-icon-btn"
                                                            title="View Customer Details" value="" o
                                                            data-toggle="modal" data-target="#model3"><i
                                                                class="fa fa-eye"></i>
                                                        </button>
    
                                                        <div class="modal fade" id="deleteRequirment_{{ $data->id }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" style="max-width:460px;" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header am-modal__header">
                                                                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                        <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف
                                                                            المتطلبات</h5>
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
                                                            <div class="modal-dialog" style="max-width:520px;" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header am-modal__header">
                                                                        <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                        <h5 class="modal-title am-modal__title" id="exampleModalLabel">
                                                                            المتطلبات المستحقة</h5>
    																	</div>
                                                                    <div class="modal-body">
    
                                                                        <div class="row">
                                                                            <input type="hidden" name="id"
                                                                                id="editproject" value="">
    
                                                                            {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>System ID Number:</label>
                                        <input type="number" readonly class="form-control"  name="systemid">
                                    </div>
                                </div> --}}
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label>اسم العائلة:</label>
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
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="am-empty">
                                                            <i class="fa fa-database"></i>
                                                            <p>لم تتم إضافة أي متطلبات بعد.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $requirement])
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
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">المتطلبات المطلوب تقديمها</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
                    <p style="margin:0 0 16px;">مفكرة تذكيرية للمهام التي تتكرر مرارًا وتكرارًا، مثل موعد المراجعة الإدارية، أو معايرة المعدات، أو تدريبات الطوارئ، أو عمليات التفتيش التي تجري كل بضعة أشهر. ما عليك سوى إضافة المهمة مرة واحدة، وإبلاغ النظام بمدى تكرارها، وسيقوم النظام بإعلامك بموعد استحقاقها.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">لماذا هذا مهم؟</h5>
                    <p style="margin:0 0 16px;">تُفقد معظم الشهادات بسبب نسيان شخص ما، وليس لأن الشركة كانت ترتكب أي أخطاء. يتم إجراء التدقيق عن بُعد، لذا لا يمكن للمراجع التجول في المكان والسؤال عن سير الأمور — وهذه القائمة هي الطريقة التي يرى بها المراجع أن المهام الروتينية يتم الوفاء بها. تظهر أي مهام متأخرة على لوحة التحكم الخاصة بك، لذا تتلقى التحذير قبل أن يتلقاه المراجع.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">انقر على «إضافة متطلب».</li>
                        <li style="margin-bottom:6px;">اكتب ما يجب القيام به، بعبارات يفهمها أي شخص في الشركة.</li>
                        <li style="margin-bottom:6px;">أدخل تاريخ آخر مرة تم فيها إنجاز المهمة، وعدد الأشهر المتبقية حتى موعد إنجازها مرة أخرى.</li>
                        <li style="margin-bottom:6px;">احفظ. سيظهر البند الآن على لوحة التحكم الخاصة بك ويتحول إلى "متأخر" إذا انقضى التاريخ المحدد.</li>
                        <li>تحقق من القائمة مرة واحدة على الأقل شهريًا، وقم بتحديث التاريخ في كل مرة يتم فيها إنجاز المهمة.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:560px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تعديل أحد المتطلبات.</h5>
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
