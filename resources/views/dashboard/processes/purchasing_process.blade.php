@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif

        @if ($errors->has('sales_process_photo'))
            <div class="alert alert-danger alert-dismissible">{{ $errors->first('sales_process_photo') }} <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a> </div>
        @endif

        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>عملية الشراء</h2>
            </div>
        </div>
        <div class="procedure_div text-right">
            <div class="row">
                <div class="col-lg-9 col-xl-10">
					<a style="position: relative;top: 9px;" onclick="workInstructionFrom()" class="addBtn">إضافة عملية
                        بديلة</a>
                    @if ($img_exist == 'Yes')
                        <form action="{{ url('purchprocess') }}" method="post">
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
                                <input type="file" class="form-control" name="purch_process_photo">
                                <button type="submit" class="submitBtn ml-2" style="margin-top: 10px;">إرسال</button>

                            </div>

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
                        <p class="m-t-20">تستخدم هذه العملية عند شراء البضائع أو الخدمات من مزوّد خارجي.</p>
                        <p>المدخلات: متطلبات الشراء</p>
                        <p>المخرجات: استلام البضائع والخدمات المشتراة، وتنفيذها.</p>
                        <p>مالك العملية: <span class="authName">{{ Auth::user()->purchasing_process }}</span></p>
                    </div>
                </div>
            </div>
        </section>

        <!--End::Section-->
    </div>
@endsection
<!-- end:: Content -->
