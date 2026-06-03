@extends('dashboard.layouts.app')

@section('content')
<style>section#procedure_section{padding:30px 20px;background:#FFF !important;}
    .table thead th, .table thead td {
    font-weight: bold !important;
    font-size: 15px !important;
    text-align: right;
}
</style>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--Begin::Dashboard 1-->
	<!--Begin::Section-->
	{{-- <div class="row">
		<div class="col-xl-12 col-lg-12">
			<h2>Download</h2>
		</div>
	</div> --}}
	<section id="procedure_section" class="mt-3">
		
	<div class="container">
	<div class="row">

		<div class="kt-portlet__body" style="width: 100%">
            <!--begin: Video -->
            <table style="width:100%" class="table table-striped- table-bordered table-hover table-sm table-checkable table-responsive" id="kt_table_user">

                <thead>

                    <tr>

                        <th style="text-align:right">رقم س.</th>

                        <th>اسم</th>
                        <th>وصف</th>
                        <th>الملف الذي تم تنزيله</th>
						<th>تاريخ</th>

                        

                      

                    </tr>

                </thead>

                <tbody>
				<?php $count=0;?>
				@foreach($view_downloads as $userdownload)
				<?php $count++; 
                
                ?>
                    <tr>
                        
                        <td style="text-align:right; width:7%;">{{$count}}</td>
                        
                        
                        <td style="width:30%; font-size:20px;">{{$userdownload->downloads->name ?? ''}}</td>
                        
                        <td style="width:35%">
							{!!$userdownload->downloads->des!!}</td>
                        <td style="width:15%">
                            تحميل
                            {{-- {{$userdownload->downloads->download_file ?? ''}} --}}
                        
                        </td>
                    
                        
                        <td style="width:60%">{{$userdownload->dated ?? ''}}</td>
                       
                        

                        

                    </tr>
				@endforeach	
                </tbody>
            </table>
            <!--end: Video -->


        </div>
	
	</div>
	</div>
	
	</section>
	<!--End::Section-->
</div>
@endsection
<!-- end:: Content --''