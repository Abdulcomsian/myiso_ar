@extends('dashboard.layouts.app')

@section('content')
<style>section#procedure_section{padding:30px 20px;background:#FFF !important;}
    .table thead th, .table thead td {
    font-weight: bold !important;
    font-size: 15px;
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
            <table style="width: 100%" class="table table-striped- table-bordered table-hover table-sm table-checkable table-responsive" id="">

                <thead>

                    <tr>

                        <td  style="text-align:right">رقم س.</td>

                        <td>اسم</td>
						<td>وصف</td>
                        <td >تنزيل الملف</td>
                        

                       
                    </tr>

                </thead>

                <tbody>
				<?php $count=0;?>
				@foreach($all_downloads as $download)
				<?php $count++; 
               
                ?>
                    <tr>
                        
                        <td style="text-align:right; width:10%">{{$count}}</td>
                        
                        
                        <td style="width:25% font-size:26px; font-weight:bold"">{{$download->name}}</td>
                        <td style="width:58%">
							{!!$download->des!!}</td>
                        
                       
						<td style="width:50%"><a class="btn-fetch-data" href="{{asset('uploads/downloads/' . $download->download_file)}}" data-id="{{$download->id}}" target="_blank">
							{{-- {{$download->download_file}} --}}
							تحميل
						</a></td>

						
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).on('click', '.btn-fetch-data', function(e) {
			e.preventDefault();
			var hrefValue = $(this).attr('href');  // Get the href attribute value
			// Get the data-id from the clicked button
			var dataId = $(this).data('id');
			
			$.ajax({
				url: "{{ route('user.get-data') }}",
				type: 'POST',
				data: {
					id: dataId,
					_token: "{{ csrf_token() }}"
				},
				success: function(response) {
					if (response.status === 'success') {
						// Handle success
						//console.log(response.data);
						//alert("Data fetched successfully!");
						window.open(hrefValue, '_blank');  // Opens the URL in a new tab
						return true;
					} else {
						// Handle error
						console.log(response.message);
						alert("Error: " + response.message);
					}
				},
				error: function(xhr, status, error) {
					console.log(xhr.responseText);
					alert("An error occurred!");
				}
			});
		});
 
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: 'Please enter your Details',
        tabsize: 2,
        width:700,
        height: 150,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    });
  </script>
@endsection
<!-- end:: Content --''