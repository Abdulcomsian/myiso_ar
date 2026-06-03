@extends('admin.dashboard.layouts.app')
@section('content')
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    التنزيلات
                </h3>
            </div>
            
        </div>
	@if ($message = Session::get('msg'))
		<div class="row">
            <div class="col-md-11 pl-4 ml-4 mt-4">
	<div class="alert alert-success alert-dismissible">{{ $message }} &nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
	</div>
	</div>
	@endif
        

        <div class="kt-portlet__body">
            <!--begin: Video -->
                <!--begin: Video -->
                <table style="width:100%" class="table table-striped- table-bordered table-hover table-sm table-checkable table-responsive" id="kt_table_user">
    
                    <thead>
    
                        <tr>
    
                            <th style="text-align:center;">رقم س.</th>
                            <th >مستخدم</th>
                        </tr>
    
                    </thead>
    
                    <tbody>
                    <?php $count=1;?>
                    {{-- @foreach($view_downloads as $userdownload)
                    <?php $count++;
                    ?>
                        <tr>
                            <td style="text-align:center; width:5%">{{$count}}</td>
                            <td style="width:40%">{{$userdownload->user->name ?? ''}}</td>
                            <td style="width:40%">{{$userdownload->downloads->name}}</td>
                            <td style="width:45%">{{$userdownload->downloads->download_file}}</td>
                            <td style="width:50%">{{$userdownload->dated}}</td>    
                        </tr>
                    @endforeach	 --}}
                    {{-- @dd($users) --}}
                    <?php $i=1;?>
                    @foreach ($users as $user)
                    @if(isset($user->userDownload) && count($user->userDownload) > 0)
                    <tr>
                        <td style="width:5%">{{$i}}</td>
                        <td style="vertical-align: middle; width:20%"><a href="edit_user/{{$user->id ?? ''}}" target="_blank">{{$user->name}}</a></td>
                        <td style="width:100%">
                            <table style="width:100%">
                                <thead>
                                    <th style="width:40%; ">اسم</th>
                                    <th style="width:40%;">الملف الذي تم تنزيله</th>
                                    <th style="width:40%;">تاريخ</th>
                                </thead>
                                <tbody>
                                    @foreach($user->userDownload as $download)
                                    <tr>
                                        <td style="width:40%;">{{$download->downloads->name ?? ''}}</td>
                                        <td style="width:40%;">
                                            تحميل
                                            {{-- {{$download->downloads->download_file ?? ''}} --}}

                                        </td>
                                        <td style="width:40%;">{{$download->dated ?? ''}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php $i ++;?>
                    @endif
                    
                    @endforeach
                    </tbody>
                </table>
                <!--end: Video -->
    
    
            <!--end: Video -->


        </div>
    </div>
</div>
@endsection