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
                    title="عدم المطابقة" aria-label="عدم المطابقة">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>عدم المطابقة</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                <a onclick="nonConformities()" class="am-btn am-btn-primary">إضافة عدم المطابقة</a>
                            </div>
                        </div>
                        <div class="non_conformities_from_div">
                            <form class="am-inline-form open" action=" {{ route('nonConfromForm') }} " method="POST" style="margin:16px 20px;">
                                @csrf
                                <input type="hidden" name="user_id2" id="user_id2" value="{{ $userid }}" />
                                                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>عدم الثقة الصغرى أو الكبرى:</label>
                                            <select name="minor_major" id="" class="form-control">
                                                <option value="">حدد الخيار</option>
                                                <option value="Minor">صغير</option>
                                                <option value="Major">رئيسي</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>فئة عدم المطابقة</label>
                                            <select name="supplier_data" class="form-control" required>
                                                <option value="">اختر</option>
                                                <option value="Employee">موظف</option>
                                                <option value="Supplier">مورّد</option>
                                                <option value="Customer">عميل</option>
                                                <option value="Equipment">معدات</option>
                                                <option value="Audit">تدقيق</option>
                                                <option value="Design">تصميم</option>
                                                <option value="Other">أخرى</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>رقم هوية المورد</label>
                                            @if ($no_customer == 1)
                                                <select onchange="get_customer(this)" class="form-control" required
                                                    name="customerID" id="customer_id">
                                                    <option value="">أدخل رقم هوية المورد:</option>

                                                </select>
                                            @else
                                                <select onchange="get_customer(this)" class="form-control" name="customerID"
                                                    id="customer_id">
                                                    <option value="">أدخل رقم هوية المورد:</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->idnumber }}">{{ $customer->idnumber }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>الموظف الذي أبلغ عن NCR</label>
                                            <input type="text" class="form-control employee_name" name="employee_name"
                                                placeholder="الموظف الذي أبلغ عن NCR">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>رقم هوية الموظف:</label>
                                            @if ($no_customer == 1)
                                                <select onchange="get_employee(this)" class="form-control" required
                                                    name="employee_id" id="employee_id">
                                                    <option value="">أدخل رقم هوية الموظف:</option>
                                                </select>
                                            @else
                                                <select onchange="get_employee(this)" class="form-control"
                                                    name="employee_id" id="employee_id">
                                                    <option value="">أدخل رقم هوية الموظف:</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->empNumber }}">
                                                            {{ $employee->empNumber }} </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>فئة السبب الرئيسي:</label>
                                            <select name="root_cause_category" class="form-control" required>
                                                <option value="Other"> أخرى</option>
                                                <option value="Planning"> التخطيط</option>
                                                <option value="Production"> الإنتاج</option>
                                                <option value="Non-liable"> غياب المسؤولية</option>
                                                <option value="Training"> التدريب</option>
                                                <option value="Management"> الإدارة</option>
                                                <option value="Human Factor"> العامل البشري</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>	وصف NCR </label>
                                            <input type="text" required class="form-control" name="description"
                                                placeholder="أدخل وصف NCR" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>السبب الرئيسي: </label>
                                            <input type="text" required class="form-control" name="rootCause"
                                                placeholder="أدخل السبب الرئيسي" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>الإجراء التصحيحي المباشر: </label>
                                            <input type="text" required class="form-control" name="immediateCorp"
                                                placeholder="أدخل الإجراء التصحيحي المباشر" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>الإجراء المناسب لمنع تكرار الخطأ: </label>
                                            <input type="text" required class="form-control" name="actionPrevent"
                                                placeholder="أدخل الإجراء (الإجراءات) المناسبة لمنع تكرار الخطأ" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>مدى فعالية الإجراء المناسب لمنع تكرار الخطأ: </label>
                                            <input type="text" required class="form-control" name="ActionRecurnce"
                                                placeholder="أدخل تفاصيل حول مدى فعالية الإجراء (الإجراءات) المناسبة لمنع تكرار الخطأ"
                                                required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ مراجعة فعالية الإجراء </label>
                                            <input type="date" required max="2999-12-31" class="form-control"
                                                name="effectiveDate" placeholder="الشهر/اليوم/السنة" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>الجهة التي أجرت المراجعة:</label>
                                            <input type="text" required class="form-control" name="reviewdBy"
                                                placeholder="الجهة التي أجرت المراجعة" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ تسجيل حالة عدم المطابقة (الشهر/اليوم/السنة):</label>
                                            <input type="date" required max="2999-12-31" class="form-control"
                                                name="dateNcR" placeholder="إدخال اسم" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ معالجة حالة عدم المطابقة :</label>
                                            <input type="date" required max="2999-12-31" class="form-control"
                                                name="dateNcP" placeholder="الشهر/اليوم/السنة" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>الوقت المتوقع لاستجابة العميل (بالأيام):</label>
                                            <input type="text"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                required class="form-control validate_number" name="CRE"
                                                placeholder="أدخل عدد الأيام" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تأثر المنتج (نعم أو لا):</label>

                                            <select name="PI" class="form-control" required>
                                                <option value="">تأثر المنتج</option>
                                                <option value="Yes">نعم</option>
                                                <option value="No">لا</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>إغلاق حالة عدم المطابقة (نعم أو لا):</label>
                                            <select name="NCR_closed" class="form-control">
                                                <option value=""></option>
                                                <option value="Yes">نعم</option>
                                                <option value="No">لا</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- customer comment --}}
                                {{-- <div class="col-lg-6">
                        <div class="form-group">
                            <label> Customer Name:</label>
                            <input type="text" required class="form-control customer_name" name="rootCause"
                                placeholder="Enter Customer Name">
                        </div>
                    </div> --}}
                                {{-- <div class="col-lg-6">
                        <div class="form-group">
                            <label>Employee ID Number:</label>

                            <select onchange="get_employee(this)" required class="form-control" name="employee_id"
                                id="employee_id">
                                <option value="" selected="selected" disabled="disabled">Enter Employee ID Number:</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->empNumber }}">{{ $employee->empNumber }}
                                        {{-- @dd($customer) --}}
                                {{-- </option> --}}
                                {{-- @endforeach --}}
                                {{-- </select> --}}
                                {{-- </div> --}}
                                {{-- </div> --}}

                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="nonConformities()" class="am-btn am-btn-outline am-btn-sm">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="am-card" style="margin-bottom:16px;">
        <div class="requirments_table_div">
            <div class="am-table-wrap">
                <!--begin: Datatable -->
                <div class="am-table-wrap">
                    <table class="am-table" id="kt_table_agent">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>58</td>
                                <td>Block Computing</td>
                                <td>Al Quasais, Unit 5, Dubai</td>
                                <td>0971 56 491 5517</td>
                                <td>B.Cmp@gmail.com</td>
                                <td>Mr Ahmed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end: Datatable -->
        </div>

    </div>

