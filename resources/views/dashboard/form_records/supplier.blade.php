@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <style>
        #procedure_section .procedure_div ul li::before {
            display: none !important;
        }
    </style>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>الموردون</h2>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row text-right">
                <div class="col-lg-12">
                    <p>مراجعة الموردين هي أداة لمراقبة مستويات أداء الموردين لديك وتصنيفهم، ويمكن أن يستهدف مؤشر الأداء هذا
                        جميع مجالات الاتصال بالمورد.</p>
                    <p>لإضافة سجل، انقر على زر "إضافة مورّد". لتعديل سجل أو حذفه، انقر على رمز التحرير أو الحذف الخاص بالقيد
                        المراد تعديله أو حذفه. </p>
                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="supplierForm()" class="addBtn">إضافة مورد</a>
                            </div>
                        </div>
                        <div class="supplier_from_div">
                            <form action="{{ route('supplier') }} " id="addcust" method="post">
                                @csrf
                                <h3>إضافة تفاصيل المورد</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>رقم تعريف المورد:</label><br>
                                            <input type="number" class="form-control validate_number" min="1"
                                                name="idnumber" required placeholder="أدخل المعرف:">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>اسم المورد:</label><br>
                                            <input type="text" class="form-control" required name="suppliername"
                                                placeholder="أدخل اسم المورد:">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>عنوان المورد:</label>
                                            <input type="text" name="supplieraddress" required class="form-control"
                                                placeholder="أدخل عنوان المورد:">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
										<div class="form-group">
											<label>City:</label>
											<input type="text"  name="suppliercity" required class="form-control" placeholder="Enter City:">
										</div>
									</div> --}}
                                </div>
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
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> البلد:</label>
                                            <input type="text" name="suppliercountry" required class="form-control"
                                                placeholder="أدخل البلد">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم هاتف المورد:</label>
                                            <input type="text" name="supplierphn"required id="supplierphn"
                                                class="form-control" placeholder="أدخل رقم الهاتف">
                                            <input type="hidden" name="phonecode" id="phonecode">
                                            <input type="hidden" name="phoneflag" id="phoneflag">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>عنوان البريد الإلكتروني للمورد:</label>
                                            <input type="email" name="supplieremail"required class="form-control"
                                                placeholder="أدخل عنوان البريد الإلكتروني للمورد:">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>اسم جهة الاتصال بالمورد:</label>
                                            <input type="text" name="supplierContactNumber"required class="form-control"
                                                placeholder="أدخل اسم جهة الاتصال الخاصة بالمورد.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>خدمات:</label>
                                            <input type="text" name="supplierservc"required required class="form-control"
                                                placeholder="أدخل خدمات الموردين">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="submitBtn">يُقدِّم</button>
                                <button type="reset" onclick="supplierForm()" class="btn btn-secondary submitBtn "
                                    style="margin-right:7px;">يلغي</button>
                            </form>
                        </div>
                    </div>
                    <div class="procedure_div">
                        <div class="requirments_table_div">
                            <h4>إجمالي الموردين المدرجين</h4>
                            <div class="kt-portlet__body table-responsive">
                                <!--begin: Datatable -->
                                <table
                                    class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive"
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
                                        @foreach ($supplier as $data)
                                            <tr>
                                                <td>{{ $data->idnumber }}</td>
                                                <td>{{ $data->suppliername }}</td>
                                                <td>{{ $data->supplieraddress }}</td>
                                                {{-- <td>{{$data->suppliercity}}</td> --}}
                                                <td>{{ $data->suppliercountry }}</td>
                                                {{-- <td>{{$data->supplierzip}}</td> --}}
                                                <!--<td>{{ $data->phonecode }}</td>-->
                                                <td>{{ $data->phonecode }} {{ $data->supplierphn }}</td>
                                                <td>{{ $data->supplieremail }}</td>
                                                <td>{{ $data->supplierContactNumber }}</td>
                                                <td>{{ $data->supplierservc }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"
                                                        onclick="getEid({{ $data }});"><span
                                                            class="svg-icon svg-icon-md"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewBox="0 0 24 24" version="1.1">
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
                                                        title="Delete" onclick="deleteModal({{ $data }});"><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                            height="18px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                    fill="#5d78ff" fill-rule="nonzero"></path>
                                                                <path
                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#5d78ff" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <!-- new  -->
                                                    <!-- <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                   title="View Customer Details" value="" o data-toggle="modal" data-target="#model3"><i
                    class="fa fa-eye"></i>
                 </button> -->

                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                        title="view" onclick="viewEid({{ $data }});"><i
                                                            class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="model3" tabindex="-1" role="dialog"
                                                        aria-labelledby="model3Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        الموردين</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            id="editproject" value="">

                                                                        {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label>System ID Number:</label><br>
                                    <input type="number" readonly class="form-control"  name="systemid">
                                </div>
                            </div> --}}
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>اسم العائلة:</label><br>
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
                                                                                <input name="employee_cv" type="file"
                                                                                    class="form-control"
                                                                                    accept="image/*,.doc, .docx,.txt,.pdf">
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
                                                    </div>
                                                </td>
                                            </tr>
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
    <div class="modal fade text-right" id="deleteSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('deleteSupplier') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="re_id" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('supplieredit') }} " id="editcust" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id_feild" value="">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم الهوية:</label><br>
                                    <input type="number" required class="form-control" name="idnumber" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المورد:</label><br>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">يلغي</button>
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>-->
                    <button type="submit" class="btn btn-danger mx-2">تحديث</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="viewSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">عرض تفاصيل المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="id" id="id_feild" value="">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم هوية المورد:</label><br>
                                    <input type="number" class="form-control" name="idnumber"
                                        placeholder="أدخل المعرف:" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم المورد:</label><br>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">يغلق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

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
