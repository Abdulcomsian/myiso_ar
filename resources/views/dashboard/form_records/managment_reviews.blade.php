@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>مراجعات الإدارة</h2>
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
                                <p>صُممت المراجعات الإدارية لتقييم كفاءة نظام الإدارة مع توجيه مسار الأعمال نحو التحسين المستمر. وينبغي
                                إجراء هذه المراجعات بشكلٍ شهري أو ربع سنوي أو نصف سنوي أو سنويًا وذلك بناءً على حجم العمل وطبيعته
                                </p>
                            </div>
                        </div>
                    </div>

                    <p>لإضافة سجل، انقر زر "إضافة مراجعة إدارية". لتعديل سجل، انقر على رمز التحرير الخاص بالقيد المراد
                        تعديله أو حذفه.</p>

                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="managemnetReviewForm()" class="am-btn am-btn-primary">إضافة مراجعة إدارية </a>
                            </div>
                        </div>
                        <div class="managemnet_review_from_div">
                            <form action="{{ route('mgtreview') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- <div class="col-lg-6">
                        <div class="form-group">
               <label>Management Review ID Number (See table below. For amendments only):</label><br>
               <input type="number" class="form-control" name="mgtreviewId">
              </div>
                                        </div>  -->
                                    <input type="hidden" class="form-control" name="mgtreviewId" value="241">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>تاريخ المراجعة الإدارية: </label><br>
                                            <input type="date" max="2999-12-31" required class="form-control"
                                                name="reviewdate">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>الحضور في اجتماع المراجعة الإدارية: </label>
                                            <textarea class="form-control" name="meetingatt" required placeholder="أدخل اسم الحضور:" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>مراجعة محضر الاجتماع السابق: </label>
                                            <textarea class="form-control" name="prevmeeting" required placeholder="أدخل النقاط الرئيسية للاجتماعات السابقة"
                                                cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>التعديلات في الشؤون الخارجية والداخلية التي تخص نظام إدارة الجودة
                                                والتغييرات الموصى بها:</label>
                                            <textarea class="form-control" name="recommendedchange" required placeholder="أدخل التغييرات" cols="30"
                                                rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تقديم ملخص لاستطلاعات رضا العملاء وردود الفعل من الأطراف المعنية ذات
                                                الصلة:</label>
                                            <textarea class="form-control" placeholder="أدخل الملخص" name="sammarisecustomr" required placeholder=""
                                                cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تقديم الملاحظات على الأهداف السابقة: </label>
                                            <textarea class="form-control" name="prevobjectv" placeholder="أدخل تعليقات الكائنات السابقة" required placeholder=""
                                                cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>إجراء تدقيق لأداء المنتجات والخدمات ومطابقتها مع معايير الجودة:</label>
                                            <textarea class="form-control"
                                                placeholder="أدخل تعليقات حول أداء المنتجات والخدمات التي تم إنشاؤها في عمليات تدقيق العمليات" name="conformity"
                                                required placeholder="" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تحديد حالات عدم المطابقة والإجراءات التصحيحية المناسبة:</label>
                                            <textarea class="form-control" name="nonconformities" required
                                                placeholder="أدخل حالات عدم المطابقة والإجراءات التصحيحية" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تحديد نتائج المراقبة والإشراف والقياس:</label>
                                            <textarea class="form-control" name="monitoringres" required placeholder="أدخل النتيجة" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تقديم الملاحظات حول نتائج التدقيق: </label>
                                            <textarea class="form-control" name="auditres" required placeholder="أدخل التعليقات على نتائج التدقيق" cols="30"
                                                rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تقديم الملاحظات بشأن أداء مزودي الخدمات الخارجيين: </label>
                                            <textarea class="form-control" name="externalprovider" required
                                                placeholder="أدخل تعليقات أداء مقدمي الخدمات الخارجيين" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ضمان دقة الموارد والتغييرات الموصى بها: </label>
                                            <textarea class="form-control" name="adequacy" required
                                                placeholder="أدخل التعليقات حول مدى كفاية الموارد والتغييرات الموصى بها" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ضمان فعالية الإجراءات المتخذة لمعالجة المخاطر واستغلال الفرص: </label>
                                            <textarea class="form-control" name="effectiveness" required placeholder= "أدخل فعالية الإجراءات" cols="30"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>إضافة أهداف الجودة الجديدة والمستهدفات وفرص التحسين، مع مراعاة الأطراف
                                                المسؤولة والجداول الزمنية للإنجاز ومعايير النجاح. وينبغي أن تشمل هذه الأهداف
                                                جوانب الجودة والجوانب المالية، مع أخذ المواءمة مع سياسة الجودة في
                                                الاعتبار:</label>
                                            <textarea class="form-control" name="newquality" required placeholder="أدخل أهداف الجودة الجديدة" cols="30"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>أهداف الصحة والسلامة الجديدة وفرص التحسين:</label>
                                            <textarea class="form-control" name="newhealthsafety" required placeholder="أدخل أهداف الصحة والسلامة الجديدة" cols="30"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>الأهداف البيئية الجديدة وفرص التحسين:</label>
                                            <textarea class="form-control" name="newenvironmental" required placeholder="أدخل الأهداف البيئية الجديدة" cols="30"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>الملف المرفق (PDF, jpeg, txt, .docx, doc, png):</label>
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput1" class="input-file" name="attach_file" accept="image/*,.doc, .docx,.txt,.pdf,.jpeg,.png">
                                                <label for="fileInput1" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
										</div>
									</div>
								</div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="mngmnt_reviews()" class="am-btn am-btn-outline">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>


                                <!--<button  onclick="customerForm()" type="reset" class="am-btn am-btn-primary"style="margin-right: 8px;">Cancel</button>-->
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
                                            <th> رقم الهوية</th>
                                            <th>التاريخ</th>
                                            <th>الحضور</th>
                                            <th> الأهداف المرجوة</th>
                                            <!--<th>Detail View</th>-->
                                            <th>الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach ($userData as $item)
                                            <tr>
                                                <!--<td><span class="am-cell-sub">{{ $item->id }}</span></td>-->
                                                <td>@php echo $i; @endphp</td>
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->reviewdate)) }}</span></td>
                                                <td><span class="am-cell-primary">{{ $item->meetingatt }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->newquality }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="Edit" value=""
                                                        onclick="displaydetail({{ json_encode($item) }});">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="am-icon-btn"
                                                        title="Edit" value=""
                                                        onclick="getEid({{ $item }});"><i class="fa fa-pen"></i>
                                                    </button>
                                                    <button onclick="deleteData({{ $item }})"
                                                        class="am-icon-btn danger" title="Delete"
                                                        value=""><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                                <!--       <td>-->
                                                <!--   {{-- <button  onclick="deleteData({{$item}})" class="am-icon-btn danger" title="Delete" value=""><i class="fa fa-trash"></i>-->
                                        <!--   </button> --}}-->
                                                <!--</td>-->

                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $userData])
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <!--End::Section-->
    </div>
    <div class="modal fade text-right" id="deleteRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف مراجعة الإدارة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('deletemgtreview') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="validid">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade text-right" id="DetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تفاصيل مراجعات الإدارة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <input type="hidden" readonly disabled name="id" value="" id="id_feild">
                            <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Management Review ID Number (See table below. For amendments only):</label><br>
                                        <input type="number" readonly disabled class="form-control" name="1mgtreviewId">
                                    </div>
                                </div> -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تاريخ المراجعة الإدارية: </label><br>
                                    <input type="date" readonly disabled class="form-control" name="1reviewdate">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الحضور في اجتماع المراجعة الإدارية: </label>
                                    <input type="text" readonly disabled class="form-control" name="1meetingatt"
                                        placeholder="أدخل اسم الحضور:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مراجعة محضر الاجتماع السابق: </label>
                                    <input type="text" readonly disabled class="form-control" name="1prevmeeting"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>التعديلات في الشؤون الخارجية والداخلية التي تخص نظام إدارة الجودة والتغييرات
                                        الموصى بها:</label>
                                    <input type="text" readonly disabled class="form-control"
                                        placeholder="أدخل التغييرات" name="1recommendedchange">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم ملخص لاستطلاعات رضا العملاء وردود الفعل من الأطراف المعنية ذات
                                        الصلة:</label>
                                    <input type="text" readonly disabled class="form-control"
                                        placeholder="أدخل الملخص" name="1sammarisecustomr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم الملاحظات على الأهداف السابقة: </label>
                                    <input type="text" readonly disabled class="form-control"
                                        placeholder="أدخل تعليقات الكائنات السابقة" name="1prevobjectv">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إجراء تدقيق لأداء المنتجات والخدمات ومطابقتها مع معايير الجودة:</label>
                                    <input type="text" readonly disabled
                                        placeholder="أدخل تعليقات حول أداء المنتجات والخدمات" class="form-control"
                                        name="1conformity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>حديد حالات عدم المطابقة والإجراءات التصحيحية المناسبة:</label>
                                    <input type="text" readonly disabled class="form-control"
                                        placeholder="أدخل حالات عدم المطابقة والإجراءات التصحيحية"
                                        name="1nonconformities">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تحديد نتائج المراقبة والإشراف والقياس:</label>
                                    <input type="text" readonly disabled class="form-control"
                                        placeholder="أدخل النتيجة" name="1monitoringres">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم الملاحظات حول نتائج التدقيق: </label>
                                    <input type="text" readonly disabled class="form-control" name="1auditres">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم الملاحظات بشأن أداء مزودي الخدمات الخارجيين: </label>
                                    <input type="text" readonly disabled class="form-control"
                                        name="1externalprovider">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ضمان دقة الموارد والتغييرات الموصى بها: </label>
                                    <input type="text" readonly disabled class="form-control" name="1adequacy">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ضمان فعالية الإجراءات المتخذة لمعالجة المخاطر واستغلال الفرص: </label>
                                    <input type="text" readonly disabled class="form-control" name="1effectiveness">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إضافة أهداف الجودة الجديدة والمستهدفات وفرص التحسين، مع مراعاة الأطراف المسؤولة
                                        والجداول الزمنية للإنجاز ومعايير النجاح. وينبغي أن تشمل هذه الأهداف جوانب الجودة
                                        والجوانب المالية، مع أخذ المواءمة مع سياسة الجودة في الاعتبار:</label>
                                    <input type="text" readonly disabled class="form-control" name="1newquality">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>أهداف الصحة والسلامة الجديدة وفرص التحسين:</label>
                                    <input type="text" readonly disabled class="form-control" name="1newhealthsafety">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الأهداف البيئية الجديدة وفرص التحسين:</label>
                                    <input type="text" readonly disabled class="form-control" name="1newenvironmental">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الملف المرفق (PDF, jpeg, txt, .docx, doc, png):</label>
                                    <div class="file_attachemnt_div">
                                    </div>
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

    <div class="modal fade text-right" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل مراجعات الإدارة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mgtreviewupdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <input type="hidden" name="id" value="" id="sdsd">
                            <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Management Review ID Number (See table below. For amendments only):</label><br>
                                        <input type="number" class="form-control" name="mgtreviewId">
                                    </div>
                                </div> -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تاريخ المراجعة الإدارية: </label><br>
                                    <input type="date" max="2999-12-31" required class="form-control"
                                        name="reviewdate">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الحضور في اجتماع المراجعة الإدارية: </label>
                                    <input type="text" class="form-control" required name="meetingatt"
                                        placeholder="أدخل اسم الحضور:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>مراجعة محضر الاجتماع السابق: </label>
                                    <input type="text" class="form-control" required name="prevmeeting"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>التعديلات في الشؤون الخارجية والداخلية التي تخص نظام إدارة الجودة والتغييرات
                                        الموصى بها:</label>
                                    <input type="text" class="form-control" placeholder="أدخل التغييرات" required
                                        name="recommendedchange">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم ملخص لاستطلاعات رضا العملاء وردود الفعل من الأطراف المعنية ذات
                                        الصلة:</label>
                                    <input type="text" class="form-control" placeholder="أدخل الملخص" required
                                        name="sammarisecustomr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم الملاحظات على الأهداف السابقة: </label>
                                    <input type="text" class="form-control"
                                        placeholder="أدخل تعليقات الكائنات السابقة" required name="prevobjectv">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>جراء تدقيق لأداء المنتجات والخدمات ومطابقتها مع معايير الجودة:</label>
                                    <input type="text" class="form-control"
                                        placeholder="أدخل تعليقات حول أداء المنتجات والخدمات" required name="conformity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تحديد حالات عدم المطابقة والإجراءات التصحيحية المناسبة:</label>
                                    <input type="text"
                                        class="form-control"placeholder="أدخل حالات عدم المطابقة والإجراءات التصحيحية"
                                        name="nonconformities">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تحديد نتائج المراقبة والإشراف والقياس:</label>
                                    <input type="text" class="form-control" placeholder="أدخل النتيجة" required
                                        name="monitoringres">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم الملاحظات حول نتائج التدقيق: </label>
                                    <input type="text" class="form-control" required name="auditres">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تقديم الملاحظات بشأن أداء مزودي الخدمات الخارجيين: </label>
                                    <input type="text" class="form-control" required name="externalprovider">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ضمان دقة الموارد والتغييرات الموصى بها: </label>
                                    <input type="text" class="form-control" required name="adequacy">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ضمان فعالية الإجراءات المتخذة لمعالجة المخاطر واستغلال الفرص: </label>
                                    <input type="text" class="form-control" required name="effectiveness">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إضافة أهداف الجودة الجديدة والمستهدفات وفرص التحسين، مع مراعاة الأطراف المسؤولة
                                        والجداول الزمنية للإنجاز ومعايير النجاح. وينبغي أن تشمل هذه الأهداف جوانب الجودة
                                        والجوانب المالية، مع أخذ المواءمة مع سياسة الجودة في الاعتبار:</label>
                                    <input type="text" class="form-control" required name="newquality">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>أهداف الصحة والسلامة الجديدة وفرص التحسين:</label>
                                    <input type="text" class="form-control" name="newhealthsafety">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الأهداف البيئية الجديدة وفرص التحسين:</label>
                                    <input type="text" class="form-control" name="newenvironmental">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الملف المرفق (PDF, jpeg, txt, .docx, doc, png):</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="attach_file" accept="image/*,.doc, .docx,.txt,.pdf,.jpeg,.png">
                                        <label for="fileInput2" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
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


    {{-- deyail modal --}}

<script>
    function getEid(data) {
        console.log(data);
        $("#sdsd").val(data.id);
        $("input[name='adequacy']").val(data.adequacy);
        $("input[name='mgtreviewId']").val(data.mgtreviewId);
        $("input[name='auditres']").val(data.auditres);
        $("input[name='conformity']").val(data.conformity);
        $("input[name='effectiveness']").val(data.effectiveness);
        $("input[name='externalprovider']").val(data.externalprovider);
        $("input[name='meetingatt']").val(data.meetingatt);
        $("input[name='monitoringres']").val(data.monitoringres);
        $("input[name='newquality']").val(data.newquality);
        $("input[name='newhealthsafety']").val(data.newhealthsafety);
        $("input[name='newenvironmental']").val(data.newenvironmental);
        $("input[name='nonconformities']").val(data.nonconformities);
        $("input[name='prevmeeting']").val(data.prevmeeting);
        $("input[name='prevobjectv']").val(data.prevobjectv);
        $("input[name='recommendedchange']").val(data.recommendedchange);
        $("input[name='reviewdate']").val(data.reviewdate);
        $("input[name='sammarisecustomr']").val(data.sammarisecustomr);
        $("#editSupplier").modal('show');
    }

    function deleteData(data) {
        $("#validid").val(data.id);
        $("#deleteRequirment").modal('show');

    }

    function displaydetail(data) {
        $("input[name='1adequacy']").val(data.adequacy);
        $("input[name='1mgtreviewId']").val(data.mgtreviewId);
        $("input[name='1auditres']").val(data.auditres);
        $("input[name='1conformity']").val(data.conformity);
        $("input[name='1effectiveness']").val(data.effectiveness);
        $("input[name='1externalprovider']").val(data.externalprovider);
        $("input[name='1meetingatt']").val(data.meetingatt);
        $("input[name='1monitoringres']").val(data.monitoringres);
        $("input[name='1newquality']").val(data.newquality);
        $("input[name='1newhealthsafety']").val(data.newhealthsafety);
        $("input[name='1newenvironmental']").val(data.newenvironmental);
        $("input[name='1nonconformities']").val(data.nonconformities);
        $("input[name='1prevmeeting']").val(data.prevmeeting);
        $("input[name='1prevobjectv']").val(data.prevobjectv);
        $("input[name='1recommendedchange']").val(data.recommendedchange);
        $("input[name='1reviewdate']").val(data.reviewdate);
        $("input[name='1sammarisecustomr']").val(data.sammarisecustomr);
        console.log("modal here");
        if(data.attach_file){
			$('.file_attachemnt_div').empty().append(`<a target="_blank" href="${data.attach_file}">Click to View</a>`);
		}else{
			$('.file_attachemnt_div').empty().append('No data found');
		}
        $("#DetailModal").modal('show');
    }

    function mngmnt_reviews() {

        if ($(".managemnet_review_from_div").css("display") === "block") {
            $(".managemnet_review_from_div").css("display", "none");
        } else {
            $(".managemnet_review_from_div").css("display", "block");
        }
    }
</script>
@endsection
