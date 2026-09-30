@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>إرشادات العمل</h2>
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
                                <p>يشار إلى تعليمات العمل أيضًا باسم العمليات. ويتم استخدامها كدليل خطوة بخطوة لكيفية إجراء نشاط في مكان العمل. ويجب استخدام هذا القسم لإنشاء أنشطة يتم تحديدها لاحقًا لإجراء عمليات تدقيق داخلية من عمليات تدقيق العمليات الخاصة بك. . إذا كنت تستخدم مستندات خارجية لهذا النظام، فلا بأس طالما تمت الإشارة إليها هنا. قم بذلك عن طريق تسجيل تفاصيل تعليمات العمل ووضع ملخص مختصر في قسم النطاق.</p>
                            </div>
                        </div>
                    </div>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="workInstructionFrom()" class="am-btn am-btn-primary">إضافة تعليمات العمل</a>
                            </div>
                        </div>
                        <div class="work_instruction_from_div">
                            <form action="{{ route('workinstructions') }} " method="POST" class="am-form">
                                @csrf
                                <div class="form-row">
                                    <div>

                                            <label>تعليمات العمل / عنوان العملية:</label><br>
                                            <input type="text" class="form-control" name="workinstruction" placeholder="إضافة تعليمات/عملية العمل"
                                                required="required">
                                    </div>
                                    <div>

                                            <label>الرقم المرجعي لإرشادات العمل:</label><br>
                                            <input type="text" class="form-control" name="instructionref"
                                                required="required">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>


                                            <label>الرقم التعريفي للموظف المُصدر لإرشادات العمل. يُستخرج هذا البيان من جدول
                                                الموظفين:</label>
                                            <select class="form-control" name="empId" required="required">
                                                <option value="">حدد الموظف</option>
                                                @foreach ($employess as $emp)
                                                    <option value="{{ $emp->id }}">{{ $emp->empNumber }}</option>
                                                @endforeach
                                            </select>
                                            <!--<input type="number" class="form-control" name="empId" required="required">-->
                                    </div>
                                    <div>

                                            <label>تاريخ الإصدار (شهر/يوم/سنة):</label>
                                            <input type="date" max="2999-12-31" class="form-control" name="issueDate"
                                                required="required">
                                    </div>
                                    <div>

                                            <label>حالة المراجعة:</label>
                                            <input type="text" class="form-control" name="revisionstatus"
                                                required="required">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:1/-1;">

                                            <label>النطاق:</label>
                                            <input type="text" class="form-control" name="scop" required="required">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>

                                            <label>النقطة 1:</label>
                                            <input type="text" class="form-control" name="point1">
                                    </div>
                                    <div>

                                            <label>النقطة 2:</label>
                                            <input type="text" class="form-control" name="point2">
                                    </div>
                                    <div>

                                            <label>النقطة 3:</label>
                                            <input type="text" class="form-control" name="point3">
                                    </div>
                                    <div>

                                            <label>النقطة 4:</label>
                                            <input type="text" class="form-control" name="point4">
                                    </div>
                                    <div>

                                            <label>النقطة 5:</label>
                                            <input type="text" class="form-control" name="point5">
                                    </div>
                                    <div>

                                            <label>النقطة 6:</label>
                                            <input type="text" class="form-control" name="point6">
                                    </div>
                                    <div>

                                            <label>النقطة 7:</label>
                                            <input type="text" class="form-control" name="point7">
                                    </div>
                                    <div>

                                            <label>النقطة 8:</label>
                                            <input type="text" class="form-control" name="point8">
                                    </div>
                                    <div>

                                            <label>النقطة 9:</label>
                                            <input type="text" class="form-control" name="point9">
                                    </div>
                                    <div>

                                            <label>النقطة 10:</label>
                                            <input type="text" class="form-control" name="point10">
                                    </div>
                                    <div>

                                            <label>النقطة 11:</label>
                                            <input type="text" class="form-control" name="point11">
                                    </div>
                                    <div>

                                            <label>النقطة 12:</label>
                                            <input type="text" class="form-control" name="point12">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:1/-1;">

                                            <label>جامع البيانات:</label>
                                            <input type="text" class="form-control" name="CompiledBy" required>
                                    </div>
                                </div>

                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" class="am-btn am-btn-outline" onclick="closeform();">يلغي</button>
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
                                            <th>الرقم التعريفي لإرشادات العمل</th>
                                            <th>اسم إرشادات العمل</th>
                                            <th>الرقم المرجعي لإرشادات العمل</th>
                                            <th>نطاق إرشادات العمل</th>
                                            <th>جامع البيانات:</th>
                                            <th>تاريخ الإصدار</th>
                                            <th>المراجعة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($work as $data)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $loop->index + 1 }}</span></td>
                                                <td><span class="am-cell-primary">{{ $data->workinstruction }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->instructionref }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->scop }}</span></td>
                                                @php
                                                    $employname = \App\Employee::where('id', $data->empid)->first();
                                                @endphp
                                                <td><span class="am-cell-sub">{{ isset($data->CompiledBy) ? $data->CompiledBy : '' }}</span></td>
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->issueDate)) }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->revisionstatus }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="View" onclick="getEid({{ $data }});"><i
                                                            class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="am-icon-btn"
                                                        title="Edit" onclick="editDetails({{ $data }});"><i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn"
                                                        data-toggle="modal"
                                                        data-target="#deleteworkinst{{ $data->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <div class="modal fade text-right"
                                                        id="deleteworkinst{{ $data->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف
                                                                        تعليمات العمل</h5>
                                                                    <a data-dismiss="modal" aria-label="Close"><i
                                                                            class="fa fa-times" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                                </div>
                                                                <div class="modal-footer am-modal__footer">
                                                                    <form action="{{ route('deleteWork') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <input type="hidden" value="{{ $data->id }}"
                                                                            name="id">
                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                                                                    </form>
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
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $work])
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
                                            <th>الرقم التعريفي للموظف</th>
                                            <th>اسم العائلة</th>
                                            <th>الاسم الأول</th>
                                            <!--<th>Employee Number</th>-->
                                            <th>تاريخ البدء</th>
                                            <th>التفاصيل الوظيفية</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--@php
                                            $n = 1;
                                            $userinfo = \App\Employee::get();
                                        @endphp-->
                                        @foreach ($employess as $item)
                                            <tr>
                                                <!--<td><span class="am-cell-sub">{{ $n }}</span></td>-->
                                                <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                                                <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>
                                                <!--<td> {$item->empNumber}</td>-->
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->startDate)) }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->jobdetails }}</span></td>
                                            </tr>
                                            <!--@php $n++; @endphp-->
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
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف تعليمات العمل</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('deleteWork') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="re_id" name="id">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="workinstructionsDetails" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تعليمات العمل</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('workinstructions') }} " method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان إرشادات العمل:</label><br>
                                    <input type="text" readyonly disabled class="form-control" name="workinstruction">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الرقم المرجعي لإرشادات العمل:</label><br>
                                    <input type="text" readyonly disabled class="form-control" name="instructionref">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الرقم التعريفي للموظف المُصدر لإرشادات العمل. يُستخرج هذا البيان من جدول
                                        الموظفين:</label>
                                    <!--<input type="number" readonly disabled class="form-control" name="empId">-->
                                    <select class="form-control" name="empId" required="required">
                                        <option value="">حدد الموظف</option>
                                        @foreach ($employess as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->empNumber }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ الإصدار (شهر/يوم/سنة):</label>
                                    <input type="date" readonly disabled class="form-control" name="issueDate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>حالة المراجعة:</label>
                                    <input type="text" readyonly disabled class="form-control" name="revisionstatus">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النطاق:</label>
                                    <input type="text" readyonly disabled class="form-control" name="scop">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 1:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point1">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 2:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 3:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point3">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 4:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 5:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point5">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 6:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point6">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 7:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point7">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 8:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point8">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 9:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point9">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 10:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point10">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 11:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point11">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>النقطة 12:</label>
                                    <input type="text" readyonly disabled class="form-control" name="point12">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>جامع البيانات:</label>
                                    <input type="text" readyonly disabled class="form-control" name="CompiledBy">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>

                </div>
            </div>
        </div>
    </div>



    {{-- work insturctions edit --}}

    <div class="modal fade text-right" id="editworkinstuction" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تعليمات العمل</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form action="{{ route('editworkinstructions') }} " method="POST">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" id="editit" name="id" value="">
                                                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                    <label>عنوان إرشادات العمل:</label><br>
                                    <input type="text" class="form-control" name="workinstruction">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                    <label>الرقم المرجعي لإرشادات العمل:</label><br>
                                    <input type="text" class="form-control" name="instructionref">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">


                                    <label>الرقم التعريفي للموظف المُصدر لإرشادات العمل. يُستخرج هذا البيان من جدول
                                        الموظفين:</label>
                                    <select class="form-control" name="empId" required="required">
                                        <option value="">حدد الموظف</option>
                                        @foreach ($employess as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->empNumber }}</option>
                                        @endforeach
                                    </select>
                                    <!--<input type="number" class="form-control" name="empId" required="required">-->
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>تاريخ الإصدار (شهر/يوم/سنة):</label>
                                    <input type="date" max="2999-12-31" class="form-control" name="issueDate">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>حالة المراجعة:</label>
                                    <input type="text" class="form-control" name="revisionstatus">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">

                                    <label>النطاق:</label>
                                    <input type="text" class="form-control" name="scop">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 1:</label>
                                    <input type="text" class="form-control" name="point1">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 2:</label>
                                    <input type="text" class="form-control" name="point2">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 3:</label>
                                    <input type="text" class="form-control" name="point3">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 4:</label>
                                    <input type="text" class="form-control" name="point4">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 5:</label>
                                    <input type="text" class="form-control" name="point5">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 6:</label>
                                    <input type="text" class="form-control" name="point6">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 7:</label>
                                    <input type="text" class="form-control" name="point7">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 8:</label>
                                    <input type="text" class="form-control" name="point8">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 9:</label>
                                    <input type="text" class="form-control" name="point9">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 10:</label>
                                    <input type="text" class="form-control" name="point10">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 11:</label>
                                    <input type="text" class="form-control" name="point11">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">

                                    <label>النقطة 12:</label>
                                    <input type="text" class="form-control" name="point12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">

                                    <label>جامع البيانات:</label>
                                    <input type="text" class="form-control" name="CompiledBy" required>
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
    function getEid(data) {
        // console.log(data);
        console.log(data);
        $("#id_feild").val(data.work_id);
        $("select[name='empId']").val(data.empId);
        //  $("input[name='empId']").val(data.empId);
        $("input[name='instructionref']").val(data.instructionref);
        $("input[name='issueDate']").val(data.issueDate);
        $("input[name='point1']").val(data.point1);
        $("input[name='point2']").val(data.point2);
        $("input[name='point3']").val(data.point3);
        $("input[name='point4']").val(data.point4);
        $("input[name='point5']").val(data.point5);
        $("input[name='point6']").val(data.point6);
        $("input[name='point7']").val(data.point7);
        $("input[name='point8']").val(data.point8);
        $("input[name='point9']").val(data.point9);
        $("input[name='point10']").val(data.point10);
        $("input[name='point11']").val(data.point11);
        $("input[name='point12']").val(data.point12);
        $("input[name='revisionstatus']").val(data.revisionstatus);
        $("input[name='scop']").val(data.scop);
        $("input[name='workinstruction']").val(data.workinstruction);
        $("input[name='CompiledBy']").val(data.CompiledBy);
        $("#workinstructionsDetails").modal('show');
    }

    function deleteModal(data) {
        $("#re_id").val(data.id);
        $("#deleteSupplier").modal('show');

    }

    function closeform() {
        $(".work_instruction_from_div").hide();
    }

    function editDetails(data) {
        console.log(data);
        $("#editit").val(data.id);
        $("select[name='empId']").val(data.empId);
        $("input[name='instructionref']").val(data.instructionref);
        $("input[name='issueDate']").val(data.issueDate);
        $("input[name='point1']").val(data.point1);
        $("input[name='point2']").val(data.point2);
        $("input[name='point3']").val(data.point3);
        $("input[name='point4']").val(data.point4);
        $("input[name='point5']").val(data.point5);
        $("input[name='point6']").val(data.point6);
        $("input[name='point7']").val(data.point7);
        $("input[name='point8']").val(data.point8);
        $("input[name='point9']").val(data.point9);
        $("input[name='point10']").val(data.point10);
        $("input[name='point11']").val(data.point11);
        $("input[name='point12']").val(data.point12);
        $("input[name='revisionstatus']").val(data.revisionstatus);
        $("input[name='scop']").val(data.scop);
        $("input[name='workinstruction']").val(data.workinstruction);
        $("input[name='CompiledBy']").val(data.CompiledBy);
        $("#editworkinstuction").modal('show');
    }
</script>
@endsection
