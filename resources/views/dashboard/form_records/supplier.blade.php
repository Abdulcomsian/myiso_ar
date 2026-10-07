@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <style>
        #procedure_section .procedure_div ul li::before {
            display: none !important;
        }
    </style>
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <button type="button" class="am-page-guide-btn"
                    data-toggle="modal" data-target="#amPageGuide"
                    title="الموردون" aria-label="الموردون">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>الموردون</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                <a onclick="supplierForm()" class="am-btn am-btn-primary">إضافة مورد</a>
                            </div>
                        </div>
                        <div class="supplier_from_div">
                            <form class="am-inline-form open" action="{{ route('supplier') }} " id="addcust" method="post" style="margin:16px 20px;">
                                @csrf
                                <h3>إضافة تفاصيل المورد</h3>
                                                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>رقم تعريف المورد:</label>
                                            <input type="number" class="form-control validate_number" min="1"
                                                name="idnumber" required placeholder="أدخل المعرف:">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>اسم المورد:</label>
                                            <input type="text" class="form-control" required name="suppliername"
                                                placeholder="أدخل اسم المورد:">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label> البلد:</label>
                                            <input type="text" name="suppliercountry" required class="form-control"
                                                placeholder="أدخل البلد">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>عنوان المورد:</label>
                                            <input type="text" name="supplieraddress" required class="form-control"
                                                placeholder="أدخل عنوان المورد:">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>رقم هاتف المورد:</label>
                                            <input type="text" name="supplierphn"required id="supplierphn"
                                                class="form-control" placeholder="أدخل رقم الهاتف">
                                            <input type="hidden" name="phonecode" id="phonecode">
                                            <input type="hidden" name="phoneflag" id="phoneflag">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>عنوان البريد الإلكتروني للمورد:</label>
                                            <input type="email" name="supplieremail"required class="form-control"
                                                placeholder="أدخل عنوان البريد الإلكتروني للمورد:">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>اسم جهة الاتصال بالمورد:</label>
                                            <input type="text" name="supplierContactNumber"required class="form-control"
                                                placeholder="أدخل اسم جهة الاتصال الخاصة بالمورد.">
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>خدمات:</label>
                                            <input type="text" name="supplierservc"required required class="form-control"
                                                placeholder="أدخل خدمات الموردين">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
										<div class="form-group">
											<label>City:</label>
											<input type="text"  name="suppliercity" required class="form-control" placeholder="Enter City:">
										</div>
									</div> --}}
                                {{-- <div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>County or State:</label>
											<input type="text" name="supplierstate" required class="form-control" placeholder="Enter Country or State:">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Post Code or Zip Code:</label>
											<input type="text" name="supplierzip" required class="form-control" placeholder="Enter Customer Contact Number:">
										</div>
									</div>
								</div> --}}
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="supplierForm()" class="am-btn am-btn-outline am-btn-sm">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm">يُقدِّم</button>
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
                                            <th class="w-100-px"> رقم تعريف المورد:</th>
                                            <th>اسم المورد</th>
                                            <th> عنوان المورد</th>
                                            {{-- <th>City</th> --}}
                                            <th>البلد</th>
                                            {{-- <th>Postcode</th> --}}
                                            <!--<th>Country Code</th>-->
                                            <th>رقم هاتف المورد</th>
                                            <th> عنوان البريد الإلكتروني للمورد</th>
                                            <th>اسم جهة الاتصال بالمورد</th>
                                            <th> الخدمات</th>
                                            <th class="w-100-px">النشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($supplier as $data)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $data->idnumber }}</span></td>
                                                <td><span class="am-cell-primary">{{ $data->suppliername }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->supplieraddress }}</span></td>
                                                {{-- <td><span class="am-cell-sub">{{$data->suppliercity}}</span></td> --}}
                                                <td><span class="am-cell-sub">{{ $data->suppliercountry }}</span></td>
                                                {{-- <td><span class="am-cell-sub">{{$data->supplierzip}}</span></td> --}}
                                                <!--<td><span class="am-cell-sub">{{ $data->phonecode }}</span></td>-->
                                                <td>{{ $data->phonecode }} {{ $data->supplierphn }}</td>
                                                <td><span class="am-cell-sub">{{ $data->supplieremail }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->supplierContactNumber }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->supplierservc }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="view" onclick="viewEid({{ $data }});"><i
                                                            class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="am-icon-btn" title="Edit"
                                                        onclick="getEid({{ $data }});"><i class="fa fa-pen"></i>
                                                    </button>
                                                    <!-- new  -->
                                                    <!-- <button class="am-icon-btn"
                   title="View Customer Details" value="" o data-toggle="modal" data-target="#model3"><i
                    class="fa fa-eye"></i>
                 </button> -->

                                                    <button class="am-icon-btn danger"
                                                        title="Delete" onclick="deleteModal({{ $data }});"><i class="fa fa-trash"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="model3" tabindex="-1" role="dialog"
                                                        aria-labelledby="model3Label" aria-hidden="true">
                                                        <div class="modal-dialog" style="max-width:900px;" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">
                                                                        الموردين</h5>
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
                                                                                    placeholder="أدخل اللقب
                                    ">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>الاسم الأول:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="first_name"
                                                                                    placeholder="أدخل الاسم الأول">
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
                                                                                <label>تاريخ البدء
                                                                                    (سنين/الشهر/أيام):</label>
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
                                                <td colspan="9">
                                                    <div class="am-empty">
                                                        <i class="fa fa-truck"></i>
                                                        <p>لم تتم إضافة أي موردين بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $supplier])
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
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">الموردون</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
                    <p style="margin:0 0 16px;">سجل بالمنشآت التي تشتري منها السلع أو الخدمات، يتضمن بيانات الاتصال بها وما توفّره، ومن خلاله يمكن إجراء تقييمات الموردين.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما أهميته؟</h5>
                    <p style="margin:0 0 16px;">إذا أخلّ مورّد بالتزاماته، فإن عميلك هو من يشعر بذلك. وتتوقع المواصفة أن تختار الموردين بناءً على أدلة، وأن تتابع أداءهم. وسيسألك المدقق عن كيفية تقرير أن المورّد مؤهل بما يكفي، وهذا السجل هو المكان الذي تُثبت فيه ذلك.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">انقر على إضافة مورّد.</li>
                        <li style="margin-bottom:6px;">أدخِل اسم الشركة، والعنوان، والبلد، ورقم الهاتف، والبريد الإلكتروني.</li>
                        <li style="margin-bottom:6px;">صِف ما يورّده في كلمات قليلة.</li>
                        <li style="margin-bottom:6px;">راجِع أداء كل مورّد على فترات منتظمة وسجّل النتيجة.</li>
                        <li style="margin-bottom:6px;">سجّل حالة عدم مطابقة كلما تسبّب مورّد في مشكلة، ليكون هناك سجل يستند إليه أي قرار بالتوقف عن التعامل معه.</li>
                        <li>راجِع اتجاهات أداء الموردين دوريًا واتخذ إجراءً عاجلًا عند الحاجة، وراجِعها سنويًا في مراجعات الإدارة.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="deleteSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف المورد</h5>
                    </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('deleteSupplier') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="re_id" value="">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير المورد</h5>
                    </div>
                <div class="modal-body">
                    <form action="{{ route('supplieredit') }} " id="editcust" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id_feild" value="">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم الهوية:</label>
                                    <input type="number" required class="form-control" name="idnumber" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المورد:</label>
                                    <input type="text" required class="form-control" name="suppliername"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>عنوان المورد:</label>
                                    <input type="text" required name="supplieraddress" class="form-control"
                                        placeholder="">
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>City:</label>
                                <input type="text"  name="suppliercity" class="form-control" placeholder="">
                            </div>
                        </div> --}}
                        </div>
                        {{-- <div class="row"> --}}
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>County or State:</label>
                                <input type="text" name="supplierstate" class="form-control" placeholder="">
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Post Code or Zip Code:</label>
                                <input type="text" name="supplierzip" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div> --}}
                        <div class="row">
                            {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Country:</label>
                                <input type="text" name="suppliercountry"  required class="form-control" placeholder="">
                            </div>
                        </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هاتف المورد:</label>
                                    <div id="edit_supplier_phone">

                                    </div>
                                    <input type="hidden" name="phonecode" id="editphonecode">
                                    <input type="hidden" name="phoneflag" id="editphoneflag">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان البريد الإلكتروني للمورد:</label>
                                    <input type="email" required name="supplieremail" class="form-control"
                                        placeholder="أدخل عنوان البريد الإلكتروني للمورد">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم جهة اتصال المورد:</label>
                                    <input type="text" name="supplierContactNumber" required class="form-control"
                                        placeholder="أدخل اسم جهة الاتصال الخاصة بالمورد">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>خدمات:</label>
                                    <input type="text" name="supplierservc" required class="form-control"
                                        placeholder="أدخل خدمات الموردين">
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                    <!--<button type="button" class="am-btn am-btn-outline" data-dismiss="modal">cancel</button>-->
                    <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="viewSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تفاصيل المورد</h5>
                    </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="id" id="id_feild" value="">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم هوية المورد:</label>
                                    <input type="number" class="form-control" name="idnumber"
                                        placeholder="أدخل المعرف:" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المورد:</label>
                                    <input type="text" class="form-control" name="suppliername"
                                        placeholder="أدخل اسم المورد:" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>عنوان المورد:</label>
                                    <input type="text" name="supplieraddress" class="form-control"
                                        placeholder="أدخل عنوان المورد:" readonly>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>City:</label>
                                    <input type="text"  name="suppliercity" class="form-control" placeholder="Enter City:" readonly>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="row"> --}}
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>County or State:</label>
                                <input type="text" name="supplierstate" class="form-control" placeholder="Enter Country or State:" readonly>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Post Code or Zip Code:</label>
                                <input type="text" name="supplierzip" class="form-control" placeholder="Enter Customer Contact Number:" readonly>
                            </div>
                        </div>
                    </div> --}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>البلد::</label>
                                    <input type="text" name="suppliercountry" class="form-control"
                                        placeholder="أدخل البلد" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label style="display:block;">هاتف المورد:</label>
                                    <div id="view_phone_div">
                                    </div>
                                    <input type="hidden" name="phonecode" id="phonecode2">
                                    <input type="hidden" name="phoneflag" id="phoneflag2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان البريد الإلكتروني للمورد:</label>
                                    <input type="email" name="supplieremail" class="form-control"
                                        placeholder="أدخل البريد الإلكتروني للمورد:" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> اسم جهة الاتصال بالمورد:</label>
                                    <input type="text" name="supplierContactNumber" class="form-control"
                                        placeholder="أدخل رقم اتصال المورد:" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الخدمات::</label>
                                    <input type="text" name="supplierservc" class="form-control"
                                        placeholder="أدخل خدمة المورد:" readonly>
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
<script>
    function getEid(data) {
        console.log(data);
        $("#edit_supplier_phone").empty().append(
            `<input type="text" required name="editsupplierphn" id="editphone" class="form-control" placeholder="">`
            );

        $("#id_feild").val(data.id);
        $("input[name='idnumber']").val(data.idnumber);
        $("input[name='supplierContactNumber']").val(data.supplierContactNumber);
        $("input[name='supplieraddress']").val(data.supplieraddress);
        $("input[name='suppliercity']").val(data.suppliercity);
        $("input[name='suppliercountry']").val(data.suppliercountry);
        $("input[name='supplieremail']").val(data.supplieremail);
        $("input[name='suppliername']").val(data.suppliername);
        $("input[name='editsupplierphn']").val(data.supplierphn);
        $("input[name='supplierservc']").val(data.supplierservc);
        $("input[name='supplierstate']").val(data.supplierstate);
        $("input[name='supplierzip']").val(data.supplierzip);

        let phoneflag = '';
        if (data.phoneflag == 'preferred' || data.phoneflag == null) {
            phoneflag = 'us';
        } else {
            phoneflag = data.phoneflag;
        }
        var input = document.querySelector("#editphone");
        window.intlTelInput(input, {
            separateDialCode: true,
            initialCountry: phoneflag,
            customPlaceholder: function(
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        $("#editSupplier").modal('show');
        $('#addcust').resetForm();
    }

    function deleteModal(data) {
        $("#re_id").val(data.id);
        $("#deleteSupplier").modal('show');

    }

    function viewEid(data) {
        console.log(data);
        $('#view_phone_div').empty().append(
            `<input type="text" name="supplierphn" class="form-control" id="editphone2" placeholder="Enter Supplier Telephone:"/>`
            );
        $("#id_feild").val(data.id);
        $("input[name='idnumber']").val(data.idnumber);
        $("input[name='supplierContactNumber']").val(data.supplierContactNumber);
        $("input[name='supplieraddress']").val(data.supplieraddress);
        $("input[name='suppliercity']").val(data.suppliercity);
        $("input[name='suppliercountry']").val(data.suppliercountry);
        $("input[name='supplieremail']").val(data.supplieremail);
        $("input[name='suppliername']").val(data.suppliername);
        $("input[name='supplierphn']").val(data.supplierphn);
        $("input[name='supplierservc']").val(data.supplierservc);
        $("input[name='supplierstate']").val(data.supplierstate);
        $("input[name='supplierzip']").val(data.supplierzip);
        var input = document.querySelector("#editphone2");
        let phoneflag = '';

        if (data.phoneflag == 'preferred' || data.phoneflag == null) {
            phoneflag = 'us';
        } else {
            phoneflag = data.phoneflag;
        }

        window.intlTelInput(input, {
            separateDialCode: true,
            initialCountry: phoneflag,
            customPlaceholder: function(
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        $("#viewSupplier").modal('show');
        $('#addcust').resetForm();
    }
</script>
@endsection
@section('myscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"
        integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"
        integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw=="
        crossorigin="anonymous"></script>
    <script>
        var input = document.querySelector("#supplierphn");
        window.intlTelInput(input, {
            separateDialCode: true,
            // initialCountry: '{{ Auth::user()->phoneflag }}',
            customPlaceholder: function(
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });



        $("#addcust").submit(function() {

            var i = 1;
            var j = 1;
            $('.iti__selected-dial-code').each(function() {
                if (i == 1) {
                    var code = $(this).text();
                    $("#phonecode").val(code);
                    console.log(code);
                    $("#phonecode").val(code);

                }

                i++;
            });

            $(".iti__selected-flag").each(function() {
                if (j == 1) {
                    var str = $(this).attr('aria-activedescendant');
                    var n = str.lastIndexOf('-');
                    var result = str.substring(n + 1);
                    $("#phoneflag").val(result);
                }
                //   else
                //   {
                //       var str=$(this).attr('aria-activedescendant');
                //       var n = str.lastIndexOf('-');
                //       var result = str.substring(n + 1);
                //       $("#phoneflag").val(result);
                //   }
                j++;
            });

        });
        $("#editcust").submit(function() {

            var i = 1;
            var j = 1;
            $('.iti__selected-dial-code').each(function() {
                if (i == 2) {
                    var code = $(this).text();
                    console.log(code);

                    $("#editphonecode").val(code);

                }

                i++;
            });
            $(".iti__selected-flag").each(function() {
                if (j == 2) {
                    var str = $(this).attr('aria-activedescendant');
                    var n = str.lastIndexOf('-');
                    var result = str.substring(n + 1);
                    $("#editphoneflag").val(result);
                }
                //   else
                //   {
                //       var str=$(this).attr('aria-activedescendant');
                //       var n = str.lastIndexOf('-');
                //       var result = str.substring(n + 1);
                //       $("#phoneflag").val(result);
                //   }
                j++;
            });


        });
    </script>
@endsection
