@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>مراجعات العملاء</h2>
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
                                <p>تقييمات العملاء هي أداة لمراقبة وتصنيف مستويات الأداء التي يقدمها عملاؤك، ويمكن لمؤشر الأداء هذا أن يستهدف جميع مجالات الاتصال مع العميل. على سبيل المثال: "جودة الخدمة أو المنتج" "دقة وقت التسليم" "مداراة موظفينا" أو ما شابه ذلك وذات صلة</p>
                                <p>لإضافة سجل، يرجى النقر على زر "إضافة تقييم عميل". لتعديل سجل، يرجى النقر على أيقونة التعديل الخاصة
                                بالقيد المراد تعديله. </p>
                            </div>
                        </div>
                    </div>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="customerReview()" class="am-btn am-btn-primary">إضافة تقييم عميل </a>
                            </div>
                        </div>
                        <div class="customer_review_from_div">
                            <form method="POST" action="{{ route('customer_rview') }} " enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                    					<div class="form-group">
											<label>Customer Review ID Number (See table below. For amendments only):</label><br>
											<input type="number" class="form-control" name="revnumber" placeholder="Enter ID:">
										</div>
                    				</div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم تعريف العميل: </label><br>
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
                                    <div class="col-lg-6">
										<div class="form-group">
											<label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><br>
											<input class="form-control" type="text" name="product_activity_area" placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
										</div>
									</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> التقييم من حيث الجودة (0 – 10):</label>
                                            <input type="number" min="0" max="10" id="qualityScore"
                                                class="form-control"
                                                placeholder=" يرجى إدخال النقاط المحرزة فيما يتعلق  بالجودة"
                                                name="qualityScore" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>التقييم من حيث السعر: (0 – 10):</label>
                                            <input type="number" class="form-control"min="0" max="10"
                                                name="priceScore" required="required" placeholder="إذا كان قابلا للتطبيق">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>التقييم من حيث التسليم: (0 – 10): </label>
                                            <input type="number"min="0" max="10" class="form-control" name="DScore"
                                                required="required"
                                                placeholder=" يرجى إدخال النقاط المحرزة فيما يتعلق  بالتسليم">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>النتيجة الإجمالية (0-10):</label>
                                            <input type="number" class="form-control"min="0" max="10"
                                            name="OveralScore" required="required" placeholder="أدخل السعر الإجمالي">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تاريخ التقييم: (الشهر/ اليوم/ السنة):</label>
                                            <input type="date" class="form-control" max="2999-12-31" name="AssesmentDate"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label>
                                            <input type="text" required class="form-control" placeholder="هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟" name="other_issue" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                       
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>إرفاق دليل من رد الاستبيان أو البريد الإلكتروني أو خطاب التوصية أو ملاحظات المكالمة:</label>
                                            <input type="hidden" id="assetUrl" value="{{ asset('customer_review_evidence/') }}">
                                            {{-- <a href="" name="attach_evidence">عرض الأدلة المرفقة</a> --}}
                                            {{-- <input type="file" class="form-control" name="attach_evidence" required="required"> --}}
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
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button class="am-btn am-btn-outline" type="reset" onclick="customerReview()">يلغي</button>
                                    <button class="am-btn am-btn-primary" type="submit">يُقدِّم</button>
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
                                        @foreach ($customers as $data)
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
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">رأي
                                                                        العميل</h5>
																		<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																		</a>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        {{-- <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Customer Review ID Number (See table below. For amendments only):</label><br>
                                                                            <input type="number" class="form-control" name="revnumber" placeholder="Enter ID:">
                                                                        </div>
                                                                    </div> --}}
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>رقم هوية العميل:</label><br>
                                                                                <input type="number" class="form-control" required name="cus_id"
                                                                                    placeholder="أدخل معرف العميل:" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><br>
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
                                                                                <label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label>
                                                                                <input type="text" required class="form-control" placeholder="هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟" name="other_issue" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>إرفاق دليل من رد الاستبيان أو البريد الإلكتروني أو خطاب التوصية أو ملاحظات المكالمة:</label>
                                                                               <a href="" name="attach_evidence">عرض الأدلة المرفقة</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                            
                                                                    <button class="btn btn-secondary" type="reset" data-dismiss="modal"
                                                                        aria-label="Close" style="margin-right: 6px;">يلغي</button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
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
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('delete_customer_review') }}"
                                                                    method="post">
                                                                    <div class="modal-header text-right"> @csrf
                                                                        <div class="modal-profile"> حذف تفاصيل مراجعة
                                                                            العميل </div>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>هل أنت متأكد أنك تريد إزالة هذا؟</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">نعم</button>
                                                                    </div>
                                                                </form>
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
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $customers])
                        </div>
                    </div>

        </section>

    </div>


    <div class="modal fade text-right" id="editcustomer_rev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير تفاصيل تقييم العملاء</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('editCustomerReview') }} " enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="editid">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Customer Review ID Number (See table below. For amendments only):</label><br>
                                <input type="number" class="form-control" name="revnumber" placeholder="Enter ID:">
                            </div>
                        </div> --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم هوية العميل:</label><br>
                                    <input type="number" class="form-control" required name="cus_id"
                                        placeholder="أدخل معرف العميل:" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><br>
                                    <!-- <input type="number" class="form-control" name="cus_id" placeholder="Enter Customer ID:"> -->
                                    <input class="form-control" type="text" name="product_activity_area_edit" placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
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
                                    <label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label>
                                    <input type="text" required class="form-control" placeholder="هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟" name="other_issue" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق دليل من رد الاستبيان أو البريد الإلكتروني أو خطاب التوصية أو ملاحظات المكالمة:</label>
                                    <input type="hidden" id="assetUrl" value="{{ asset('customer_review_evidence/') }}">
                                    {{-- <a href="" name="attach_evidence">عرض الأدلة المرفقة</a> --}}
                                    {{-- <input type="file" class="form-control" name="attach_evidence" required="required"> --}}
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
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button class="am-btn am-btn-outline" type="reset" data-dismiss="modal"
                            aria-label="Close">يلغي</button>
                            <button class="am-btn am-btn-primary" type="submit">تحديث</button>
                        </div>
                    </form>
                </div>
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
        $("input[name='other_issue']").val(data.other_issues);
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
        $("input[name='other_issue']").val(data.other_issues);
		var assetUrl = $("#assetUrl").val();
    	$("a[name='attach_evidence']").attr("href", assetUrl + "/" + data.attach_evidence);
        // $("#editcustomer_rev").modal('show');
	}
</script>
@endsection
