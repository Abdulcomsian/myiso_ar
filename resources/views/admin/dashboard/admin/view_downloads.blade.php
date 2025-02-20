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
                    رفع
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">

                        </div>
                        &nbsp;
                        <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="collapse"
                            data-target="#new_video">
                            <i class="la la-plus"></i>
                            تحميل جديد
                        </a>

                    </div>
                </div>
            </div>
        </div>
	@if ($message = Session::get('msg'))
		<div class="row">
            <div class="col-md-11 pl-4 ml-4 mt-4">
	<div class="alert alert-success alert-dismissible">{{ $message }} &nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
	</div>
	</div>
	@endif
        <div class="row">
            <div class="col-md-6">
                <div id="new_video" class="collapse p-4">
                    @php
                    $usertypes = \App\UserType::get();
                    @endphp
                    <h3>إضافة تحميل جديد</h3>

                    <form action="{{ url('/add_download') }}" method="POST" enctype="multipart/form-data">
                                 @csrf 
                                  <div class="form-group">
                                    <label>فئة</label><br>

                                    <select name="category" required="" class="form-control">
                                        <option value="" selected="selected" disabled="disabled">حدد علامات</option>
                                        <option value="Emergency Signs" title="Emergency Signs">افتات الطوارئ</option>
                                        <option value="Prohibition Signs" title="Prohibition Signs">افتات المنع</option>
                                        <option value="Environmental signs" title="Environmental signs">اللافتات البيئية</option>
                                        <option value="Mandatory Signs" title="Mandatory Signs">اللافتات الإلزامية</option>
                                        <option value="Warning Signs" title="Warning Signs">اللافتات التحذيرية</option>
                                    </select>

                                </div>
								<div class="form-group">
									<label for="title">اسم</label>
									<input type="text" id="name" name="name" class="form-control" placeholder="Name:" required="required"/>
								</div>
                                <div class="form-group">
                                    <label for="message">تحميل الصورة المصغرة</label>
                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail" accept=".mp4,.avi, .png, .jpg" required="required">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="message">وصف:</label>
                                    <textarea name="description" id="summernote"></textarea>
                                </div> --}}
                                <div class="form-group">
									
                                    <select name="user_type" id="showusers">
                                        <option value="0" {{ request('showusers') == 0 ? 'selected' : '' }}>All Users</option>
                                        @foreach ($usertypes as $usertype)
                                        <option value="{{$usertype->id}}" {{ request('showusers') == $usertype->id ? 'selected' : '' }}>{{$usertype->name}}</option> 
                                        @endforeach
                                    </select>
								</div>
                                
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="video">تحميل A4</label>
									<input type="file" name="file" class="form-control" id="file" accept=".mp4,.avi" required="required">
										</div>
                                        <div class="form-group">
                                            <label for="video">تحميل A5</label>
                                            <input type="file" name="file2" class="form-control" id="file2" accept=".mp4,.avi, .png, .jpg" required="required">
										</div>
									</div>
									<div class="col-lg-12">

									</div>
								</div>
								
								<button type="submit" class="submitBtn">يُقدِّم</button>
                    </form>
                    


                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>

   <!-- Category Dropdown -->
   <div class="row">
    <div class="col-md-6">
        <div class="form-group" style="margin-left: 2em">
            <label>:فئة</label><br>
            <select id="category-select" name="category" required class="form-control">
                {{-- <option value="" selected disabled>Select Category</option> --}}
                <option value="Emergency Signs" title="Emergency Signs">افتات الطوارئ</option>
                <option value="Prohibition Signs" title="Prohibition Signs">افتات المنع</option>
                <option value="Environmental signs" title="Environmental signs">اللافتات البيئية</option>
                <option value="Mandatory Signs" title="Mandatory Signs">اللافتات الإلزامية</option>
                <option value="Warning Signs" title="Warning Signs">اللافتات التحذيرية</option>
            </select>
        </div>
    </div>
</div>

<!-- Default Downloads -->
<div id="default-downloads" style="width: 100%;">
    @foreach($all_downloads as $download)
  
        <div style="display: flex; margin-left: 2em; margin-right: 2em; background:#f0f4fd; gap:80px; margin-bottom:20px; padding:30px 20px; align-items:center; border-radius:12px; ">
            <div style="display:flex; align-items:center; gap:40px"> 
                @if ($download->thumb_nail)
                <div>
                    <img src="{{ asset('uploads/downloads/' . $download->thumb_nail) }}" width="110" height="156">
                </div>
               
                @endif
                <div style="color:#084f95; font-size: 18px; font-weight:600; text-align:left;width:170px;">{{ $download->name }}</div>
            </div>
            
         <div style="display: flex; gap:20px;justify-content:space-between;">
            <div style="display: flex; flex-direction: column;gap:5px;">
                @if ($download->download_file)
                <a href="{{ asset('uploads/downloads/' . $download->download_file) }}" target="_blank"><img src="assets/img/a4-btn-ar.png"  style="width: 80%"></a><br>
                @endif
                @if ($download->download_file2)
                <a href="{{ asset('uploads/downloads/' . $download->download_file2) }}" target="_blank"><img src="assets/img/a5-btn-ar.png"  style="width: 80%"></a><br>
                @endif
            </div>
            <div>
                <a href="javascript:;" data-toggle="modal" data-target="#delete-{{ $download->id }}" title="Delete"><img src="assets/img/delete-ar.png"  style="width: 80%"></a><br>
            </div>
            <div class="modal fade" id="delete-{{$download->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">حذف السجل</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد؟ هل تريد حقًا حذف هذا؟</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{url('/download_delete/'.$download->id)}}" method="POST">
                            @csrf
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                            <button type="submit" class="btn btn-danger">نعم</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>	
         </div>
        </div>
    @endforeach
</div>

<!-- Filtered Downloads -->
<div id="filtered-downloads" style="display: none;">
    <!-- This will be updated dynamically -->
</div>
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
  <script>
    $(document).ready(function() {
        $('#category-select').change(function() {
            let category = $(this).val();

            // Make an AJAX request to filter downloads
            $.ajax({
                url: "{{ route('downloads.filter') }}", // Define this route in web.php
                type: "GET",
                data: { category: category },
                success: function(response) {
                    // Hide the default downloads   
                    $('#default-downloads').hide();

                    // Display the filtered downloads
                    $('#filtered-downloads').html(response).show();
                },
                error: function() {
                    alert('Error loading downloads. Please try again.');
                }
            });
        });
    });
</script>
@endsection