@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>الموظفون</h2>
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
                                <p>إضافة الموظفين سيحفظ جميع معلومات طاقم العمل ذات الصلة بدقة، بما في ذلك التدريب والمهارات.</p>
                                <p>لإضافة سجل، انقر على الزر "إضافة موظف". لتعديل سجل، انقر على رمز التحرير الخاص بالقيد المراد تعديله
                                أو حذفه.</p>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('Error'))
                        <h5 class="text-danger"> {{ Session::get('Error') }} </h5>
                    @endif
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                              <a onclick="employeeForm()" class="am-btn am-btn-primary">إضافة موظف</a>  &nbsp;<a onclick="employeeSkillForm()" class="am-btn am-btn-primary">إضافة مهارات العمليات للموظف</a> &nbsp;<a onclick="employeeRecordForm()" class="am-btn am-btn-primary"> إضافة سجل تدريب للموظف</a>
                            </div>
                        </div>
                        <div class="employee_from_div">
                            <form method="POST" action="{{ route('employee') }}" enctype="multipart/form-data"
                                class="addForm">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-6">
                    					<div class="form-group">
											<label>System ID Number:</label><br>
											<input type="number" class="form-control" required  name="systemid">
										</div>
                    				</div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>اللقب:</label><br>
                                            <input type="text" class="form-control" name="surname" required
                                                placeholder="أدخل اللقب" data-type="add">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>الاسم الأول:</label>
                                            <input type="text" class="form-control" name="first_name" required
                                                placeholder="أدخل الاسم الأول">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>بريد إلكتروني:</label>
                                            <input type="email" class="form-control" name="email" required placeholder="أدخل البريد الإلكتروني">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group add-emp-number-div">
                                            <label> رقم تعريف الموظف:</label>
                                            <input name="empNumber" type="text" class="form-control" required
                                                placeholder="أدخل رقم هوية الموظف" data-type="add">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                            <input name="startDate" max="2999-12-31" required type="date"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>تحميل السيرة الذاتية للموظف:</label>
                                            {{-- <input name="employee_cv" type="file" class="form-control"
                                                accept="image/*,.doc, .docx,.txt,.pdf"> --}}
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput1" class="input-file" name="employee_cv" accept="image/*,.doc, .docx,.txt,.pdf"/>
                                                <label for="fileInput1" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>الوصف الوظيفي:</label>
                                            <!-- <input type="text" name="jobdetails" required class="form-control"  placeholder="Enter Job Description"> -->
                                            <textarea name="jobdetails" cols="20" rows="5" class="form-control" placeholder="أدخل الوصف الوظيفي:"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
             <div class="col-lg-6">
              
             </div>
            </div> -->
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="emp1()" class="am-btn am-btn-outline">يلغي</button>
                                    <button class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="am-card m-t-20 skill" style="padding:22px;margin-bottom:16px;">
                        <!--<div class="row">-->
                        <!--    <div class="col-lg-12 text-right">-->
                        <!--        <a onclick="employeeSkillForm()" class="am-btn am-btn-primary">إضافة مهارات العمليات للموظف</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="employee_skill_from_div">
                            <form action="{{ route('empSkills') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم تعريف الموظف:</label><br>

                                            <select name="empid" required class="form-control">
                                                <option value="" selected="selected" disabled="disabled">حدد واحدًا
                                                </option>
                                                @if (isset($userinfo) && $userinfo != '')
                                                    @foreach ($userinfo as $item)
                                                        <option value="{{ $item->id }}" title="{{ $item->first_name }}">
                                                            {{ $item->empNumber . ' (' . $item->first_name . ')' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>المهارة:</label><br>
                                            <input type="text" name="empskill" class="form-control" required
                                                placeholder="أدخل مهارة">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="emp2()" class="am-btn am-btn-outline">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="am-card m-t-20 record" style="padding:22px;margin-bottom:16px;">
                        <!--<div class="row">-->
                        <!--    <div class="col-lg-12 text-right">-->
                        <!--        <a onclick="employeeRecordForm()" class="am-btn am-btn-primary"> إضافة سجل تدريب للموظف</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="employee_record_from_div">
                            <form action=" {{ route('empTraining') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم تعريف الموظف:</label><br>

                                            <select name="empid" required class="form-control">
                                                <option value="" selected="selected" disabled="disabled">حدد واحدًا
                                                </option>
                                                @if (isset($userinfo) && $userinfo != '')
                                                    @foreach ($userinfo as $item)
                                                        <option value="{{ $item->id }}"
                                                            title="{{ $item->first_name }}">
                                                            {{ $item->empNumber . ' (' . $item->first_name . ')' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تاريخ التدريب (شهر/يوم/سنة):</label><br>
                                            <input type="date" max="2999-12-31" required class="form-control"
                                                name="traningdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تفاصيل التدريب:</label><br>
                                            <input type="text" class="form-control" required name="traningdetails">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تحميل شهادة التدريب (PDF, jpeg,  png):</label>
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput3" class="input-file" name="attach_file" accept="image/*,.pdf,.jpeg,.png">
                                                <label for="fileInput3" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="emp3()" class="am-btn am-btn-outline">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div" style="margin-top: 0px;">

                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table
                                    class="am-table"
                                    id="kt_table_agent2">
                                    <thead>
                                        <tr>
                                            <th style="width:170px;">رقم تعريف الموظف</th>
                                            <th style="width:150px;">اللقب</th>
                                            <th style="width:150px;">الاسم الأول</th>
                                            <!--<th>Employee Number</th>-->
                                            <th style="width:200px;">تاريخ البدء </th>
                                            <th style="width:240px;">الوصف الوظيفي</th>
                                            <th style="width:240px;">بريد إلكتروني</th>
                                            <th style="width:120px;">السيرة الذاتية</th>
                                            <th style="width:150px;">النشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $n = 1; @endphp
                                        @forelse ($userinfo as $item)
                                            <tr>
                                                <!--<td><span class="am-cell-sub">{{ $n }}</span></td>-->
                                                <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                                                <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>
                                                <!--<td> {$item->empNumber}</td>-->

                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->startDate)) }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->jobdetails }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->email }}</span></td>
                                                <td>

                                                    @if (!empty($item->cv))
                                                        <?php
													$path_info = explode('.', $item->cv);
													if($path_info[1]=="pdf"){
													
												?>
                                                        <a target="_blank" style="color: blue;cursor: pointer;"
                                                            data-toggle="modal" data-target="#cv{{ $item->id }}">عرض
                                                            السيرة الذاتية</a>
                                                        <?php
													}else{
												?>
                                                        <a target="_blank" download href="{{ asset($item->cv) }}">عرض
                                                            السيرة الذاتية</a>
                                                        <?php } ?>

                                                        <!-- Modal -->
                                                        <div class="modal fade text-right" id="cv{{ $item->id }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="viewcvLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header am-modal__header">
                                                                        <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                        <h5 class="modal-title am-modal__title" id="viewcvLabel">عرض
                                                                            السيرة الذاتية</h5>
																			<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																			</a>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <!--<iframe frameborder="0" style="min-height: 500px;overflow:scroll; width: 100%" scrolling="yes" src="{{ asset($item->cv) }}"></iframe>-->


                                                                        <object data="{{ asset($item->cv) }}"
                                                                            type="application/pdf">
                                                                            <embed src="{{ asset($item->cv) }}"
                                                                                type="application/pdf" />
                                                                        </object>
                                                                    </div>
                                                                    <div class="modal-footer am-modal__footer">
                                                                        <a href="{{ asset($item->cv) }}" download>
                                                                            <h5 class="modal-title"
                                                                                style="float:right;text-align:Right;">تحميل
                                                                                السيرة الذاتية</h5>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        لاتوجد بيانات
                                                    @endif
                                                </td>
                                                {{--                                            <td><img src="{{ asset($item->cv) }}" alt=""></td> --}}
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal" data-target="#employ{{ $item->id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>
                                                    <button onclick="getEid({{ json_encode($item) }});"
                                                        class="am-icon-btn" title="Edit">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn"
                                                        onclick="deleteempl({{ $item->id }})"
                                                        title="Delete Employee">
                                                        <i class="fa fa-trash"></i>

                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="employ{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="model1Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">إجمالي
                                                                        الموظفين المدرجين</h5>
																		<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																		</a>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>اسم العائلة:</label><br>
                                                                                <input type="text" class="form-control"
                                                                                    name="surname"
                                                                                    placeholder="أدخل اللقب"
                                                                                    value="{{ $item->surname }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>الاسم الأول:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="first_name"
                                                                                    placeholder="أدخل الاسم الأول"
                                                                                    value="{{ $item->first_name }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group edit-emp-number-div">
                                                                                <label>هوية الموظف:</label>
                                                                                <input type="text" name="empNumber"
                                                                                    required class="form-control"
                                                                                    data-type="edit"
                                                                                    value="{{ $item->empNumber }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                                                                <input name="startDate" max="2999-12-31"
                                                                                    type="date" class="form-control"
                                                                                    value="{{ $item->startDate }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>الوصف الوظيفي</label>
                                                                                <!-- <input type="text" name="jobdetails" class="form-control"  placeholder="Enter Job Details:" value="{{ $item->jobdetails }}" readonly> -->
                                                                                <textarea name="jobdetails" id="" cols="20" rows="5" class="form-control"
                                                                                    placeholder="أدخل الوصف الوظيفي:">{{ $item->jobdetails }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>Upload Employee CV:</label>
                                                                                <input name="employee_cv" type="file" class="form-control" accept="image/*,.doc, .docx,.txt,.pdf">
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
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
                                            @php $n++; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="8">
                                                    <div class="am-empty">
                                                        <i class="fa fa-id-badge"></i>
                                                        <p>لم تتم إضافة أي موظفين بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
                    <div class="am-card m-t-20" style="padding:22px;margin-bottom:16px;">
                        <div class="requirments_table_div" style="margin-top: 0px;">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table
                                    class="am-table"
                                    id="kt_table_agent">
                                    <thead>
                                        <tr>
                                            <!--<th>Skills ID</th>-->
                                            <th style="width:170px;">رقم تعريف الموظف:</th>
                                            <th style="width:150px;">اللقب</th>
                                            <th style="width:150px;">الاسم الأول</th>
                                            <!--<th>Employee Number</th>-->
                                            <th style="width:560px;">المهارة:</th>
                                            <th style="width:150px;">النشاط</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($employess as $item)
                                            <tr>
                                                <!--<td> { item->skill_id} </td>-->
                                                <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                                                <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>
                                                <!--<td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>-->
                                                <td><span class="am-cell-sub">{{ $item->empskill }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal" data-target="#skill{{ $item->skill_id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>
                                                    <button onclick="getEidskill({{ json_encode($item) }});"
                                                        class="am-icon-btn"
                                                        title="Edit"><i class="fa fa-pen"></i>
                                                    </button>
                                                    <!-- new  -->
                                                    <button class="am-icon-btn"
                                                        onclick="deleteemplskill({{ $item->skill_id }})"
                                                        title="Delete Employee">
                                                        <i class="fa fa-trash"></i>

                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="skill{{ $item->skill_id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="model2Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">إجمالي
                                                                        مهارات الموظفين المدرجة</h5>
																		<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																		</a>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>رقم تعريف الموظف:</label><br>
                                                                                <input type="text" class="form-control"
                                                                                    name="surname"
                                                                                    placeholder="أدخل اللقب"
                                                                                    value="{{ $item->empNumber }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>المهارة:</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="first_name"
                                                                                    placeholder="أدخل الاسم الأول"
                                                                                    value="{{ $item->empskill }}"
                                                                                    readonly>
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
                                                </td>

                                                </td>



                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <div class="am-empty">
                                                        <i class="fa fa-tools"></i>
                                                        <p>لم يتم تسجيل أي مهارات بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

                    <div class="am-card m-t-20" style="padding:22px;margin-bottom:16px;">
                        <div class="requirments_table_div" style="margin-top: 0px;">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table
                                    class="am-table"
                                    id="kt_table_agent">
                                    <thead>
                                        <tr>
                                            <th style="width:170px;">رقم تعريف الموظف</th>
                                            <th style="width:150px;">اللقب</th>
                                            <th style="width:150px;">الاسم الأول</th>
                                            <th style="width:200px;">تاريخ البدء</th>
                                            {{-- <th>Employee Stamp Number</th> --}}
                                            <th style="width:240px;">تاريخ التدريب</th>
                                            <th style="width:120px;"> تفاصيل التدريب</th>
                                            <th style="width:150px;"> الإجراءات</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($emptraining as $item)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                                                <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>

                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->startDate)) }}</span></td>
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->traningdate)) }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->traningdetails }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal"
                                                        data-target="#training{{ $item->traning_id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>
                                                    <button onclick="getEidtraining({{ json_encode($item) }});"
                                                        class="am-icon-btn"
                                                        title="Edit"><i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn"
                                                        onclick="deleteempltraining({{ $item->traning_id }})"
                                                        title="Delete Employee">
                                                        <i class="fa fa-trash"></i>

                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="training{{ $item->traning_id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="model3Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">ملخص
                                                                        سجل التدريب</h5>
																		<a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
																		</a>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>رقم تعريف الموظف</label><br>
                                                                                <input type="text" class="form-control"
                                                                                    name="surname"
                                                                                    placeholder="أدخل معرف الموظف"
                                                                                    value="{{ $item->empNumber }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>تاريخ التدريب (يوم/شهر/سنة):</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="first_name"
                                                                                    placeholder="أدخل الاسم الأول"
                                                                                    value="{{ $item->traningdate }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group edit-emp-number-div">
                                                                                <label>تفاصيل التدريب</label>
                                                                                <input type="text" name="empNumber"
                                                                                    required class="form-control"
                                                                                    data-type="edit"
                                                                                    value="{{ $item->traningdetails }}"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @if ($item->attach_cert)
																<div class="row">
																	<div class="col-lg-12">
																		<div class="form-group edit-emp-number-div">
																			<label>شهادة التدريب</label><br>
																			<a href="{{$item->attach_cert}}" target="_blank">انقر للعرض</a>
																		</div>
																	</div>
																</div>
																@endif	
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
                                                <td colspan="7">
                                                    <div class="am-empty">
                                                        <i class="fa fa-graduation-cap"></i>
                                                        <p>لا توجد سجلات تدريب بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse

                                         @foreach ($wp_users as $wpuser)
										@foreach($wpuser as $user)
										@php
											$uid= '"user_id";i:'.$user->ID.';';
           									$options = App\CertificateOption::where('option_name', 'LIKE', "%user_cert_%")->Where('option_value', 'LIKE', "%".$uid."%")->get();
											$finshedcourses = App\CertificateUserItems::Where('ID', $user->ID)->where('user_status','finished')->get();

											//print_r($options);
											if(count($finshedcourses)>0)
											{   
												foreach ($finshedcourses as $key => $finshedcourse) {
													$courses = App\CertificateCourse::where('ID',$finshedcourse->item_id)->get();
													foreach ($courses as $key => $course) {
														$usercourses[]= $course->post_title;
														$postDate[]=$course->post_date;
													}
												   
													$startdate=$finshedcourse->start_time;
													$endate=$finshedcourse->end_time;
												}
												$laravel_employee_detail = App\Employee::where('email', $user->user_email)->first();
										@endphp
										@if(!empty($usercourses) && count($usercourses) > 0)
										@foreach($usercourses as $key => $usercourse)

                                        <tr>
											<td><span class="am-cell-sub">{{$laravel_employee_detail->empNumber}}</span></td>
                                            <td><span class="am-cell-sub">{{$laravel_employee_detail->surname}}</span></td>
											<td><span class="am-cell-sub">{{$laravel_employee_detail->first_name}}</span></td>
											<td><span class="am-cell-sub">{{$startdate}}</span></td>
											<td><span class="am-cell-sub">{{$endate}}</span></td>
											<td>
												
												   <li>
													{{ $usercourse}}
													</li>
												
											</td>
											
											<td> </td>
                                        </tr>
										@endforeach
										@endif
										@php } @endphp 
										@endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
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
                    <h5 class="modal-title am-modal__title" id="modallabel">حذف الموظف</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body ">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('employess-delete') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" name="id" id="res_id" />
                        <input type="hidden" name="type" value="" id="type" />
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- edit modal --}}
    <div class="modal fade text-right" id="editepmloyee" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير الموظف</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form method="POST" action=" {{ route('editemployee') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editproject" value="">
                                                <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اللقب:</label><br>
                                    <input type="text" class="form-control" name="surname" placeholder="أدخل اللقب">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الاسم الأول</label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="أدخل الاسم الأول">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 edit-emp-number-div">
                                                            <div class="form-group edit-emp-number-div">
                                                                <label>هوية الموظف:</label>
                                                                <input type="text" name="empNumber" required class="form-control"
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                    <input name="startDate" max="2999-12-31" type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الوصف الوظيفي:</label>
                                    <!-- <input type="text" name="jobdetails" class="form-control"  placeholder="Enter Job Description:"> -->
                                    <textarea name="jobdetails" id="jobdetails2" cols="20" rows="5" class="form-control"
                                        placeholder="أدخل الوصف الوظيفي:"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تحميل السيرة الذاتية للموظف:</label>
                                    {{-- <input name="employee_cv" type="file" class="form-control"
                                        accept="image/*,.doc, .docx,.txt,.pdf"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="employee_cv" accept="image/*,.doc, .docx,.txt,.pdf"/>
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
                                    <label>System ID Number:</label><br>
                                    <input type="number" class="form-control"  name="systemid">
                                </div>
                            </div> --}}
                    </div>
                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--employe skills-->
    <div class="modal fade text-right" id="editepmloyeeskills" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير الموظف</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form method="POST" action="{{ route('update-employes-skill') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم تعريف الموظف</label><br>
                                    <input name="editempid" readonly type="number" class="form-control">
                                    <input type="hidden" required placeholder="أدخل رقم هوية الموظف"
                                        name="employskillid" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>المهارة:</label><br>
                                    <input type="text" name="editempskill" required class="form-control"
                                        placeholder="أدخل اسم المهارات:">
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

    <!--edit employ traninging-->
    <div class="modal fade text-right" id="editepmloyeetraining" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تدريب الموظفين</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form method="POST" action="{{ route('update-employes-training') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هوية الموظف:</label><br>
                                    <input type="hidden" name="edittrainid" />
                                    <input type="number" readonly class="form-control" name="editempidt">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ التدريب (يوم/شهر/سنة):</label><br>
                                    <input type="date" max="2999-12-31" class="form-control" name="edittraningdate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تفاصيل التدريب:</label><br>
                                    <input type="text" class="form-control" name="edittraningdetails">
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
@endsection
@section('myscript')
    <script>
        //User for checking emp number for current logged in user , if exist or not by assad yaqoob
        let userId = "{{ \Illuminate\Support\Facades\Auth::id() }}";
        let type = '';
        let ajaxCall = null;
        $('input[name="empNumber"]').blur(function() {
            let empNumber = $(this).val();
            type = $(this).data('type');
            let empId = type == 'edit' ? $('#editproject').val() : '';

            let data = {
                empNumber: empNumber,
                type: type,
                userId: userId,
                _token: "{{ csrf_token() }}",
                empId: empId
            }
            console.log(data);
            if (ajaxCall != null) {
                ajaxCall.abort();
            }
            ajaxCall = $.ajax({
                method: 'get',
                url: '{{ url('/check-emp-number') }}',
                data: data,
                success: function(response) {
                    $("#emp_err_msg").remove();
                    if (response.status == 0) {
                        let cls = `.${type}-emp-number-div`;
                        $(cls).append(`<p id="emp_err_msg" class="text-danger">${response.message}</p>`)
                        $('input[name="empNumber"]').val('');
                    }
                }
            })
        });

        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this,
                    args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function() {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }

        function employeeCV() {
            $(".employee_cv_from_div").css("display", "block")
        }

        function editEmployee(data) {
            alert("data");
        }

        function deleteempl(id) {
            $("#modallabel").html("حذف الموظف");
            $("#res_id").val(id);
            $("#type").val('employee');
            $("#deleteSupplier").modal('show');
        }

        function deleteemplskill(id) {
            $("#modallabel").html("حذف مهارة الموظف");
            $("#res_id").val(id);
            $("#type").val('employeeskill');
            $("#deleteSupplier").modal('show');
        }

        function deleteempltraining(id) {
            $("#modallabel").html("حذف تدريب الموظفين");
            $("#res_id").val(id);
            $("#type").val('employeetraining');
            $("#deleteSupplier").modal('show');
        }
    </script>
    <script>
        function getEid(data) {
            console.log(data);
            $("#editproject").val(data.id);
            $("input[name='empNumber']").val(data.empNumber);
            $("input[name='first_name']").val(data.first_name);
            //  $("input[name='jobdetails']").val(data.jobdetails);
            //  $("input[name='jobdetails']").append(data.jobdetails); 
            //  $("input[name='jobdetails']").append(data.jobdetails); 
            // $("textarea").val(data.jobdetails);
            $("#jobdetails2").val(data.jobdetails);
            $("input[name='startDate']").val(data.startDate);
            $("input[name='surname']").val(data.surname);
            $("input[name='systemid']").val(data.systemid);
            $("input[name='equipment']").val(data.equipment);
            $("input[name='certificatenumber']").val(data.certificatenumber);
            $("input[name='calibrationid']").val(data.calibrationid);
            $("input[name='calibratedDate']").val(data.calibratedDate);
            $("input[name='acceptance']").val(data.acceptance);
            $("#editepmloyee").modal('show');
        }


        function getEidskill(data) {
            console.log(data);
            $("input[name='editempid']").val(parseInt(data.empNumber));
            $("input[name='editempskill']").val(data.empskill);
            $("input[name='employskillid']").val(data.skill_id);
            $("#editepmloyeeskills").modal('show');

        }

        function getEidtraining(data) {

            $("input[name='editempidt']").val(data.empNumber);
            $("input[name='edittraningdate']").val(data.traningdate);
            $("input[name='edittraningdetails']").val(data.traningdetails);
            $("input[name='edittrainid']").val(data.traning_id);

            $("#editepmloyeetraining").modal('show');

        }

        function emp1() {

            if ($(".employee_from_div").css("display") === "block") {
                $(".employee_from_div").css("display", "none");
            } else {
                $(".employee_from_div").css("display", "block");
            }
        }

        function emp2() {

            if ($(".employee_skill_from_div").css("display") === "block") {
                $(".employee_skill_from_div").css("display", "none");
            } else {
                $(".employee_skill_from_div").css("display", "block");
            }
        }

        function emp3() {

            if ($(".employee_record_from_div").css("display") === "block") {
                $(".employee_record_from_div").css("display", "none");
            } else {
                $(".employee_record_from_div").css("display", "block");
            }
        }
    </script>
    	@include('admin.dashboard.includes.foot')
		<script>
$('#kt_table_agent2').DataTable(
    {
  "ordering": false
}
    );
</script>
<style>
	div#kt_table_agent2_filter {
    float: right;
}
.skill{
    display:none;
}
.record{
    display:none;
}
[type="search"] {
    padding-top: 5px;
    padding-bottom: 5px;
    border-radius: 5px;
}
label {
    color: black !important;
    display: flex;
    align-items: center;
    gap: 10px;
}
</style>
@endsection
