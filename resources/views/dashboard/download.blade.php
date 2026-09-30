@extends('dashboard.layouts.app')

@section('content')
<style>
    .table thead th, .table thead td {
    font-weight: bold !important;
    font-size: 15px;
	text-align: right;
}
</style>
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>التحميلات</h2>
        </div>
    </div>

    {{-- Category Dropdown --}}
    <div class="am-card" style="margin-bottom:24px;">
        <div class="am-card__body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-0">
                        <label for="category-select" style="font-weight:600;margin-bottom:6px;">فئة</label>
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
        </div>
    </div>

    {{-- Default Downloads --}}
    <div id="default-downloads">
        <div class="row">
            @foreach($all_downloads as $download)
            <div class="col-6 col-sm-4 col-lg-3 mb-4">
                <div class="am-card" style="text-align:center;padding:16px;">
                    @if ($download->thumb_nail)
                    <img src="{{ asset('uploads/downloads/' . $download->thumb_nail) }}" width="110" height="156" style="display:block;margin:0 auto 12px;object-fit:contain;">
                    @endif
                    <div style="color:#084f95;font-size:14px;font-weight:600;margin-bottom:12px;">{{ $download->name }}</div>
                    <div style="display:flex;flex-direction:column;gap:6px;align-items:center;">
                        @if ($download->download_file)
                        <a href="{{ asset('uploads/downloads/' . $download->download_file) }}" class="btn-fetch-data" data-id="{{ $download->id }}" target="_blank"><img src="{{ asset('assets/img/a4-btn-ar.png') }} " style="width:80px;"></a>
                        @endif
                        @if ($download->download_file2)
                        <a href="{{ asset('uploads/downloads/' . $download->download_file2) }}" class="btn-fetch-data" data-id="{{ $download->id }}" target="_blank"><img src="{{ asset('assets/img/a5-btn-ar.png') }}" style="width:80px;"></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Filtered Downloads --}}
    <div id="filtered-downloads" style="display: none;">
        <!-- This will be updated dynamically -->
    </div>

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
   <script>
	$(document).ready(function() {
		$('#category-select').change(function() {
			let category = $(this).val();

			// Make an AJAX request to filter downloads
			$.ajax({
				url: "{{ route('downloads.userfilter') }}", // Define this route in web.php
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
