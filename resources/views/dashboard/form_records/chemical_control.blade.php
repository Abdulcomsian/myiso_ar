@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>COSHH</h2>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <!-- <p>Control of Substances Hazardous to Health (COSHH). COSHH is a method that allows employers to
                        control substances that are hazardous to health. You can prevent or reduce workers exposure to
                        hazardous substances by:</p>
                    <ul>
                        <li style="font-size:13px;color:#000;font-weight:500;">finding out what the health hazards
                            are.
                        </li>
                        <li style="font-size:13px;color:#000;font-weight:500;">deciding how to prevent harm to health
                            (risk assessment).
                        </li>
                        <li style="font-size:13px;color:#000;font-weight:500;">providing control measures to reduce harm
                            to health.
                        </li>
                        <li style="font-size:13px;color:#000;font-weight:500;">making sure they are used.</li>
                        <li style="font-size:13px;color:#000;font-weight:500;">keeping all control measures in good
                            working order.
                        </li>
                        <li style="font-size:13px;color:#000;font-weight:500;">providing information, instruction and
                            training for employees and others.
                        </li>
                        <li style="font-size:13px;color:#000;font-weight:500;">providing monitoring and health
                            surveillance in appropriate cases.
                        </li>
                        <li style="font-size:13px;color:#000;font-weight:500;">planning for emergencies.</li>
                    </ul>
                    <p>Most businesses use substances, or products that are mixtures of substances. Some processes
                        create substances. These could cause harm to employees, contractors and other people.</p>
                    <p>Sometimes substances are easily recognised as harmful. Common substances such as paint, bleach or
                        dust from natural materials may also be harmful.</p> -->
                        <div class="am-card" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
                            <div style="display:flex;gap:12px;align-items:flex-start;">
                                <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;">
                                    <i class="fa fa-info-circle"></i>
                                </span>
                                <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                                    <p>صُمم نظام الرقابة على المواد التي تُشكل خطرًا على الصحة (COSHH) لتمكين أصحاب العمل من مراقبة المواد التي تُشكل خطرًا على الصحة، فضلًا عن وضع معايير خاصة للحد من أو تقليل تعرّض الموظفين للمواد الخطرة من خلال الاحتفاظ بسجل معلومات يخضع للتحديث المستمر عن هذه المواد. </p>
                                    <p>لإضافة سجل، يرجى النقر على زر "إضافة COSHH". لتعديل سجل، يرجى النقر على أيقونة التعديل الخاصة بالقيد المراد تعديله أو حذفه. </p>
                                </div>
                            </div>
                        </div>

                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row mb-3">
                            <div class="col-lg-12 text-right">
                                <a onclick="processinterestedForm()" class="am-btn am-btn-primary">إضافة COSHH</a>
                            </div>
                        </div>
                        <div class="process_interested_from_div" style="display:none">
                            <form action="{{route('chemicalform')}}" method="POST" enctype="multipart/form-data" class="am-form">
                                @csrf
                                <div class="form-row">
                                    <div>
                        <div class="form-group">
                            <label>اسم المادة الكيميائية / المادة الخطرة:</label>
                            <input type="text" name="chemicalname" class="form-control" required
                                   placeholder="أدخل الاسم الكيميائي">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>نوع المادة (غاز، سائل، صلب):</label>
                            <input type="text" name="chemical_type" class="form-control" required
                                   placeholder="أدخل النوع الكيميائي (غاز، سائل، صلب)">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>موقع الاستخدام (مثال ذلك المنطقة أو القسم الذي تُستخدم فيه هذه المادة):</label>
                            <input type="text" name="location" class="form-control" required
                                   placeholder="أدخل الموقع المستخدم (ضع في اعتبارك المنطقة أو القسم الذي يتم استخدام المادة الكيميائية فيه">
                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:1/-1;">
                        <div class="form-group">
                            <label>الوصف الكيميائي (ما هي العناصر الرئيسية في هذه المادة):</label>
                            <input type="text" name="chemical_desc" class="form-control" required
                                   placeholder="أدخل الوصف الكيميائي">
                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                        <div class="form-group">
                            <label>الخطر المترتب على الأنشطة (مثال ذلك الاستخدام الكيميائي وإجراء إضافات للمادة والتخلص منها، وغير ذلك):</label>
                            <input type="text" name="activity_hazard" class="form-control" required
                                   placeholder="أدخل خطر النشاط (ضع في اعتبارك استخدام المواد الكيميائية، وعمل الإضافات، والتخلص من المواد الكيميائية، وما إلى ذلك)">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>الأخطار الكيميائية المثبتة (مثال ذلك أن تؤدي المادة إلى التآكل أو أن تكون عالية السمّية أو مؤكسدة) :</label>
                            <input type="text" name="identified_chazard" class="form-control" required
                                   placeholder="أدخل المخاطر الكيميائية المحددة">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>الأخطار المثبتة (مثال ذلك البقع أو استنشاق بخار الأدخنة وغير ذلك):</label>
                            <input type="text" name="identified_hazard" class="form-control" required
                                   placeholder="أدخل المخاطر المحددة">
                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                        <div class="form-group">
                            <label>الأجهزة المستهدفة:</label>
                            <input type="text" name="target_organs" class="form-control" required
                                   placeholder="أدخل الأجهزة المستهدفة">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>الفئات الأكثر عرضة للخطر: </label>
                            <input type="text" name="who_risk" class="form-control" required
                                   placeholder="الفئات الأكثر عرضة للخطر: ">
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>وسائل الحماية المطلوبة (مثال ذلك ارتداء قفازات أو نظارات أو لباس العمل أو الأحذية وغير ذلك):</label>
                            <input type="text" name="protection_required" class="form-control" required
                                   placeholder="أدخل الحماية المطلوبة">
                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                        <div class="form-group">
                            <label>هل لا تزال مستخدمة في مكان العمل؟</label>
                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                    <input type="radio" required value="Yes" name="still_used"> نعم
                                </label>
                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                    <input type="radio" required value="No" name="still_used"> لا
                                </label>

                            </div>
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>إرفاق صحيفة البيانات من الشركة المصنّعة: <span class="text-danger"
                                                          style="color:#000 !important;">(jpeg, mp3, mp4, .xls, doc)</span></label>
                            {{-- <input name="attach_evidence" type="file" class="form-control"
                                   accept="all"> --}}
                            <div class="custom-file-input-tag form-control">
                            <input type="file" id="fileInput1" class="input-file" name="attach_evidence" accept="all"/>
                                <label for="fileInput1" class="file-label">
                                    <span class="file-text">اختيار الملف</span>
                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                </label>
                            </div>
                        </div>
                                    </div>
                                    <div>
                        <div class="form-group">
                            <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ </label>
                            <textarea name="any_issues" class="form-control"
                                      placeholder="أدخل أي مشاكل أخرى:"></textarea>
                        </div>
                                    </div>
                                </div>

                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                        <button type="reset" onclick="cosh()" class="am-btn am-btn-outline">
                                        يلغي
                                    </button>
                                        <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                    </div>
                            </form>
                    </div>
                </div>
                <div class="am-card" style="margin-bottom:16px;">
                    <div class="requirments_table_div">
                        <div class="am-table-wrap">
                            <!--begin: Datatable -->
                            <table class="am-table chemical_table"
                                   id="kt_table_agent">
                                <thead>
                                <tr>
                                    <th>الرقم التسلسلي</th>
                                    <th>الاسم الكيميائي </th>
                                    <th>الوصف الكيميائي </th>
                                    <th>موقع الاستخدام </th>
                                    <th>النشاط </th>
                                    <th>لا زالت قيد الاستخدام </th>
                                    <!--	<th>Created At</th>-->
                                    <th>النشاط </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter = 0; ?>
                                @php
                                    $i=1;

                                @endphp
                                @foreach ($chemical as $data)
                                    <?php $counter++; ?>
                                    <tr>
                                        <td><span class="am-cell-sub">{{ $i++}}</span></td>
                                        <td><span class="am-cell-primary">{{ $data->chemical_name}}</span></td>
                                        <td><span class="am-cell-sub">{{ $data->chemical_desc}}</span></td>
                                        <td><span class="am-cell-sub">{{ $data->location_used}}</span></td>
                                        <td><span class="am-cell-sub">{{$data->activity_hazard}}</span></td>
                                        <td><span class="am-cell-sub">{{$data->still_used}}</span></td>
                                        <!--<td><span class="am-chip info">{{date('d/m/Y h:i', strtotime($data->created_at))}}</span></td>-->

                                        <td style="text-align:left;white-space:nowrap;">
                                            <button class="am-icon-btn" title="View"
                                                    onclick="viewinterested({{$data}});">
                                                <!--<i class="fa fa-eye"></i>-->

                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button class="am-icon-btn" title="Edit"
                                                    onclick="getEid({{$data}});"><i class="fa fa-pen"></i>
                                            </button>

                                            <button type="button" class="am-icon-btn danger" title="حذف" data-toggle="modal" data-target="#deleteChemechal_id{{$data->id}}">
                                                    <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!--delete modal for chemecal control-->
                                    <div class="modal fade" id="deleteChemechal_id{{$data->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="exampleModalLabel" style="display: none;"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header am-modal__header">
                                                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف السجل الكيميائي</h5>
                                                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                </div>
                                                <div class="modal-footer am-modal__footer">
                                                    <form action="{{url('/chemical_control_delete')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                        <button type="button" class="am-btn am-btn-outline"
                                                                data-dismiss="modal">لا
                                                        </button>
                                                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم                                                        </button>
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
                        @include('dashboard.form_records.partials.am_paginator', ['paginator' => $chemical])
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
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف الرقابة الكيميائية</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد؟ هل تريد حقا حذف هذا؟.</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{route('deleteInterested')}} " method="POST">
                        @csrf
                        <input type="hidden" name="id" value="" id="re_id">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-right" id="editinterestedmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل التحكم الكيميائي</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <form action="{{route('chemicalUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="" id="id_feild" name="id">
                                                <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>اسم المادة الكيميائية / المادة الخطرة:</label>
                                <input type="text" name="chemical_name" required class="form-control"
                                       placeholder="أدخل الاسم الكيميائي">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>نوع المادة (غاز أو سائل أو صلب):</label>
                                <input type="text" name="chemical_type" required class="form-control"
                                       placeholder="أدخل النوع الكيميائي">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group">
                                <label>الوصف الكيميائي (ما هي المكونات الرئيسية):</label>
                                <input type="text" name="chemical_desc" required class="form-control"
                                       placeholder="أدخل الوصف الكيميائي">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>الموقع المستخدم (ضع في اعتبارك المنطقة أو القسم الذي تستخدم فيه المادة الكيميائية):</label>
                                <input type="text" name="location" required class="form-control"
                                       placeholder="إدخال الدولة">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>خطر النشاط (ضع في اعتبارك استخدام المواد الكيميائية، وعمل الإضافات، والتخلص من المواد الكيميائية، وما إلى ذلك):</label>
                                <input type="text" name="activity_hazard" required class="form-control"
                                       placeholder="أدخل خطر النشاط">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>المخاطر الكيميائية المحددة (ضع في اعتبارك المواد المسببة للتآكل، والسامة جدًا، والمؤكسدات، وما إلى ذلك):</label>
                                <input type="text" name="identified_chazard" required class="form-control"
                                       placeholder="أدخل المخاطر الكيميائية المحددة" id="identified_chazard">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>المخاطر التي تم تحديدها (ضع في اعتبارك البقع واستنشاق بخار الدخان وما إلى ذلك):</label>
                                <input type="text" name="identified_hazard" required class="form-control"
                                       placeholder="أدخل المخاطر المحددة" id="identified_hazard">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>الجهاز المستهدف</label>
                                <input type="text" name="target_hazard" required class="form-control"
                                       placeholder="أدخل خطر الهدف المحدد">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>Who is at Risk</label>
                                <input type="text" name="who_risk" required class="form-control"
                                       placeholder="أدخل من هو في خطر">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>الحماية المطلوبة (ضع في اعتبارك القفازات أو النظارات أو الملابس أو الأحذية وما إلى ذلك):</label>
                                <input type="text" name="protection_required" required class="form-control"
                                       placeholder="الحماية مطلوبة">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>هل لا تزال مستخدمة في مكان العمل؟</label>
                                <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="Yes" name="still_used"> نعم
                                    </label>
                                    <label style="display:inline-flex;gap:4px;align-items:center;">
                                        <input type="radio" value="No" name="still_used"> لا
                                    </label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>إرفاق صحيفة البيانات من الشركة المصنّعة: <span class="text-danger" style="color:#000 !important;">(jpeg, mp3, mp4, .xls, doc)</span></label>
                                {{-- <input name="attach_evidence" type="file" class="form-control"
                                       accept="all"> --}}
                                       <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="attach_evidence" accept="all"/>
                                            <label for="fileInput2" class="file-label">
                                                <span class="file-text">اختيار الملف</span>
                                                <span class="file-chosen">لم يتم اختيار ملف</span>
                                            </label>
                                        </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label>هل هناك أي مشاكل أو نقاط أخرى ترغب بالإشارة إليها؟ 
                                </label>
                                <textarea name="any_issues" class="form-control"
                                          placeholder="أدخل أي مشاكل أخرى:"></textarea>
                            </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-12">-->
                        <!--	<div class="form-group">-->
                        <!--		<label>Evidence:</label>-->
                        <!--		<input type="text" class="form-control" name="evidence30" placeholder="أدخل الأدلة::">-->
                        <!--	</div>-->
                        <!--</div>-->
                        </div>

                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="viewinterestedparty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تفاصيل التحكم الكيميائي</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
					</a>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="" id="id_feild" name="id">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>اسم المادة الكيميائية / المادة الخطرة</label>
                                    <input type="text" name="chemical_name" required class="form-control"
                                           placeholder="أدخل الاسم الكيميائي:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الوصف الكيميائي (ما هي المكونات الرئيسية):</label>
                                    <input type="text" name="chemical_desc" required class="form-control"
                                           placeholder="أدخل الوصف الكيميائي:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>نوع المادة (غاز أو سائل أو صلب):</label>
                                    <input type="text" name="chemical_type" required class="form-control"
                                           placeholder="أدخل النوع الكيميائي:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الموقع المستخدم (ضع في اعتبارك المنطقة أو القسم الذي تستخدم فيه المادة الكيميائية):</label>
                                    <input type="text" name="location" required class="form-control"
                                           placeholder="إدخال الدولة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>خطر النشاط (ضع في اعتبارك استخدام المواد الكيميائية، وعمل الإضافات، والتخلص من المواد الكيميائية، وما إلى ذلك):</label>
                                    <input type="text" name="activity_hazard" required class="form-control"
                                           placeholder="أدخل خطر النشاط:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>المخاطر الكيميائية المحددة (ضع في اعتبارك المواد المسببة للتآكل، والسامة جدًا، والمؤكسدات، وما إلى ذلك):</label>
                                    <input type="text" name="identified_chazard" required class="form-control"
                                           placeholder="أدخل المخاطر الكيميائية المحددة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>المخاطر التي تم تحديدها (ضع في اعتبارك البقع واستنشاق بخار الدخان وما إلى ذلك):</label>
                                    <input type="text" name="identified_hazard" required class="form-control"
                                           placeholder="أدخل المخاطر المحددة:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Target Organ</label>
                                    <input type="text" name="target_hazard" required class="form-control"
                                           placeholder="Enter Identified Target Hazard:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>من في عرضة للخطر :</label>
                                    <input type="text" name="who_risk" required class="form-control"
                                           placeholder="من في عرضة للخطر">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الحماية المطلوبة (ضع في اعتبارك القفازات أو النظارات أو الملابس أو الأحذية وما إلى ذلك):</label>
                                    <input type="text" name="protection_required" required class="form-control"
                                           placeholder="الحماية المطلوبة:">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هل لا تزال مستخدمة في مكان العمل؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" required value="Yes" name="still_used"> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" required value="No" name="still_used"> لا
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-lg-12">-->
                            <!--	<div class="form-group">-->
                            <!--		<label>Evidence:</label>-->
                            <!--		<input type="text" class="form-control" name="evidence30" placeholder="أدخل الأدلة::">-->
                            <!--	</div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق صحيفة البيانات من الشركة المصنّعة: <span class="text-danger" style="color:#000 !important;">(jpeg, mp3, mp4, .xls, doc)</span>:</label>
                                    <div class="evidence_attachemnt_div"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>هل هناك أي قضايا أو نقاط أخرى يجب ملاحظتها؟</label>
                                    <textarea name="any_issues" class="form-control" placeholder="أدخل أي مشاكل أخرى:"></textarea>

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
        console.log(data);
        $("#id_feild").val(data.id);
        $("input[name='chemical_name']").val(data.chemical_name);
        $("input[name='chemical_desc']").val(data.chemical_desc);
        $("input[name='chemical_type']").val(data.chemical_type);
        $("input[name='location']").val(data.location_used);
        $("input[name='activity_hazard']").val(data.activity_hazard);
        $("input[name='identified_chazard']").val(data.identified_chazard);
        $("input[name='identified_hazard']").val(data.identified_hazard);

        $("input[name='target_hazard']").val(data.target_hazard);
        $("input[name='who_risk']").val(data.who_risk);
        $("input[name='protection_required']").val(data.protection_required);
        $("input[name='still_used'][value=" + data.still_used + "]").prop('checked', true);
        $("textarea[name='any_issues']").val(data.any_issues);
        $("#editinterestedmodal").modal('show');
    }

    function viewinterested(data) {
        console.log(data);

        $("#id_feild").val(data.id);
        $("input[name='chemical_name']").val(data.chemical_name);
        $("input[name='chemical_desc']").val(data.chemical_desc);
        $("input[name='chemical_type']").val(data.chemical_type);
        $("input[name='location']").val(data.location_used);
        $("input[name='activity_hazard']").val(data.activity_hazard);
        $("input[name='identified_chazard']").val(data.identified_chazard);
        $("input[name='identified_hazard']").val(data.identified_hazard);
        $("input[name='target_hazard']").val(data.target_hazard);
        $("input[name='who_risk']").val(data.who_risk);
        $("input[name='protection_required']").val(data.protection_required);
        $("input[name='still_used'][value=" + data.still_used + "]").prop('checked', true);
        $("textarea[name='any_issues']").val(data.any_issues);
        if (data.attach_evidence) {
            $('.evidence_attachemnt_div').empty().append(`<span class="text-dark">Click to view evidence <a target="_blank" href="${data.attach_evidence}">Here</a></span>`);
        } else {
            $('.evidence_attachemnt_div').empty().append('No data found');
        }
        $("#viewinterestedparty").modal('show');
    }

    function deleteModal(data) {
        $("#re_id").val(data.id);
        $("#deleteRequirment").modal('show');

    }

    function cosh() {
        if ($(".process_interested_from_div").css("display") === "block") {
            $(".process_interested_from_div").css("display", "none");
        } else {
            $(".process_interested_from_div").css("display", "block");
        }
    }
</script>
@endsection
