

<?php $__env->startSection('content'); ?>
<style>tr.New>td {color: #000 !important;font-weight: 800;cursor: pointer;}tr.New>button{color: #FFF !important;font-weight: 800;cursor: pointer;}
.read{
	font-weight: normal;
	cursor: pointer !important;
}
</style>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<?php if($message = Session::get('success')): ?>
	<div class="alert alert-light alert-elevate" role="alert">
		<!-- <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div> -->
		<!-- <div class="alert-text">
			DataTables has the ability to read data from virtually any JSON data source that can be obtained by Ajax. This can be done, in its most simple form, by setting the ajax option to the address of the JSON data source.
			See official documentation <a class="kt-link kt-font-bold" href="https://datatables.net/examples/data_sources/ajax.html" target="_blank">here</a>.
		</div> -->
		
	        <!-- <div class="alert alert-success"> -->
	            <p><?php echo e($message); ?></p>
	        <!-- </div> -->
	</div>
	<?php endif; ?>
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Sent Messages
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						<div class="dropdown dropdown-inline">
							
						</div>
						&nbsp;
						
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive" id="kt_table_user">
				<thead>
					<tr>
						<th>No.</th>
						<th>To</th>
						<th>Subject</th>
						<td>Sent at</td>
						
						
					</tr>
				</thead>
				<tbody>

					<?php $count=0;?>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $count++; $counter = App\SendNotifications::where('unique_id', $item->unique_id)->count(); ?>
                            <tr data-href = "<?php echo e(route('individualMessage', ['id'=>$item->unique_id])); ?>"  class="read">
                                    <td><?php echo e($count); ?></td>
                                    <td> <?php echo e($item->company_name . ' (' . $counter . ')'); ?> </td>
                                    <td><?php echo e($item->title); ?></td>
                                    <td><?php echo e(date("d/m/Y H:i:sA", strtotime($item->updated_at) )); ?></td>
                                                                       
                                </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</tbody>
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>
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
			// 	row.removeClass('New');
			// 	var itemID = row.data('item-id');
			// 	$.ajax({
			// 		type: 'POST',
			// 		url: '<?php echo e(route('markasread')); ?>',
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
<?php echo $__env->make('admin.dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myiso_arabic\resources\views/admin/dashboard/admin/sentNotification.blade.php ENDPATH**/ ?>