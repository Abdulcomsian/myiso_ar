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
            <div>
                <h2>العملاء</h2>
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
                                <p>يجب إدراج العملاء حتى يمكن إجراء عمليات التدقيق الداخلية عند تقييمات التسليم/جودة الخدمة، لكن تُستخدم
                                أيضًا للمساعدة في استبيانات رضا العملاء.</p>
                                <p> لإضافة سجل، انقر على الزر "إضافة عميل". لتعديل سجل، انقر على رمز التحرير الخاص بالقيد المراد تعديله.
                                </p>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('Error'))
                        <h5 class="text-danger"> {{ Session::get('Error') }} </h5>
                    @endif
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="customerForm()" class="am-btn am-btn-primary">إضافة عملاء:</a>
                            </div>
                        </div>
                        <div class="customer_from_div">
                            <form action="{{ route('customerform') }} " id="addcust" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3> إضافة عملاء: </h3>
                                    </div>
                                    <!--	<div class="form-group">-->
                                    <!--		<label>Add Customer Details</label>-->
                                    <!--		<input type="text" class="form-control" name="address" placeholder="Enter Add Customer Details.">-->
                                    <!--	</div>-->
                                    <!--</div>-->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم تعريف العميل: </label>
                                            <input type="number" min="1" max="100000" required
                                                class="form-control validate_number" name="idNumber" id="idNumber"
                                                placeholder="أدخل رقم تعريف العميل">
                                            <span id="numbererror" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>اسم العميل: </label><br>
                                            <input type="text" class="form-control" required name="name"
                                                id="name" placeholder="أدخل اسم العميل:">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--          				{{-- <div class="col-lg-6">-->
          <!--          					<div class="form-group">-->
										<!--	<label>ID Number:</label><br>-->
										<!--	<input type="number" class="form-control" name="idNumber" placeholder="Enter ID:">-->
										<!--</div>-->
          <!--          				</div> --}}-->

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>عنوان العمل: </label>
                                            <input type="text" class="form-control" required name="address"
                                                placeholder="أدخل عنوان عمل العميل كاملاً">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>هاتف العميل: </label>
                                            <input type="text" class="form-control" required name="create_phone_number"
                                                id="phoneNumber" pattern="\d*"
                                                placeholder="أدخل رقم هاتف العميل بدءًا برمز البلد">
                                            <input type="hidden" name="create_phone_number_country_code" id="phonecode">
                                            <input type="hidden" name="create_phone_number_flag" id="phoneflag">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>عنوان البريد الإلكتروني للعميل: </label>
                                            <input type="email" class="form-control" required name="Email"
                                                placeholder="دخل البريد الإلكتروني للعميل:">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> اسم جهة الاتصال الخاصة بالعميل: </label>
                                            <input type="text" class="form-control" required name="contactName"
                                                placeholder="أدخل اسم الشخص المسؤول عن الاتصال بالعميل">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button onclick="customerForm()" type="reset"
                                    class="am-btn am-btn-outline">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
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
                                    id="">
                                    <thead>
                                        <tr>
                                            <th> معرّف العميل</th>
                                            <th>اسم العميل</th>
                                            <th> عنوان العمل</th>
                                            <th> رقم هاتف العميل</th>
                                            <th>عنوان البريد الإلكتروني</th>
                                            <th>جهة الاتصال</th>
                                            <th> الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($customers as $item)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $item->idNumber }}</span></td>
                                                <td><span class="am-cell-primary">{{ $item->name }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->address }}</span></td>
                                                <td>{{ $item->phonecode }} {{ $item->phoneNumber }}</td>
                                                <td><span class="am-cell-sub">{{ $item->Email }}</span></td>
                                                <td><span class="am-cell-sub">{{ $item->contactName }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn" title="View"
                                                        value="" onclick="viewEid({{ $item }});"><i
                                                            class="fa fa-eye"></i>
                                                    </button>
                                                    <button data-toggle="modal" onclick="getEid({{ $item }});"
                                                        class="am-icon-btn" title="edit"
                                                        value=""><i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn danger"
                                                        title="delete" value=""
                                                        onclick="deletethisitem({{ $item }});"><i class="fa fa-trash"></i>
                                                    </button>

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
                </div>
        </section>

        <!--End::Section-->
    </div>

    <div class="modal fade text-right" id="EditCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تحرير تفاصيل العميل</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editCustomers') }} " id="editcust" method="POST">
                        @csrf

                        <input type="hidden" name="id" id="id_feild" value="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم تعريف العميل: </label><br>
                                    <input type="number" class="form-control validate_number" name="idNumber"
                                        id="editidNumber" placeholder="أدخل رقم تعريف العميل" required>
                                    <span id="editnumbererror" class="text-dagner"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم العميل: </label><br>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="أدخل اسم العميل:" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان العمل: </label>
                                    <input type="text" class="form-control" name="address"required
                                        placeholder="أدخل عنوان عمل العميل كاملاً" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هاتف العميل: </label>
                                    <div id='edit_phone'>
                                    </div>
                                    <input type="hidden" name="edit_phone_code" id="editphonecode">
                                    <input type="hidden" name="edit_phone_flag" id="editphoneflag">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان البريد الإلكتروني للعميل: </label>
                                    <input type="email" class="form-control" name="Email"
                                        placeholder="أدخل البريد الإلكتروني للعميل:" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم جهة الاتصال الخاصة بالعميل: </label>
                                    <input type="text" class="form-control" name="contactName"
                                        placeholder="أدخل اسم الشخص المسؤول عن الاتصال بالعميل" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button type="button" class="am-btn am-btn-outline" data-dismiss="modal" aria-label="Close">يلغي</button>
                            <button type="submit" class="am-btn am-btn-primary">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="ViewCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">عرض تفاصيل العميل</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editCustomers') }} " method="POST">
                        @csrf

                        <input type="hidden" name="id" id="id_feild" value="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> رقم تعريف العميل: </label><br>
                                    <input type="number" readonly class="form-control" name="idNumber"
                                        placeholder="أدخل رقم تعريف العميل">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> اسم العميل: </label><br>
                                    <input type="text" readonly class="form-control" name="name"
                                        placeholder="أدخل اسم العميل:">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان العمل: </label>
                                    <input type="text" readonly class="form-control" name="address"
                                        placeholder="أدخل عنوان عمل العميل كاملاً">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هاتف العميل: </label>

                                    <div id='view_phone'>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنوان البريد الإلكتروني للعميل: </label>
                                    <input type="email" readonly class="form-control" name="Email"
                                        placeholder="أدخل البريد الإلكتروني للعميل:)">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اسم جهة الاتصال الخاصة بالعميل: </label>
                                    <input type="text" readonly class="form-control" name="contactName"
                                        placeholder="أدخل اسم الشخص المسؤول عن الاتصال بالعميل">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close"
                            style="margin-right:20px;">يغلق</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-right" id="deleteRequirment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف إدخال.</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('deletecustomeradmin') }}" method="POST">
                        @csrf
                        <input type="hidden" id="re_id" value="" name="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        function deletethisitem(data) {
            $("#re_id").val(data.id);
            $("#deleteRequirment").modal('show');

        }

        var input = document.querySelector("#phoneNumber");
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
                    console.log(result);
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
                //   if(i==2)
                //   {
                var code = $(this).text();
                console.log(code);

                $("#editphonecode").val(code);

                //   }

                //   i++;
            });
            $(".iti__selected-flag").each(function() {
                //   if(j==2)
                //   {
                var str = $(this).attr('aria-activedescendant');
                var n = str.lastIndexOf('-');
                var result = str.substring(n + 1);
                $("#editphoneflag").val(result);
                //   }
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

        $("#idNumber").blur(function() {
            number = $("#idNumber").val();
            $.ajax({
                method: 'get',
                url: '{{ url('/check-customer-number') }}',
                data: {
                    number: number
                },
                success: function(res) {
                    if (res == "exist") {
                        $("#idNumber").val("");
                        $("#numbererror").html("Number is Already taken.");
                    } else {
                        $("#numbererror").html("");
                    }
                }
            })
        })

        $("#editidNumber").blur(function() {
            number = $("#editidNumber").val();
            $.ajax({
                method: 'get',
                url: '{{ url('/check-customer-number') }}',
                data: {
                    number: number
                },
                success: function(res) {
                    if (res == "exist") {
                        $("#editidNumber").val("");
                        $("#editnumbererror").html("Number is Already taken x");
                    } else {
                        $("#editnumbererror").html("");
                    }
                }
            })
        })
    </script>



<script>
    function getEid(data) {
        console.log(data);
        $("#id_feild").val(data.id);
        $("input[name='Email']").val(data.Email);
        $("input[name='address']").val(data.address);
        $("input[name='contactName']").val(data.contactName);
        $("input[name='idNumber']").val(data.idNumber);

        $("input[name='name']").val(data.name);
        //  var phone = data.phonecode + data.phoneNumber

        $('#edit_phone').empty().append(
            `<input type="text" class="form-control" id="editphone" name="edit_phone_number" placeholder="Enter Customer Phone Number" required>`
            );

        $("input[name='edit_phone_number']").val(data.phoneNumber);
        code = data.phonecode;
        //  code = code.replace(/["']/g, '');
        console.log(code);
        var input = document.querySelector("#editphone");
        if (data.phoneflag == "preferred" || data.phoneflag == null) {
            window.intlTelInput(input, {
                separateDialCode: true,
                initialCountry: 'us',
                customPlaceholder: function(
                    selectedCountryPlaceholder,
                    selectedCountryData
                ) {
                    return "e.g. " + selectedCountryPlaceholder;
                },
            });
        } else {
            window.intlTelInput(input, {
                separateDialCode: true,
                initialCountry: data.phoneflag,
                customPlaceholder: function(
                    selectedCountryPlaceholder,
                    selectedCountryData
                ) {
                    return "e.g. " + selectedCountryPlaceholder;
                },
            });
        }


        $("#EditCustomer").modal('show');
        $('#addcust').resetForm();
    }

    function viewEid(data) {
        console.log(data);
        $("#id_feild").val(data.id);
        $("input[name='Email']").val(data.Email);
        $("input[name='address']").val(data.address);
        $("input[name='contactName']").val(data.contactName);
        $("input[name='idNumber']").val(data.idNumber);

        $("input[name='name']").val(data.name);
        //  var phone = data.phonecode + data.phoneNumber
        $('#view_phone').empty().append(
            `<input type="text" class="form-control" id="viewPhoneNumber" name="viewPhoneNumber" placeholder="Enter Customer Phone Number" required>`
            );
        $("input[name='viewPhoneNumber']").val(data.phoneNumber);
        code = data.phonecode;
        // code = code.replace(/["']/g, '');
        console.log(code);
        var input = document.querySelector("#viewPhoneNumber");
        if (data.phoneflag == "preferred" || data.phoneflag == null) {
            window.intlTelInput(input, {
                separateDialCode: true,
                initialCountry: 'us',
                customPlaceholder: function(
                    selectedCountryPlaceholder,
                    selectedCountryData
                ) {
                    return "e.g. " + selectedCountryPlaceholder;
                },
            });
        } else {
            window.intlTelInput(input, {
                separateDialCode: true,
                initialCountry: data.phoneflag,
                customPlaceholder: function(
                    selectedCountryPlaceholder,
                    selectedCountryData
                ) {
                    return "e.g. " + selectedCountryPlaceholder;
                },
            });

        }



        $("#ViewCustomer").modal('show');
        $('#addcust').resetForm();
    }

    function checkcustomer() {

        ajax_url = '<?php echo route('checkcustomer'); ?>';
        cusid = $("#idNumber").val();
        //console.log(cusid);
        $.ajax({
            type: "GET",
            url: ajax_url,
            data: {
                cusid: cusid
            },
            success: function(data) {
                if (data) {
                    $("#name").val(data);
                } else {
                    $("#name").val('');
                }
            }
        });
    }
</script>
@endsection
