@extends('admin.dashboard.layouts.app')
@section('content')
    <!-- begin:: Content -->
    <style>
        .new-file-upload {
            display: block;
            width: 91px;
            height: 34px;
            position: absolute;
            top: 23px;
            font-size: 12px;
            background: #FFF;
            border-radius: 4px;
            border: 1px solid #0d47b3;
        }
    </style>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row text-right">
            <div class="col-lg-12">

                @if ($message = Session::get('Success') ? Session::get('Success') : Session::get('Error'))
                    @php
                        $class = Session::get('Success') ? 'success' : 'danger';
                    @endphp
                    <div class="row">
                        <div class="col-md-12 pl-4 ml-4 mt-4">
                            <div class="alert alert-{{ $class }} alert-dismissible">{{ $message }} &nbsp; <a
                                    href="#" class="close mt-1" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        </div>
                    </div>
                @endif

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-line-chart"></i>
                            </span>
                            <h3 class="kt-portlet__head-title mx-2">
                                إضافة مستخدم جديد
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <a href="{{ url('admin') }}" class="btn btn-clean btn-icon-sm">
                                    خلف
                                    <i class="la la-long-arrow-left"></i>
                                </a>
                                &nbsp;

                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    @php
                    $usertypes = \App\UserType::get();
                    @endphp
                    <form class="kt-form kt-form--label-right" method="POST" action="{{ route('add_user') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                  
                                    <div class="kt-input-icon kt-input-icon--right" style="margin-bottom:20px; padding-right: 31px;"> 
                                       
                                        <select name="user_type" id="user_type">
                                            <option value="0">صارف کی قسم منتخب کریں</option>    
                                            @foreach ($usertypes as $usertype)
                                            <option value="{{$usertype->id}}">{{$usertype->name}}</option> 
                                            @endforeach
                                                   
                                            </select>   
                                    </div>
                                   
                                   
                                </div>
                            </div>
                          
                            <div class="form-group row">

                                <div class="col-lg-3">
                                    <label for="address2">هوية الشركة:</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="order_number" name="order_number" class="form-control"
                                            placeholder="أدخل رقم هوية الشركة" required>
                                        <span id="numbererror" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <label for="name">عنوان البريد الإلكتروني</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="أدخل عنوان البريد الالكتروني" required>
                                    <!---<span class="form-text text-muted">Please enter Email Address</span>--->
                                </div>

                                <div class="col-lg-3">
                                    <label for="name">اسم المستخدم</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="ادخل اسم المستخدم" required>
                                    <!---<span class="form-text text-muted">Please enter the client's Username</span>---->
                                </div>

                                <div class="col-lg-3">
                                    <label for="password">كلمة المرور:</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="أدخل كلمة المرور" required>
                                        <!--//pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$"-->
                                        <!---<span class="form-text text-muted">Minimum 6 characters, at least 1 number & at least 1 Capital letter</span>--->

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-lg-4">
                                    <label for="company_name">اسم الشركة</label>
                                    <input type="text" id="company_name" name="company_name" class="form-control"
                                        placeholder="أدخل اسم الشركة" required>
                                </div>
                                <div class="col-lg-4">
                                    <label for="company_address">عنوان الشركة</label>
                                    <textarea id="company_address" name="company_address" class="form-control" placeholder="أدخل عنوان الشركة" required></textarea>
                                </div>
                                <div class="col-lg-4">
                                    <label for="phone">رقم هاتف الشركة</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            placeholder="هاتف" required>
                                        <input type="hidden" name="phonecode" id="phonecode">
                                        <input type="hidden" name="phoneflag" id="phoneflag">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="country">الدولة</label>
                                    <input type="text" id="country" name="country" class="form-control"
                                        placeholder="أدخل البلد" required>
                                </div>

                                <div class="col-lg-6">
                                    <label for="director">العضو المنتدب/ الرئيس التنفيذي</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="director" name="director" class="form-control"
                                            placeholder="إدخال اسم" required>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="person_iso">الشخص المسؤول عن الآيزو</label>
                                    <input type="text" id="person_iso" name="person_iso" class="form-control"
                                        placeholder="اسم شخص ISO" required>
                                    <!--<span class="form-text text-muted">Please enter the ISO contact person's name</span>-->
                                </div>
                                <div class="col-lg-4">
                                    <label for="contact_iso" style="text-align:left;">جهة الاتصال الخاصة بمنصة ISO</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="contact_iso" name="contact_iso" class="form-control"
                                            placeholder="أدخل رقم الاتصال" required>
                                        <input type="hidden" name="isophonecode" id="isophonecode">
                                        <input type="hidden" name="isophoneflag" id="isophoneflag">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <label for="email_iso text-left" style="text-align:left;">عنوان البريد الإلكتروني الخاص بمنصة ISO</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="email" id="email_iso" name="email_iso" class="form-control"
                                            placeholder="أدخل عنوان البريد الالكتروني" required>
                                        <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i
                                                    class="la la-bookmark-o"></i></span></span>
                                        <!--<span class="form-text text-muted">Please enter the Iso Email</span>-->

                                    </div>
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="sales_process">الجهة المسؤولة عن عملية المبيعات</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="sales_process" name="sales_process"
                                            class="form-control" placeholder="إدخال اسم" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="purchasing_process">الجهة المسؤولة عن عملية الشراء</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="purchasing_process" name="purchasing_process"
                                            class="form-control" placeholder="إدخال اسم" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="" for="servicing_process">الجهة المسؤولة عن عملية تقديم الخدمات</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="servicing_process" name="servicing_process"
                                            class="form-control" placeholder="إدخال اسم" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="address1">الجهة المسؤولة عن عملية الكفاءة</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <input type="text" id="competency_process" name="competency_process"
                                            class="form-control" placeholder="إدخال اسم" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="address2">ملف الشركة / نظرة عامة على الأعمال:</label>
                                    {{-- <div class="kt-input-icon kt-input-icon--right">
                                        <input type="file" id="company_profile" name="company_profile"
                                            class="form-control" placeholder="ملف الشركة" required>
                                    </div> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput" class="input-file" name="company_profile" required/>
                                        <label for="fileInput" class="file-label">
                                          <span class="file-text">اختيار الملف</span>
                                          <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="scope">نطاق الأعمال</label>
                                    <div class="kt-input-icon kt-input-icon--right">
                                        <textarea id="scope" name="scope" class="form-control" required></textarea>
                                    </div>
                                </div>


                            </div>

                            {{-- 	<div class="form-group row">

                                <div class="col-lg-4">
                                    <label for="lastlogin">Last login:</label>
                                    <input type="file" id="lastlogin" name="lastlogin" class="form-control" placeholder="" value="" required>
                                </div>
                                <div class="col-lg-4">

                                </div>
                                <div class="col-lg-4">

                                </div>
                            </div>


                                    <div class="form-group form-row">



                            </div>
                            <div class="form-group row">



                    </div>
                             --}}


                            <div class="form-group row">

                                <div class="col-lg-9">
                                    <label for="user_image">وصف الشركة:</label>
                                    <div class="kt-input-icon kt-input-icon--right">

                                        <textarea id="Company_overview" name="Company_overview" class="form-control" placeholder="أدخل نظرة عامة على الشركة"
                                            style="height: 190px;" required></textarea>

                                    </div>

                                </div>

                                <div class="col-lg-3">
                                    <label for="user_image">شعار الشركة:</label>
                                    <div class="kt-input-icon kt-input-icon--right">

                                        <div id="image-preview">
                                            <label for="image-upload" id="image-label"></label>

                                            <input type="file" accept="image/*" name="user_image" id="file"
                                                onchange="loadFile(event)" required>
                                            <p><label for="file" style="cursor: pointer;">إرفاق ملف بصيغة JPEG فقط</label>
                                            </p>
                                            <p><img id="output" width="200px" height="200px" /></p>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="form-group row">

                                <div class="col-lg-3">
                                    <label for="iso9001_certificate">شهادة ISO9001:</label>
                                    {{-- <input type="file" id="iso9001_certificate" accept=".pdf"
                                        name="iso9001_certificate"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput" class="input-file" name="iso9001_certificate" accept=".pdf"/>
                                        <label for="fileInput" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                    <!--<button type="button" class="new-file-upload" onclick="document.getElementById('iso9001_certificate').click()">Attach File</button>-->

                                </div>

                                <div class="col-lg-4">
                                    <label for="iso9001_expirydate">تاريخ انتهاء الصلاحية:</label>
                                    <div class="input-group">
                                        <input type="text" id="iso9001_expirydate" name="iso9001_expirydate"
                                            class="form-control specialInput" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="iso9001_description">الوصف:</label>
                                    <textarea id="iso9001_description" name="iso9001_description" class="form-control"
                                        placeholder="وصف شهادة ISO9001"></textarea>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-lg-3">
                                    <label for="iso14001_certificate">شهادة ISO14001:</label>
                                    {{-- <input type="file" id="iso14001_certificate" accept=".pdf"
                                        name="iso14001_certificate"> --}}
                                        <div class="custom-file-input-tag form-control">
                                            <input type="file" id="fileInput" class="input-file" name="iso14001_certificate" accept=".pdf"/>
                                            <label for="fileInput" class="file-label">
                                                <span class="file-text">اختيار الملف</span>
                                                <span class="file-chosen">لم يتم اختيار ملف</span>
                                            </label>
                                        </div>
                                    <!--<button type="button" class="new-file-upload" onclick="document.getElementById('iso14001_certificate').click()">Attach File</button>-->
                                </div>

                                <div class="col-lg-4">
                                    <label for="iso14001_expirydate">تاريخ انتهاء الصلاحية:</label>
                                    <div class="input-group">
                                        <input type="text" id="iso14001_expirydate" name="iso14001_expirydate"
                                            class="form-control specialInput" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="iso14001_description">الوصف:</label>
                                    <textarea id="iso14001_description" name="iso14001_description" class="form-control"
                                        placeholder="وصف شهادة ISO14001"></textarea>
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-lg-3">
                                    <label for="iso45001_certificate">شهادة ISO45001:</label>
                                    {{-- <input type="file" id="iso45001_certificate" accept=".pdf"
                                        name="iso45001_certificate"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput" class="input-file" name="iso45001_certificate" accept=".pdf"/>
                                        <label for="fileInput" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                    <!--<button  type="button"  class="new-file-upload" onclick="document.getElementById('iso45001_certificate').click()">Attach File</button>-->
                                </div>

                                <div class="col-lg-4">
                                    <label for="iso45001_expirydate">تاريخ انتهاء الصلاحية:</label>
                                    <div class="input-group">
                                        <input type="text" id="iso45001_expirydate" name="iso45001_expirydate"
                                            class="form-control specialInput" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <label for="iso45001_description">الوصف:</label>
                                    <textarea id="iso45001_description" name="iso45001_description" class="form-control"
                                        placeholder="وصف شهادة ISO45001"></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="iso45001_certificate">تقرير التدقيق</label>
                                    {{-- <input type="file" id="audit_report" accept=".pdf" name="audit_report"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput" class="input-file" name="audit_report" accept=".pdf"/>
                                        <label for="fileInput" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="iso45001_certificate">تعليق التدقيق</label>
                                    <textarea id="audit_comment" name="audit_comment" class="form-control" placeholder="تعليق التدقيق"></textarea>
                                </div>
                            </div>

                            <div class="kt-portlet__foot">

                                <button type="submit" id="submit" class="submitBtn" style="margin-right: -28px;">
                                    يُقدِّم
                                </button>
                                <button type="reset" class="submitBtn"
                                    onclick="window.location.href='{{ url('/admin') }}'" style="margin-right:10px">
                                    يلغي
                                </button>

                                {{-- -	<div class="kt-form__actions">
                                        <div class="col-lg-4">
                                            <a href="{{url('/admin')}}" type="reset" value="Reset" class="btn btn-primary" style="margin-right:-535px;background-color: transparent;border-radius: 16px;color: #534e4e;color: #ffffff;background-color: #5867dd;">Cancel</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <button type="submit" class="btn btn-primary" style="margin-right: -308px;
                                                margin-top: -39px;
                                                border-radius: 17px;" >Submit</button>

                                            </div>

                                        </div>
                                    </div> --}}
                            </div>

                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->


            </div>
        </div>
    </div>

    <!-- end:: Content -->

    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        $(document).ready(function() {
            $('#iso9001_expirydate').datepicker({
                dateFormat: 'mm/dd/yyyy',
                autoclose: true,
                onSelect: function(dateText, inst) {
                    $(inst).val(dateText); // Write the value in the input
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#iso14001_expirydate').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#iso45001_expirydate').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            });
        });
    </script>
@endsection
@section('myscript')
    @include('layouts.intlTelInput_scripts')
    <script>
        //By assad yaqoob

        var phone_input = document.querySelector("#phone");
        var phone_input_intel = window.intlTelInput(phone_input, {
            separateDialCode: true,
            customPlaceholder: function(
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });

        var contact_iso_input = document.querySelector("#contact_iso");
        var contact_iso_input_intel = window.intlTelInput(contact_iso_input, {
            separateDialCode: true,
            customPlaceholder: function(
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });

        $("#order_number").bind('blur', function() {
            number = $("#order_number").val();
            $.ajax({
                method: 'get',
                url: '{{ url('/check-order-number') }}',
                data: {
                    number: number
                },
                success: function(res) {
                    //  console.log(res);
                    if (res == "exists") {
                        $("#order_number").val("");
                        $("#numbererror").html("Company ID is Already taken!");
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $("#numbererror").html("");
                        $('#submit').removeAttr('disabled');
                    }
                }
            })
        });

        //By assad yaqoob
        $("form").submit(function() {
            let intel_phone_data = phone_input_intel.getSelectedCountryData();
            let intel_iso_phone_data = contact_iso_input_intel.getSelectedCountryData();

            //For flags
            $("#phonecode").val(intel_phone_data.dialCode);
            $("#isophonecode").val(intel_iso_phone_data.dialCode);

            //For country code
            $("#phoneflag").val(intel_phone_data.iso2);
            $("#isophoneflag").val(intel_iso_phone_data.iso2);
        });
    </script>
@endsection
