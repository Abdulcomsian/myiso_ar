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
                <h2>عملية الكفاءة</h2>
            </div>
        </div>
        <div class="procedure_div text-right">
            <div class="row">
                <div class="col-lg-9 col-xl-10">
					<a style="position: relative;top: 9px;" onclick="workInstructionFrom()" class="addBtn">أضف عملية
                        بديلة</a>
                    @if ($img_exist == 'Yes')
                        <form action="{{ url('comptprocess') }}" method="post">
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
                                <label>حمل الصورة:</label><br>
                                <input type="file" class="form-control" name="comp_process_photo">
                                <button type="submit" class="submitBtn ml-2 mt-2">إرسال</button>
                            </div>
                            {{-- <button type="submit" class="submitBtn ml-2">إرسال</button> --}}
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
                        <p class="m-t-20">تتحكم هذه العملية في تدريب وكفاءة موظفي الشركة.</p>
                        <p>المدخلات: الحاجة إلى زيادة كفاءة الموظفين، إما من خلال المبتدئين الجدد أو زيادة تدريب الموظفين
                            الحاليين.</p>
                        <p>المخرج: زيادة مستويات كفاءة الموظفين.</p>
                        <p>صاحب العملية هو: <span class="authName">{{ Auth::user()->competency_process }}
                                <!--{{ Auth::user()->director }}-->
                            </span></p>
                    </div>
                </div>
            </div>
        </section>

        <!--End::Section-->
    </div>
@endsection
<!-- end:: Content -->
