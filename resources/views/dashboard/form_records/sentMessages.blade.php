@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    @if ($message = Session::get('success'))
    <div class="alert alert-light alert-elevate" role="alert">
    	<!-- <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div> -->
    	<!-- <div class="alert-text">
    		DataTables has the ability to read data from virtually any JSON data source that can be obtained by Ajax. This can be done, in its most simple form, by setting the ajax option to the address of the JSON data source.
    		See official documentation <a class="kt-link kt-font-bold" href="https://datatables.net/examples/data_sources/ajax.html" target="_blank">here</a>.
    	</div> -->
    	
            <!-- <div class="alert alert-success"> -->
                <p>{{ $message }}</p>
            <!-- </div> -->
    </div>
    @endif

    <div class="am-page-header">
        <div>
            <h2>تم الإرسال</h2>
        </div>
    </div>

    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="kt_table_user">
				<thead>
					<tr>
						<th>الرقم</th>
						<th>إلى</th>
						<th>موضوع</th>
						{{-- <th>مفتوح عند</th> --}}
						<th>أرسلت في</th>						
					</tr>
				</thead>
				<tbody>

					<?php $count=0;?>
					@foreach ($users as $item)
					<?php $count++; $counter = App\SendNotifications::where('unique_id', $item->unique_id)->count(); ?>
                            <tr  data-href = "{{ route('individualMessageUser', ['id'=>$item->unique_id]) }}" class="read">
                                    <td>{{$count}}</td>
                                    <td> {{$item->name . ' (' . $counter . ')'}} </td>
                                    <td>{{$item->title}}</td>
                                    {{-- <td>{{date("d/m/Y H:i:sA", strtotime($item->updated_at) )}}</td> --}}
                                    <td>{{date("d/m/Y H:i:sA", strtotime($item->created_at) )}}</td>
                                    {{-- <td>
                                    <a data-id="{{$item->id}}" data-user="user" class="read_it" href="#" data-toggle="modal" data-target="#view-notification-{{$item->id}}"> View Message </a>
                                        
                                                <div class="modal fade" id="view-notification-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Message From Admin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>{{$item->title}}</h5>
                                                                <p>&nbsp;</p>
                                                                <p>{{$item->message}}</p>
                                                            </div>
                                                            <div class="modal-footer">								
                                                            @if ($item->attachement != NULL || $item->attachement)
                                                            <a target="_blank" href="public/{{$item->attachement}}">View Attachment</a> 
                                                            @endif
                                                            
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>			
                                    
                                    </td> --}}                                   
                                </tr>
						@endforeach
					
				</tbody>
			</table>
        </div>
    </div>

    {{-- <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-download"></i> Export
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">Choose an option</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-print"></i>
											<span class="kt-nav__link-text">Print</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-copy"></i>
											<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-excel-o"></i>
											<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-text-o"></i>
											<span class="kt-nav__link-text">CSV</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-pdf-o"></i>
											<span class="kt-nav__link-text">PDF</span>
										</a>
									</li>
								</ul>
							</div> --}}

    {{-- <button data-toggle="modal" data-target="#MessageModal"  class="btn btn-brand btn-elevate btn-icon-sm" >
							<i class="la la-plus"></i>
							New Message
						</button> --}}

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	function deleteUser(id){
		var userid=id;
		$("#userid").val(userid);
		$("#deleteUser").modal('show');
	}
	function editDetails(data){
		console.log(data);
		 $("#editvalue").val(data.id);
         $("input[name='idnumber']").val(data.idnumber);
		 $("input[name='name']").val(data.name);
		 $("input[name='email']").val(data.email);
		 $("input[name='phone']").val(data.phone);
		 $("input[name='director']").val(data.director);
		 $("input[name='sales_process']").val(data.sales_process);
		 $("input[name='company_profile']").val(data.company_profile);
		 $("input[name='company_name']").val(data.company_name);
		 $("input[name='company_address']").val(data.company_address);
		 $("input[name='purchasing_process']").val(data.purchasing_process);
		 $("input[name='servicing_process']").val(data.servicing_process);
		 $("input[name='competency_process']").val(data.competency_process);
		 $("input[name='order_number']").val(data.order_number);
		 $("input[name='scope']").val(data.scope);
		 $("#editModal").modal('show');
	}
	$(document).ready(function() {
		// Add a click event listener to the table rows with the data-href attribute
		$('tr[data-href]').click(function(event) {
			event.preventDefault();
			var row = $(this);
			// var isUnread = row.hasClass('New');
			// if (isUnread) {
				// row.removeClass('New');
			// 	var itemID = row.data('item-id');
			// 	$.ajax({
			// 		type: 'POST',
			// 		url: '{{ route('markasread') }}',
			// 		data: {
			// 			item_id: itemID,
			// 			_token: $('meta[name="csrf-token"]').attr('content')
			// 		},
			// 		success: function() {
			// 			// Optional: You can update the UI further if needed
			// 		},
			// 	});
			// }
			// Redirect to the link specified in data-href
			window.location.href = row.attr('data-href');
		});
	});
</script>
@endsection
