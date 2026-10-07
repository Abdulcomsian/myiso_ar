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
                    title="مراجعات العملاء" aria-label="مراجعات العملاء">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>مراجعات العملاء</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                <a onclick="customerReview()" class="am-btn am-btn-primary">إضافة تقييم عميل </a>
                            </div>
                        </div>
                        <div class="customer_review_from_div">
                            <form method="POST" action="{{ route('customer_rview') }} " class="am-inline-form open" enctype="multipart/form-data" style="margin:16px 20px;">
                                @csrf
                                                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>رقم تعريف العميل: </label>
                                            <!-- <input type="number" class="form-control" name="cus_id" placeholder="Enter Customer ID:"> -->
                                            <select class="form-control" name="cus_id" required="required">
                                                <option value="" selected disabled>يرجى اختيار رقم تعريف العميل
                                                </option>
                                                @foreach ($all_customers as $customer)
                                                    <option value="{{ $customer->idNumber }}">{{ $customer->idNumber }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                        	<label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label>
                                        	<input class="form-control" type="text" name="product_activity_area" placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ التقييم: (الشهر/ اليوم/ السنة):</label>
                                            <input type="date" class="form-control" max="2999-12-31" name="AssesmentDate"
                                                required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label> التقييم من حيث الجودة (0 – 10):</label>
                                            <input type="number" min="0" max="10" id="qualityScore"
                                                class="form-control"
                                                placeholder=" يرجى إدخال النقاط المحرزة فيما يتعلق  بالجودة"
                                                name="qualityScore" required="required">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>التقييم من حيث السعر: (0 – 10):</label>
                                            <input type="number" class="form-control"min="0" max="10"
                                                name="priceScore" required="required" placeholder="إذا كان قابلا للتطبيق">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>التقييم من حيث التسليم: (0 – 10): </label>
                                            <input type="number"min="0" max="10" class="form-control" name="DScore"
                                                required="required"
                                                placeholder=" يرجى إدخال النقاط المحرزة فيما يتعلق  بالتسليم">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>النتيجة الإجمالية (0-10):</label>
                                            <input type="number" class="form-control"min="0" max="10"
                                            name="OveralScore" required="required" placeholder="أدخل السعر الإجمالي">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>ملاحظات</label>
                                            <textarea required class="form-control" name="other_issue" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>إرفاق دليل <span style="color:var(--am-text-soft);">من رد الاستبيان أو البريد الإلكتروني أو خطاب التوصية أو ملاحظات المكالمة</span>:</label>
                                            <input type="hidden" id="assetUrl" value="{{ asset('customer_review_evidence/') }}">
                                            {{-- <a href="" name="attach_evidence">عرض الأدلة المرفقة</a> --}}
                                            {{-- <input type="file" class="form-control" name="attach_evidence" required="required"> --}}
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
                                {{-- <div class="col-lg-6">
                    					<div class="form-group">
											<label>Customer Review ID Number (See table below. For amendments only):</label>
											<input type="number" class="form-control" name="revnumber" placeholder="Enter ID:">
										</div>
                    				</div> --}}
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button class="am-btn am-btn-outline am-btn-sm" type="reset" onclick="customerReview()">يلغي</button>
                                    <button class="am-btn am-btn-primary am-btn-sm" type="submit">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table
                                    class="am-table">
                                    <thead>
                                        <tr>
                                            <th>رقم تقييم العميل</th>
                                            <th>رقم تعريف العميل</th>
                                            <th>اسم العميل</th>
                                            <th>الجودة </th>
                                            <th>السعر </th>
                                            <th>التسليم </th>
                                            <th>الإجمالي</th>
                                            <th>تاريخ التقييم </th>
                                            <th>حالات أخرى </th>
                                            <th>إرفاق الأدلة </th>
                                            <th>المنتج / النشاط / المنطقة التي تتم مراجعتها</th>
                                            <th>النشاط </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($customers as $data)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $i++ }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->cus_id }}</span></td>
                                                @php
                                                    $customersName = \App\customers::where('user_id', $userid)
                                                        ->where('idNumber', $data->cus_id)
                                                        ->first();
                                                @endphp
                                                <td>
                                                    @if (isset($customersName->name))
                                                        {{ $customersName->name }}
                                                    @endif
                                                </td>
                                                <td><span class="am-cell-primary">{{ $data->qualityScore }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->priceScore }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->DScore }}</span></td>
                                                <td><span class="am-chip {{ ((int)$data->OveralScore) >= 8 ? 'success' : (((int)$data->OveralScore) >= 5 ? 'warning' : 'danger') }}">{{ $data->OveralScore }}</span></td>

                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->AssesmentDate)) }}</span></td>
                                                <td><span class="am-cell-sub">{{$data->other_issues}}</span></td>
                                                <td>
                                                    @isset($data->attach_evidence)
                                                    <a href="{{asset('customer_review_evidence/' . $data->attach_evidence)}}" target="_blank">View Evidence</a>
                                                    @endisset
                                                </td>
                                                <td><span class="am-cell-sub">{{$data->product_activity_area}}</span></td>      
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <!-- new  -->
                                                    <button class="am-icon-btn" onclick="getView({{$data}});" title="View Customer Details" value="" o data-toggle="modal" data-target="#model3"><i class="fa fa-eye"></i>
                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="model3" tabindex="-1" role="dialog"
                                                        aria-labelledby="model3Label" aria-hidden="true">
                                                        <div class="modal-dialog" style="max-width:720px;" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">رأي
                                                                        العميل</h5>
																		</div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        {{-- <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Customer Review ID Number (See table below. For amendments only):</label>
                                                                            <input type="number" class="form-control" name="revnumber" placeholder="Enter ID:">
                                                                        </div>
                                                                    </div> --}}
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>رقم هوية العميل:</label>
                                                                                <input type="number" class="form-control" required name="cus_id"
                                                                                    placeholder="أدخل معرف العميل:" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label>
                                                                                <input class="form-control" type="text" name="product_activity_area_id" placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة" value="" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                            
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label> التقييم من حيث الجودة: (0 – 10):</label>
                                                                                <input type="number" min="0" max="10" required class="form-control"
                                                                                    name="qualityScore">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>التقييم من حيث السعر: (0 – 10):</label>
                                                                                <input type="number" min="0" max="10" required class="form-control"
                                                                                    name="priceScore">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>التقييم من حيث التسليم: (0 – 10): </label>
                                                                                <input type="number" class="form-control" required min="0" max="10"
                                                                                    name="DScore">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>النتيجة الإجمالية (0-10)</label>
                                                                                <input type="number" class="form-control" required min="0" max="10"
                                                                                    name="OveralScore">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                   
                                            
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>تاريخ التقييم: (الشهر/ اليوم/ السنة)</label>
                                                                                <input type="date" max="2999-12-31" required class="form-control"
                                                                                    name="AssesmentDate" required="required">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>ملاحظات</label>
                                                                                <textarea required class="form-control" name="other_issue" required="required"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>إرفاق دليل <span style="color:var(--am-text-soft);">من رد الاستبيان أو البريد الإلكتروني أو خطاب التوصية أو ملاحظات المكالمة</span>:</label>
                                                                               <a href="" name="attach_evidence">عرض الأدلة المرفقة</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                            
                                                                    <button class="am-btn am-btn-outline" type="reset" data-dismiss="modal"
                                                                        aria-label="Close" style="margin-right: 6px;">يلغي</button>
                                                                </div>
                                                                <div class="modal-footer am-modal__footer">
                                                                    <button type="button" class="am-btn am-btn-outline"
                                                                        data-dismiss="modal">يغلق</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="am-icon-btn"
                                                        title="Edit" value=""
                                                        onclick="getEid({{ $data }});">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button data-toggle="modal"
                                                        data-target="#confirm-{{ $data->id }}"
                                                        id="remove_{{ $data->id }}" title="Delete"
                                                        class="am-icon-btn danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <!-- Delete Modal -->

                                                    <div class="modal fade modal-mini modal-primary"
                                                        id="confirm-{{ $data->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="confirm" aria-hidden="true">
                                                        <div class="modal-dialog" style="max-width:460px;">
                                                            <div class="modal-content">
                                                                <form action="{{ route('delete_customer_review') }}"
                                                                    method="post">
                                                                    <div class="modal-header text-right am-modal__header"> @csrf
                                                                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                        <div class="modal-profile am-modal__title"> حذف تفاصيل مراجعة
                                                                            العميل </div>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>هل أنت متأكد أنك تريد إزالة هذا؟</p>
                                                                    </div>
                                                                    <div class="modal-footer am-modal__footer">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12">
                                                    <div class="am-empty">
                                                        <i class="fa fa-star"></i>
                                                        <p>لم تتم إضافة أي تقييمات عملاء بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $customers])
                        </div>
                    </div>

        </section>

    </div>


    {{-- Page guide --}}
    <div class="modal fade text-right" id="amPageGuide" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon am-page-guide-icon"><i class="fa fa-info-circle"></i></span>
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;">النماذج والسجلات</div>
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">تقييم العملاء</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
                    <p style="margin:0 0 16px;">بطاقة تقييم تقيس من خلالها مستوى الخدمة التي قدّمتها لكل عميل من حيث الجودة والسعر والتسليم، ثم تمنح تقييمًا إجماليًا من عشرة.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما أهميته؟</h5>
                    <p style="margin:0 0 16px;">تطلب المواصفة قياس مدى رضا العملاء فعليًا، لا افتراضه. وتُظهر التقييمات بمرور الوقت ما إذا كان أداؤك يتحسن أم يتراجع، وهذا الاتجاه من الأمور التي ينظر فيها المدقق عن بُعد. كما أنها بمثابة إنذار مبكر؛ فالعميل الذي تتراجع تقييماته غالبًا ما يكون على وشك المغادرة.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">أضِف العميل أولًا ضمن قسم العملاء.</li>
                        <li style="margin-bottom:6px;">انقر على إضافة تقييم عميل.</li>
                        <li style="margin-bottom:6px;">اختر العميل، والمنتج أو مجال العمل الذي يجري تقييمه.</li>
                        <li style="margin-bottom:6px;">قيّم الجودة والسعر والتسليم، ثم امنح تقييمًا إجماليًا.</li>
                        <li style="margin-bottom:6px;">أرفِق الأدلة الداعمة، مثل ردّ على استبيان، أو رسالة بريد إلكتروني، أو خطاب توصية، أو ملاحظات من مكالمة هاتفية.</li>
                        <li>كرّر التقييم على فترات مناسبة: مرة سنويًا لمعظم العملاء، وبوتيرة أعلى لكبار العملاء.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
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
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل تقييم العملاء</h5>
                    </div>
                <form method="POST" action="{{ route('editCustomerReview') }} " enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="editid">
                                                <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم هوية العميل:</label>
                                    <input type="number" class="form-control" required name="cus_id"
                                        placeholder="أدخل معرف العميل:" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label>
                                    <!-- <input type="number" class="form-control" name="cus_id" placeholder="Enter Customer ID:"> -->
                                    <input class="form-control" type="text" name="product_activity_area_edit" placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label> التقييم من حيث الجودة: (0 – 10):</label>
                                    <input type="number" min="0" max="10" required class="form-control"
                                        name="qualityScore">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>التقييم من حيث السعر: (0 – 10):</label>
                                    <input type="number" min="0" max="10" required class="form-control"
                                        name="priceScore">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>التقييم من حيث التسليم: (0 – 10): </label>
                                    <input type="number" class="form-control" required min="0" max="10"
                                        name="DScore">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>النتيجة الإجمالية (0-10)</label>
                                    <input type="number" class="form-control" required min="0" max="10"
                                        name="OveralScore">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ التقييم: (الشهر/ اليوم/ السنة)</label>
                                    <input type="date" max="2999-12-31" required class="form-control"
                                        name="AssesmentDate" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ملاحظات</label>
                                    <textarea required class="form-control" name="other_issue" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق دليل <span style="color:var(--am-text-soft);">من رد الاستبيان أو البريد الإلكتروني أو خطاب التوصية أو ملاحظات المكالمة</span>:</label>
                                    <input type="hidden" id="assetUrl" value="{{ asset('customer_review_evidence/') }}">
                                    {{-- <a href="" name="attach_evidence">عرض الأدلة المرفقة</a> --}}
                                    {{-- <input type="file" class="form-control" name="attach_evidence" required="required"> --}}
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
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Review ID Number (See table below. For amendments only):</label>
                                <input type="number" class="form-control" name="revnumber" placeholder="Enter ID:">
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer am-modal__footer">
                            <button class="am-btn am-btn-outline" type="reset" data-dismiss="modal"
                            aria-label="Close">يلغي</button>
                            <button class="am-btn am-btn-primary" type="submit">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
    function getEid(data) {
        console.log(data);

        $("#editid").val(data.id);
        $("input[name='AssesmentDate']").val(data.AssesmentDate);
        $("input[name='DScore']").val(data.DScore);
        $("input[name='OveralScore']").val(data.OveralScore);
        $("select[name='cus_id']").val(data.cus_id);
        $("input[name='priceScore']").val(data.priceScore);
        $("input[name='qualityScore']").val(data.qualityScore);
        $("input[name='revnumber']").val(data.revnumber);
        $("input[name='qualityScore']").val(data.qualityScore);
        $("input[name='product_activity_area_edit']").val(data.product_activity_area);
        $("[name='other_issue']").val(data.other_issues);
        $("#editcustomer_rev").modal('show');
    }

    function getView(data){
		console.log(data);
        $("input[name='AssesmentDate']").val(data.AssesmentDate);
        $("input[name='DScore']").val(data.DScore);
        $("input[name='OveralScore']").val(data.OveralScore);
        $("input[name='cus_id']").val(data.cus_id);
        $("input[name='priceScore']").val(data.priceScore);
        $("input[name='qualityScore']").val(data.qualityScore);
        $("input[name='product_activity_area_id']").val(data.product_activity_area);
        $("input[name='revnumber']").val(data.revnumber);
        $("input[name='qualityScore']").val(data.qualityScore);
        $("[name='other_issue']").val(data.other_issues);
		var assetUrl = $("#assetUrl").val();
    	$("a[name='attach_evidence']").attr("href", assetUrl + "/" + data.attach_evidence);
        // $("#editcustomer_rev").modal('show');
	}
</script>
@endsection
