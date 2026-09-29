@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>المخطط التنظيمي للإدارة</h2>
        </div>
        <div>
            @if ($img_exist == 'Yes')
                <form action="{{ url('mgmtorg') }}" method="post" class="d-inline">
                    @csrf
                    <input type="hidden" name="user_id" value="<?php echo Auth::id(); ?>" />
                    <button type="submit" class="am-btn am-btn-outline">يزيل</button>
                </form>
            @endif
            <a onclick="workInstructionFrom()" class="am-btn am-btn-primary" style="margin-right:8px;"><i class="fa fa-upload"></i> أضف عملية بديلة</a>
        </div>
    </div>

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

    {{-- Upload Form Card --}}
    <div class="am-card work_instruction_from_div" style="display:none;">
        <div class="am-card__body am-form">
            <form enctype='multipart/form-data' action="{{ url('uploadimg') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="<?php echo Auth::id(); ?>" />
                <div class="mb-3">
                    <label>تحميل صورة:</label>
                    {{-- <input type="file" class="form-control"  name="organogram"> --}}
                    <div class="custom-file-input-tag form-control mt-2">
                        <input type="file" id="fileInput" class="input-file" name="organogram"/>
                        <label for="fileInput" class="file-label">
                          <span class="file-text">اختيار الملف</span>
                          <span class="file-chosen">لم يتم اختيار ملف</span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> يُقدِّم</button>
            </form>
        </div>
    </div>

    {{-- Organogram Display Card --}}
    <div class="am-card">
        <div class="am-card__body" style="padding:32px; text-align:center;">
        {{-- @dd($img) --}}
            @if ($img)
                <img src="{{ $img }}" class="img-fluid">
            @endif
        </div>
    </div>

</div>
@endsection
