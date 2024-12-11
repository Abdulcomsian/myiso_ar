@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>الموظفون</h2>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row text-right">
                <div class="col-lg-12">
                    <p>إضافة الموظفين سيحفظ جميع معلومات طاقم العمل ذات الصلة بدقة، بما في ذلك التدريب والمهارات.</p>
                    <p>لإضافة سجل، انقر على الزر "إضافة موظف". لتعديل سجل، انقر على رمز التحرير الخاص بالقيد المراد تعديله
                        أو حذفه.</p>
                    @if (Session::has('Error'))
                        <h5 class="text-danger"> {{ Session::get('Error') }} </h5>
                    @endif
                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="employeeForm()" class="addBtn">إضافة موظف</a>
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
                                                <input type="file" id="fileInput" class="input-file" name="employee_cv" accept="image/*,.doc, .docx,.txt,.pdf"/>
                                                <label for="fileInput" class="file-label">
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
                                <button type="reset" onclick="emp1()" class="submitBtn"
                                    style="margin-left: 7px;">يلغي</button>
                                <button class="submitBtn">يُقدِّم</button>
                            </form>
                        </div>
                    </div>
                    <div class="procedure_div m-t-20">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="employeeSkillForm()" class="addBtn">إضافة مهارات العمليات للموظف</a>
                            </div>
                        </div>
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
                                <button type="reset" onclick="emp2()" class="submitBtn"
                                    style="margin-left: 7px;">يلغي</button>
                                <button type="submit" class="submitBtn">يُقدِّم</button>
                            </form>
                        </div>
                    </div>

                    <div class="procedure_div m-t-20">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="employeeRecordForm()" class="addBtn"> إضافة سجل تدريب للموظف</a>
                            </div>
                        </div>
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
                                            <input name="attach_file" type="file" class="form-control" accept="image/*,.pdf,.jpeg,.png">
                                        </div>
                                    </div>
                                </div>
                                <button type="reset" onclick="emp3()" class="submitBtn"
                                    style="margin-left: 7px;">يلغي</button>
                                <button type="submit" class="submitBtn">يُقدِّم</button>
                            </form>
                        </div>
                    </div>

                    <div class="procedure_div">
                        <div class="requirments_table_div" style="margin-top: 0px;">

                            <h4>إجمالي الموظفين المدرجين</h4>


                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table
                                    class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
                                    id="kt_table_agent">
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
                                        @foreach ($userinfo as $item)
                                            <tr>
                                                <!--<td> {{ $n }}</td>-->
                                                <td> {{ $item->empNumber }}</td>
                                                <td> {{ $item->surname }}</td>
                                                <td> {{ $item->first_name }}</td>
                                                <!--<td> {$item->empNumber}</td>-->

                                                <td> {{ date('d/m/Y', strtotime($item->startDate)) }}</td>
                                                <td> {{ $item->jobdetails }}</td>
                                                <td> {{ $item->email }}</td>
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
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="viewcvLabel">عرض
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
                                                                    <div class="modal-footer">
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
                                                <td>
                                                    <button onclick="getEid({{ json_encode($item) }});"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                                                        <span class="svg-icon svg-icon-md">
                                                            <span class="svg-icon svg-icon-md">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <path
                                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                                        </path>
                                                                        <path
                                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            opacity="0.3"></path>
                                                                    </g>
                                                                </svg> </span>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        onclick="deleteempl({{ $item->id }})"
                                                        title="Delete Employee">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <path
                                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                        fill="#5d78ff" fill-rule="nonzero"></path>
                                                                    <path
                                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                        fill="#5d78ff" opacity="0.3"></path>
                                                                </g>
                                                            </svg> </span>

                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal" data-target="#employ{{ $item->id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="employ{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="model1Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">إجمالي
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">يغلق</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>
                                            @php $n++; @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
                    <div class="procedure_div m-t-20">
                        <div class="requirments_table_div" style="margin-top: 0px;">
                            <h4>إجمالي مهارات الموظفين المدرجة</h4>
                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table
                                    class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
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

                                        @foreach ($employess as $item)
                                            <tr>
                                                <!--<td> { item->skill_id} </td>-->
                                                <td> {{ $item->empNumber }}</td>
                                                <td> {{ $item->surname }}</td>
                                                <td> {{ $item->first_name }}</td>
                                                <!--<td> {{ $item->empNumber }}</td>-->
                                                <td> {{ $item->empskill }}</td>
                                                <td>
                                                    <button onclick="getEidskill({{ json_encode($item) }});"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="Edit"><span class="svg-icon svg-icon-md"> <span
                                                                class="svg-icon svg-icon-md"> <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <path
                                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                                        </path>
                                                                        <path
                                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            opacity="0.3"></path>
                                                                    </g>
                                                                </svg> </span>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        onclick="deleteemplskill({{ $item->skill_id }})"
                                                        title="Delete Employee">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <path
                                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                        fill="#5d78ff" fill-rule="nonzero"></path>
                                                                    <path
                                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                        fill="#5d78ff" opacity="0.3"></path>
                                                                </g>
                                                            </svg> </span>

                                                    </button>
                                                    <!-- new  -->
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal" data-target="#skill{{ $item->skill_id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>


                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="skill{{ $item->skill_id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="model2Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">إجمالي
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">يغلق</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                </td>

                                                </td>



                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>

                    <div class="procedure_div m-t-20">
                        <div class="requirments_table_div" style="margin-top: 0px;">
                            <h4>ملخص سجل التدريب</h4>
                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table
                                    class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
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

                                        @foreach ($emptraining as $item)
                                            <tr>
                                                <td> {{ $item->empNumber }}</td>
                                                <td> {{ $item->surname }}</td>
                                                <td> {{ $item->first_name }}</td>

                                                <td> {{ date('d/m/Y', strtotime($item->startDate)) }}</td>
                                                <td> {{ date('d/m/Y', strtotime($item->traningdate)) }} </td>
                                                <td> {{ $item->traningdetails }}</td>
                                                <td>
                                                    <button onclick="getEidtraining({{ json_encode($item) }});"
                                                        class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="Edit"><span class="svg-icon svg-icon-md"> <span
                                                                class="svg-icon svg-icon-md"> <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="18px" height="18px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24">
                                                                        </rect>
                                                                        <path
                                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                                        </path>
                                                                        <path
                                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                            fill="#5d78ff" fill-rule="nonzero"
                                                                            opacity="0.3"></path>
                                                                    </g>
                                                                </svg> </span>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        onclick="deleteempltraining({{ $item->traning_id }})"
                                                        title="Delete Employee">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24">
                                                                    </rect>
                                                                    <path
                                                                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                        fill="#5d78ff" fill-rule="nonzero"></path>
                                                                    <path
                                                                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                        fill="#5d78ff" opacity="0.3"></path>
                                                                </g>
                                                            </svg> </span>

                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="View Customer Details" value="" o
                                                        data-toggle="modal"
                                                        data-target="#training{{ $item->traning_id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade text-right" id="training{{ $item->traning_id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="model3Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">ملخص
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">يغلق</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                        @foreach ($wp_users as $wpuser)
										@foreach($wpuser as $user)
										@php
											$uid= '"user_id";i:'.$user->ID.';';
           									$options = App\CertificateOption::where('option_name', 'LIKE', "%user_cert_%")->Where('option_value', 'LIKE', "%".$uid."%")->get();
											$finshedcourses = App\CertificateUserItems::Where('user_id', $user->ID)->where('status','finished')->get();

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
										@foreach($usercourses as $key => $usercourse)

                                        <tr>
											<td>{{$laravel_employee_detail->empNumber}}</td>
                                            <td> {{$laravel_employee_detail->surname}}</td>
											<td> {{$laravel_employee_detail->first_name}}</td>
											<td>{{$startdate}}</td>
											<td>{{$endate}}</td>
											<td>
												
												   <li>
													{{ $usercourse}}
													</li>
												
											</td>
											
											<td> </td>
                                        </tr>
										@endforeach
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
                <div class="modal-header">
                    <h5 class="modal-title" id="modallabel">حذف الموظف</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body ">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('employess-delete') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" name="id" id="res_id" />
                        <input type="hidden" name="type" value="" id="type" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير الموظف</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form method="POST" action=" {{ route('editemployee') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id" id="editproject" value="">

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>System ID Number:</label><br>
                                    <input type="number" class="form-control"  name="systemid">
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>اللقب:</label><br>
                                    <input type="text" class="form-control" name="surname" placeholder="أدخل اللقب">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الاسم الأول</label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="أدخل الاسم الأول">
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                    <input name="startDate" max="2999-12-31" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الوصف الوظيفي:</label>
                                    <!-- <input type="text" name="jobdetails" class="form-control"  placeholder="Enter Job Description:"> -->
                                    <textarea name="jobdetails" id="jobdetails2" cols="20" rows="5" class="form-control"
                                        placeholder="أدخل الوصف الوظيفي:"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تحميل السيرة الذاتية للموظف:</label>
                                    {{-- <input name="employee_cv" type="file" class="form-control"
                                        accept="image/*,.doc, .docx,.txt,.pdf"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput" class="input-file" name="employee_cv" accept="image/*,.doc, .docx,.txt,.pdf"/>
                                        <label for="fileInput" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="btn btn-danger">تحديث</button>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير الموظف</h5>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="btn btn-danger">تحديث</button>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير تدريب الموظفين</h5>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="btn btn-danger">تحديث</button>
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
@endsection
