@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

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

    <div class="am-page-header">
        <div>
            <!-- <h2>Servicing a Contract Process</h2> -->
            <h2>خدمة عملية العقد</h2>
        </div>
        <div class="am-page-header__actions" style="display:flex;gap:10px;align-items:center;">
            @if ($img_exist == 'Yes')
                <form action="{{ url('servicingprocess') }}" method="post" style="display:inline;">
                    @csrf
                    <input type="hidden" name="user_id" value="<?php echo Auth::id(); ?>" />
                    <button type="submit" class="am-btn am-btn-outline am-btn-sm"><i class="fa fa-trash"></i> يزيل</button>
                </form>
            @endif
            <button type="button" class="am-btn am-btn-primary am-btn-sm" onclick="workInstructionFrom()">
                <i class="fa fa-upload"></i> إضافة عملية بديلة
            </button>
        </div>
    </div>

    {{-- Upload Form --}}
    <div class="am-card work_instruction_from_div" style="display:none; margin-bottom:20px;">
        <div class="am-card__body am-form">
            <form enctype='multipart/form-data' action="{{ url('uploadimg') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="<?php echo Auth::id(); ?>" />
                <div class="mb-3">
                    <label>تحميل صورة:</label>
                    {{-- <input type="file" class="form-control" name="serv_process_photo"> --}}
                    <div class="custom-file-input-tag form-control mt-2">
                        <input type="file" id="fileInput1" class="input-file" name="serv_process_photo"/>
                        <label for="fileInput1" class="file-label">
                          <span class="file-text">اختيار الملف</span>
                          <span class="file-chosen">لم يتم اختيار ملف</span>
                        </label>
                    </div>
                </div>
                <div style="margin-top:14px;">
                    <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> إرسال</button>
                    <button type="button" class="am-btn am-btn-outline" onclick="workInstructionFrom()" style="margin-right:7px;">يلغي</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Process Display --}}
    <div class="am-card">
        <div class="am-card__body" style="padding:32px; line-height:1.8;">
            @if ($img)
                <div style="margin-bottom:20px;">
                    <img src="{{ $img }}" class="img-fluid" style="max-width:100%; border-radius:8px;">
                </div>
            @endif
            <p class="m-t-20">تستخدم هذه العملية عند استكمال العقد من طرف العميل</p>
            <p><strong>المدخلات:</strong> استلام أمر الشراء من العميل</p>
            <p><strong>المخرجات:</strong> تسليم وفوترة البضائع أو الخدمات.</p>
            <p><strong>مالك العملية:</strong> <span class="authName">{{ Auth::user()->servicing_process }}</span></p>
        </div>
    </div>

</div>
@endsection
