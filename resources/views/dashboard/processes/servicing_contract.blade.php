@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span class="mx-2">{{ session()->get('message') }}</span>
            </div>
        @endif

        @if ($errors->has('sales_process_photo'))
            <div class="alert alert-danger alert-dismissible">{{ $errors->first('sales_process_photo') }} <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a> </div>
        @endif

        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <!-- <h2>Servicing a Contract Process</h2> -->
                <h2>خدمة عملية العقد</h2>
            </div>
        </div>
        <div class="procedure_div text-right">
            <div class="row">
                <a onclick="workInstructionFrom()" class="addBtn">إضافة عملية
                    بديلة</a>
                <div class="col-lg-9 col-xl-10">
                    @if ($img_exist == 'Yes')
                        <form action="{{ url('servicingprocess') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="<?php echo Auth::id(); ?>" />
                            <button type="submit" class="submitBtn">يزيل</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="work_instruction_from_div">
                <form enctype='multipart/form-data' action="{{ url('uploadimg') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="<?php echo Auth::id(); ?>" />
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="form-group">
                                <label>تحميل صورة:</label><br>
                                {{-- <input type="file" class="form-control" name="serv_process_photo"> --}}
                                <div class="custom-file-input-tag form-control">
                                    <input type="file" id="fileInput" class="input-file" name="serv_process_photo"/>
                                    <label for="fileInput" class="file-label">
                                      <span class="file-text">اختيار الملف</span>
                                      <span class="file-chosen">لم يتم اختيار ملف</span>
                                    </label>
                                </div>
                                <button type="submit" class="submitBtn ml-2 mt-2">إرسال</button>
                            </div>
                            {{-- <button type="submit" class="submitBtn ml-2" style="margin-top: 10px;">إرسال</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="procedure_div">
                        @if ($img)
                            <img src="{{ $img }}" class="img-fluid">
                        @endif
                        <p class="m-t-20">تستخدم هذه العملية عند استكمال العقد من طرف العميل</p>
                        <p>المدخلات: استلام أمر الشراء من العميل</p>
                        <p>المخرجات: تسليم وفوترة البضائع أو الخدمات.</p>
                        <p>مالك العملية: <span class="authName">{{ Auth::user()->servicing_process }}</span></p>
                    </div>
                </div>
            </div>
        </section>

        <!--End::Section-->
    </div>
@endsection
<!-- end:: Content -->