</div> --}}
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
                                                <th>رقم هوية NCR</th>
                                                <th>عدم الثقة الصغرى أو الكبرى:</th>
                                                <th>فئة عدم المطابقة</th>
                                                <th>رقم هوية المورد</th>
                                                <th>الموظف الذي أبلغ عن NCR</th>
                                                <th>رقم هوية الموظف</th>
                                                <th>وصف NCR</th>
                                                <th>فئة</th>
                                                <th>تاريخ تسجيل NCR</th>
    
                                                <th>فعل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse ($customers_nonconform as $data)
                                                <tr>
                                                    <td><span class="am-cell-sub">{{ $i++ }}</span></td>
                                                    <td>
                                                        @if ($data->non_confirm_status === 'Major')
                                                            <span class="am-chip danger">{{$data->non_confirm_status}}</span>
                                                        @elseif ($data->non_confirm_status === 'Minor')
                                                            <span class="am-chip warning">{{$data->non_confirm_status}}</span>
                                                        @else
                                                            <span class="am-cell-sub">{{$data->non_confirm_status}}</span>
                                                        @endif
                                                    </td>
                                                    <td><span class="am-cell-sub">{{ $data->supplier_data }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->customerID }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->employee_name }}</span></td> 
                                                    <td><span class="am-cell-sub">{{ $data->employee_id }}</span></td> 
                                                    <td><span class="am-cell-sub">{{ $data->description }}</span></td>
                                                    <td><span class="am-chip info">{{ $data->root_cause_category }}</span></td>
                                                    <td><span class="am-cell-sub">{{ $data->dateNcR }}</span></td>
                                                    <td style="text-align:left;white-space:nowrap;"> <button class="am-icon-btn"
                                                            title="View" value="{{ $data->customerID }}"
                                                            onclick="getEid({{ json_encode($data) }});">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                        @if ($data->non_confirm_status !== 'Major')
                                                        <button class="am-icon-btn"
                                                            title="Edit" onclick="EditData({{ json_encode($data) }});">
                                                            <i class="fa fa-pen"></i>
                                                        </button>
                                                        @endif
                                                        <button class="am-icon-btn danger"
                                                            title="Delete" onclick="deleteModal({{ json_encode($data) }});">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
    
    
                                                    </td>
    
    
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10">
                                                        <div class="am-empty">
                                                            <i class="fa fa-exclamation-triangle"></i>
                                                            <p>لم يتم تسجيل أي حالات عدم مطابقة بعد.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
    
                                        </tbody>
                                    </table>
                                </div>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $customers_nonconform])
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
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">حالات عدم المطابقة</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
                    <p style="margin:0 0 16px;">سجل بكل ما حدث فيه خلل: منتج أو خدمة لم تستوفِ المواصفات، أو عملية لم يُلتزم بها، أو مورّد أخلّ بالتزاماته، أو خطأ ارتكبه أحد الموظفين. وتعني بسيطة أمرًا محدود الأثر، كخطأ في الفوترة، بينما تعني جسيمة أمرًا خطيرًا، كسوء السلوك أو مشكلة قد تُلحق الأذى بأحد.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما أهميته؟</h5>
                    <p style="margin:0 0 16px;">لا يبحث المدققون عن سجل خالٍ من الملاحظات. فالسجل الفارغ لا يوحي بمنشأة لا تقع فيها أخطاء، بل بمنشأة لا يُبلَّغ فيها عن الأخطاء. وما يريدون رؤيته هو أنك تكتشف المشكلات وتدوّنها وتعالجها. ويُعد هذا السجل من أكثر السجلات التي تخضع للفحص الدقيق خلال التدقيق عن بُعد.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما المطلوب مني؟</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">انقر على إضافة حالة عدم مطابقة فور حدوث الخلل، لا بعد أسابيع.</li>
                        <li style="margin-bottom:6px;">حدّد ما إذا كانت الحالة بسيطة أو جسيمة.</li>
                        <li style="margin-bottom:6px;">سجّل اسم من أبلغ عنها، وصِف ما حدث بعبارات واضحة.</li>
                        <li style="margin-bottom:6px;">اختر الفئة التي تفسّر السبب على النحو الأمثل، مثل العامل البشري أو التخطيط.</li>
                        <li style="margin-bottom:6px;">سجّل ما تم اتخاذه لتصحيح الوضع، وأدخِل تاريخ إغلاق الحالة.</li>
                        <li>في الحالات الجسيمة أو المتكررة، اتبع الإجراء P2 – الإجراءات التصحيحية.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="nonconfirmDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:1000px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير المتطلبات</h5>
                    </div>
                <div class="form-row">
                    <div class="col-md-12 p-3">
                        <form>
                            @csrf
                            <input type="hidden" name="id" value="" id="id_feild">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>عدم التأكيد البسيط أو الكبير:</label>
                                        <input type="text"  class="form-control" name="minor_major"
                                            placeholder="أدخل اسم المورد" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>فئة عدم المطابقة</label>
                                        <select class="form-control" name="supplier_data" disabled>
                                            <option value="">اختر</option>
                                            <option value="Employee">موظف</option>
                                            <option value="Supplier">مورّد</option>
                                            <option value="Customer">عميل</option>
                                            <option value="Equipment">معدات</option>
                                            <option value="Audit">تدقيق</option>
                                            <option value="Design">تصميم</option>
                                            <option value="Other">أخرى</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>رقم هوية المورد</label>
                                        @if ($no_customer == 1)
                                            <select readonly disabled class="form-control" required name="customerID">
                                                <option value="">أدخل رقم هوية العميل:</option>

                                            </select>
                                        @else
                                            <select readonly disabled class="form-control" name="customerID"
                                                id="customer_id_{{ $customer->idnumber }}">
                                                <option value="">أدخل رقم هوية العميل:</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->idnumber }}">{{ $customer->idnumber }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>الموظف الذي أبلغ عن NCR</label>
                                        <input type="text" readonly disabled
                                            class="form-control employee_name_edit_display" name="employee_name"
                                            placeholder="الموظف الذي أبلغ عن NCR" id="employee_name">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    <input type="text"  readonly disabled class="form-control customer_name_edit_display"
                                        name="CustomerName" placeholder="Enter Customer Name" id="customer_name">
                                </div>
                            </div> --}}

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>رقم هوية الموظف:</label>
                                        <select readonly disabled class="form-control" name="employee_id"
                                            id="employee_id">
                                            <option value="">أدخل رقم هوية الموظف:
                                            </option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->empNumber }}">{{ $employee->empNumber }}
                                                    {{-- @dd($customer) --}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>فئة السبب الجذري:</label>
                                        <input type="text" name="root_cause_category" readonly disabled id=""
                                            value="" class="form-control">
                                    </div>
                                </div>

                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>	وصف NCR</label>
                                        <input type="text" readonly disabled class="form-control" name="description"
                                            placeholder="أدخل وصف NCR">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>السبب الجذري:</label>
                                        <input type="text" readonly disabled class="form-control" name="rootCause"
                                            placeholder="أدخل السبب الجذري">
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>الإجراءات التصحيحية الفورية:</label>
                                        <input type="text" readonly disabled class="form-control" name="immediateCorp"
                                            placeholder="أدخل الإجراء التصحيحي الفوري">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>إجراءات لمنع التكرار:</label>
                                        <input type="text" readonly disabled class="form-control" name="actionPrevent"
                                            placeholder="أدخل منع التكرار">
                                    </div>
                                </div>

                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>فعالية العمل لمنع التكرار:</label>
                                        <input type="text" readonly disabled class="form-control"
                                            name="ActionRecurnce"
                                            placeholder="أدخل تفاصيل فعالية الإجراء/الإجراءات لمنع تكرارها">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>تاريخ مراجعة النفاذ (شهر/يوم/سنة):</label>
                                        <input type="date" required max="2999-12-31" class="form-control"
                                            name="effectiveDate" placeholder="حدد تاريخ مراجعة الفعالية">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>المراجعة تم إجراؤها بواسطة:</label>
                                        <input type="text" class="form-control" name="reviewdBy"
                                            placeholder="المراجعة التي أجراها">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>تاريخ تسجيل NC (شهر/يوم/سنة):</label>
                                        <input type="date" class="form-control" name="dateNcR"
                                            placeholder="إدخال اسم">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>التاريخ الذي تمت فيه معالجة NC (MM/DD/YYYY):</label>
                                        <input type="date" class="form-control" name="dateNcP"
                                            placeholder="أدخل منع التكرار">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>الوقت المتوقع لاستجابة المورد (بالأيام):</label>
                                        <input type="number" readonly disabled class="form-control validate_number"
                                            name="CRE" placeholder="أدخل عدد الأيام.">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>تأثير المنتج (نعم أو لا):</label>
                                        <select name="PI" class="form-control" readonly disabled>
                                            <option value="">تأثير المنتج</option>
                                            <option value="Yes">نعم</option>
                                            <option value="No">لا</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>تم إغلاق NCR (نعم أو لا):</label>
                                        <select name="NCR_closed" class="form-control">
                                            <option value=""></option>
                                            <option value="Yes">نعم </option>
                                            <option value="No">لا</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="reset" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit modal  editConfirm --}}



    <div class="modal fade text-right" id="editConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:1000px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل عدم المطابقة.</h5>
                    </div>
                <form action="{{ route('editnonConfirm') }}" method="POST">
                    <div class="modal-body">
                    <div class="col-md-12 p-3">
                            @csrf
                            <input type="hidden" name="id" value="" id="editid">
                            {{-- <div class="form-group">
            <label>Customer ID Number:</label><br>
            <span>Select a customer ID from the table. For an internal non-conformity, select Internal as a Customer. If this is the first internal non-conformity, click here to add a customer called Internal.</span>
            <input type="number"  class="form-control validate_number" name="customerID" placeholder="Enter Customer ID:">
        </div> --}}
                                                        <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>عدم الثقة الصغرى أو الكبرى:</label>
                                        <select class="form-control" name="minor_major"
                                            id="">
                                            <option value="">حدد الخيار</option>
                                            <option value="Minor">صغير</option>
                                            <option value="Major">رئيسي</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>فئة عدم المطابقة</label>
                                        <select class="form-control" name="supplier_data" id="supplier_name">
                                            <option value="">اختر</option>
                                            <option value="Employee">موظف</option>
                                            <option value="Supplier">مورّد</option>
                                            <option value="Customer">عميل</option>
                                            <option value="Equipment">معدات</option>
                                            <option value="Audit">تدقيق</option>
                                            <option value="Design">تصميم</option>
                                            <option value="Other">أخرى</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>رقم هوية المورد </label>
                                        @if ($no_customer == 1)
                                            <select readonly disabled class="form-control" required name="customerID">
                                                <option value="">أدخل رقم هوية المورد: </option>

                                            </select>
                                        @else
                                            <select readonly class="form-control" name="customerID"
                                                id="customer_id_{{ $customer->idnumber }}">
                                                <option value="">أدخل رقم هوية المورد:</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->idnumber }}">{{ $customer->idnumber }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>الموظف الذي أبلغ عن NCR</label>
                                        <input type="text"
                                            class="form-control employee_name_edit_display employee_name"
                                            name="employee_name" placeholder="الموظف الذي أبلغ عن NCR" id="employee_name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>رقم هوية الموظف:</label>
                                        @if ($no_customer == 1)
                                            <select onchange="get_employee(this)" class="form-control" required
                                                name="employee_id" id="employee_id">
                                                <option value="">أدخل رقم هوية الموظف:</option>
                                            </select>
                                        @else
                                            <select onchange="get_employee(this)" class="form-control" name="employee_id"
                                                id="employee_id">
                                                <option value="">أدخل رقم هوية الموظف:</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->empNumber }}">{{ $employee->empNumber }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>فئة السبب الجذري:</label>
                                        <select name="root_cause_category" class="form-control" required>
                                            <option value="Other"> أخرى</option>
                                            <option value="Planning"> التخطيط</option>
                                            <option value="Production">إنتاج</option>
                                            <option value="Non-liable">غير مسؤول</option>
                                            <option value="Training">تمرين</option>
                                            <option value="Management">إدارة</option>
                                            <option value="Human Factor">العامل البشري</option>
                                        </select>
                                        <!--<input type="text" name="root_cause_category" id="" value="" class="form-control"-->
                                        <!--    required>-->

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>	وصف NCR</label>
                                        <input type="text" required class="form-control" name="description"
                                            placeholder="أدخل وصف NCR" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>السبب الجذري:</label>
                                        <input type="text" required class="form-control" name="rootCause"
                                            placeholder="أدخل السبب الجذري" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>الإجراءات التصحيحية الفورية:</label>
                                        <input type="text" required class="form-control" name="immediateCorp"
                                            placeholder="أدخل الإجراء التصحيحي الفوري" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>إجراءات لمنع التكرار:</label>
                                        <input type="text" required class="form-control" name="actionPrevent"
                                            placeholder="أدخل فعالية الإجراء/الإجراءات لمنع تكرارها." required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>فعالية العمل لمنع التكرار:</label>
                                        <input type="text" required class="form-control" name="ActionRecurnce"
                                            placeholder="أدخل تفاصيل فعالية الإجراء/الإجراءات لمنع تكرارها" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>تاريخ مراجعة النفاذ (شهر/يوم/سنة):</label>
                                        <input type="date" required max="2999-12-31" class="form-control"
                                            name="effectiveDate" placeholder="أدخل منع التكرار" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>المراجعة تم إجراؤها بواسطة:</label>
                                        <input type="text" class="form-control" name="reviewdBy"
                                            placeholder="المراجعة التي أجراها" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>تاريخ تسجيل NC (شهر/يوم/سنة):</label>
                                        <input type="date" required max="2999-12-31" class="form-control"
                                            name="dateNcR" placeholder="إدخال اسم" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>التاريخ الذي تمت فيه معالجة NC (MM/DD/YYYY):</label>
                                        <input type="date" required max="2999-12-31" class="form-control"
                                            name="dateNcP"
                                            placeholder="التاريخ الذي تمت فيه معالجة NC
                                        "
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>الوقت المتوقع لاستجابة المورد (بالأيام):</label>
                                        <input type="number" required min="1" max="9999"
                                            class="form-control validate_number" name="CRE"
                                            placeholder="أدخل عدد الأيام" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>تأثير المنتج (نعم أو لا):</label>

                                        <select name="PI" class="form-control">
                                            <option value=""></option>
                                            <option value="Yes">نعم </option>
                                            <option value="No">لا</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>تم إغلاق NCR (نعم أو لا):</label>
                                        <select name="NCR_closed" class="form-control">
                                            <option value=""></option>
                                            <option value="Yes">نعم </option>
                                            <option value="No">لا</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Customer Name:</label>
                                    <input type="text" class="form-control customer_name_edit_display"
                                        name="CustomerName" placeholder="Enter Customer Name" id="customer_name">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer am-modal__footer">
                                <button type="reset" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="deleteRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف إدخال</h5>
                    </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('deletenonconfimity') }}" method="POST">
                        @csrf
                        <input type="hidden" id="re_id" value="" name="id">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
     function get_customer(obj) 
    {
        $this = $(obj);
        $id = $this.val();
        $user_id = document.getElementById('user_id2').value;

        jQuery.ajax({
            url: "{{ url('/get_customer_name_by_id') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $id,
                user_id: $user_id,
            },
        }).done(function (response) 
        {
            //let ids = array();
            response2 = JSON.parse(response);
            $this.closest(".row").find(".supplier_name").val(response2.name);
        });

    }

    function get_employee(obj) {
        $this = $(obj);
        $id = $this.val();
        // alert($id);
        $user_id = document.getElementById('user_id2').value;
        // console.log("tets", $user_id);

        jQuery.ajax({
            url: "{{ url('/get_employee_name_by_id') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: $id,
                user_id: $user_id,
            },
        }).done(function(response) {
            // console.log(response);
            response2 = JSON.parse(response);
            $this.closest(".row").find(".employee_name").val(response2.surname);
            // $('#employee_name').val(response2.surname);
        });
    }


    function get_customer_name_by_id(the_id, the_class) {
        jQuery.ajax({
            url: "{{ url('/get_customer_name_by_id') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: the_id,
                // user_id: $user_id,
            },
        }).done(function(response) {
            response2 = JSON.parse(response);
            $(the_class).val(response2.name);
        });
    }

    function get_employee_name_by_id(the_id, the_class) {
        // $user_id = document.getElementById('user_id').value;
        jQuery.ajax({
            url: "{{ url('/get_employee_name_by_id') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: the_id,
                user_id: $user_id,
            },
        }).done(function(response) {
            response2 = JSON.parse(response);
            $(the_class).val(response2.surname);
        });
    }

    function getEid(data) {
        console.log(data);
        $("#id_feild").val(data.id);
        $("input[name='ActionRecurnce']").val(data.ActionRecurnce);
        $("input[name='CRE']").val(data.CRE);
        $("select[name='customerID']").val(data.customerID);
        $("input[name='CustomerName']").val(data.name);
        get_customer_name_by_id(data.customerID, '.customer_name_edit_display');
        $("input[name='dateNcP']").val(data.dateNcP);
        $("input[name='dateNcR']").val(data.dateNcR);
        $("input[name='description']").val(data.description);
        $("input[name='effectiveDate']").val(data.effectiveDate);
        $("input[name='immediateCorp']").val(data.immediateCorp);
        $("input[name='reviewdBy']").val(data.reviewdBy);
        $("input[name='rootCause']").val(data.rootCause);
        $("input[name='actionPrevent']").val(data.actionPrevent);
        $("input[name='rootCause']").val(data.rootCause);
        $("select[name='PI']").val(data.PI);
        $("select[name='NCR_closed']").val(data.NCR_closed);
        $("input[name='minor_major']").val(data.non_confirm_status);
        $("input[name='root_cause_category']").val(data.root_cause_category);
        $("select[name='supplier_data']").val(data.supplier_data);

        $("select[name='employee_id']").val(data.employee_id);
        // get_employee_name_by_id(data.employee_id, '.employee_name_edit_display');
        $("input[name='employee_name']").val(data.employee_name);
        $("#nonconfirmDetail").modal('show');

    }

    function EditData(data) {
        console.log(data);
        $("#editid").val(data.noid);
        $("input[name='ActionRecurnce']").val(data.ActionRecurnce);
        $("input[name='CRE']").val(data.CRE);
        $("select[name='customerID']").val(data.customerID);
        $("input[name='CustomerName']").val(data.name);
        get_customer_name_by_id(data.customerID, '.customer_name_edit_display');
        $("input[name='dateNcP']").val(data.dateNcP);
        $("input[name='dateNcR']").val(data.dateNcR);
        $("input[name='description']").val(data.description);
        $("input[name='effectiveDate']").val(data.effectiveDate);
        $("input[name='immediateCorp']").val(data.immediateCorp);
        $("input[name='reviewdBy']").val(data.reviewdBy);
        $("input[name='rootCause']").val(data.rootCause);
        $("input[name='actionPrevent']").val(data.actionPrevent);
        $("select[name='root_cause_category']").val(data.root_cause_category);
        $("input[name='rootCause']").val(data.rootCause);
        $("select[name='NCR_closed']").val(data.NCR_closed);
        $("select[name='PI']").val(data.PI);
        $("select[name='minor_major']").val(data.non_confirm_status);
        $("select[name='supplier_data']").val(data.supplier_data);

        $("input[name='employee_id']").val(data.employee_id);
        $("input[name='employee_name']").val(data.employee_name);
        $("select[name='employee_id']").val(data.employee_id);
        // get_employee_name_by_id(data.employee_id, '.employee_name_edit_display');
        $("#editConfirm").modal('show');

    }

    function deleteModal(data) {
        $("#re_id").val(data.noid);
        $("#deleteRequirment").modal('show');

    }
</script>
@endsection
